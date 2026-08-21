<?php

namespace App\Http\Controllers;

use App\Models\Affilie;
use App\Models\Order;
use App\Models\Product;
use App\Support\MouchapCodes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(
            Order::query()
                ->with(['affilie', 'product'])
                ->latest()
                ->get()
                ->map(fn (Order $order) => $order->toApiArray())
                ->values()
        );
    }

    public function mine(): JsonResponse
    {
        return response()->json(
            $this->affiliateOrdersQuery()
                ->get()
                ->map(fn (Order $order) => $order->toApiArray())
                ->values()
        );
    }

    public function stats(): JsonResponse
    {
        $orders = Order::query()->get();
        $confirmees = $orders->whereIn('statue', ['confirme', 'livree']);
        $ventes = $confirmees->sum(fn (Order $o) => (float) $o->montant);

        $parVille = [];
        foreach ($confirmees as $order) {
            $ville = trim((string) $order->ville);
            if ($ville !== '') {
                $parVille[$ville] = ($parVille[$ville] ?? 0) + 1;
            }
        }
        arsort($parVille);
        $topVille = array_key_first($parVille) ?: '—';

        return response()->json([
            'affilies' => Affilie::query()->count(),
            'ventes' => $ventes,
            'charges' => 0,
            'top_ville' => $topVille,
            'revenue' => $ventes,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $affilie = Auth::guard('affilie')->user();
        $data = $this->validatedAffiliateOrder($request);

        $prix = (float) $data['prix_u'];
        $qte = (int) $data['qte'];
        $montant = round($prix * $qte, 2);
        $marge = isset($data['marge']) ? (float) $data['marge'] : round($montant * 0.2, 2);

        $product = isset($data['product_id'])
            ? Product::query()->find($data['product_id'])
            : Product::query()->where('ref', $data['ref_prod'])->first();

        $sizes = $data['sizes'] ?? [];
        if (isset($data['size']) && trim((string) $data['size']) !== '') {
            $sizes = [trim((string) $data['size'])];
        }

        $order = Order::create([
            'n_cmd' => MouchapCodes::nextOrderCode(),
            'date' => $data['date'] ?? now()->toDateString(),
            'affilie_id' => $affilie->id,
            'affilie_nom' => $affilie->nom_complet,
            'ville' => $data['ville'] ?? $affilie->ville,
            'product_id' => $product?->id ?? ($data['product_id'] ?? null),
            'ref_prod' => $data['ref_prod'],
            'designation' => $data['designation'] ?? $product?->designation,
            'categorie' => $data['categorie'] ?? $product?->categorie,
            'famille' => $data['famille'] ?? $product?->famille,
            'nom_client' => $data['nom_client'] ?? $affilie->nom_complet,
            'contact' => $data['contact'] ?? $affilie->contact,
            'adresse' => $data['adresse'] ?? '',
            'qte' => $qte,
            'sizes' => $sizes,
            'couleurs' => $data['couleurs'] ?? [],
            'prix_u' => $prix,
            'montant' => $montant,
            'marge' => $marge,
            'date_paie' => $data['date_paie'] ?? null,
            'recu' => $data['recu'] ?? 'non',
            'statue' => $data['statue'] ?? 'en_attente',
            'stock' => 'dispo',
            'source' => 'bon_commande',
        ]);

        return response()->json($order->fresh('affilie')->toApiArray(), 201);
    }

    public function updateMine(Request $request, Order $order): JsonResponse
    {
        $this->ensureOwnsOrder($order);
        $data = $this->validatedAffiliateOrder($request, true);

        $payload = collect($data)->only([
            'date', 'ref_prod', 'designation', 'categorie', 'famille', 'nom_client', 'ville', 'contact', 'adresse',
            'qte', 'sizes', 'couleurs', 'prix_u', 'marge', 'date_paie', 'recu', 'statue', 'product_id',
        ])->all();

        if (isset($data['size']) && trim((string) $data['size']) !== '') {
            $payload['sizes'] = [trim((string) $data['size'])];
        }

        if (isset($payload['prix_u']) || isset($payload['qte'])) {
            $prix = (float) ($payload['prix_u'] ?? $order->prix_u);
            $qte = (int) ($payload['qte'] ?? $order->qte);
            $payload['montant'] = round($prix * $qte, 2);
            if (! array_key_exists('marge', $payload)) {
                $payload['marge'] = round($payload['montant'] * 0.2, 2);
            }
        }

        $order->update($payload);

        return response()->json($order->fresh('affilie')->toApiArray());
    }

    public function destroyMine(Order $order): JsonResponse
    {
        $this->ensureOwnsOrder($order);
        $order->delete();

        return response()->json(['deleted' => true]);
    }

    public function update(Request $request, Order $order): JsonResponse
    {
        $data = $request->validate([
            'statue' => ['sometimes', Rule::in(['confirme', 'livree', 'annulee', 'reporte', 'retour', 'en_attente'])],
            'stock' => ['sometimes', Rule::in(['dispo', 'faible', 'rupture'])],
            'prix_u' => ['sometimes', 'numeric', 'min:0'],
            'montant' => ['sometimes', 'numeric', 'min:0'],
            'marge' => ['sometimes', 'numeric'],
            'date_paie' => ['sometimes', 'nullable', 'date'],
            'recu' => ['sometimes', Rule::in(['oui', 'non'])],
        ]);

        if (isset($data['prix_u']) && ! isset($data['montant'])) {
            $data['montant'] = round((float) $data['prix_u'] * $order->qte, 2);
        }

        $order->update($data);

        return response()->json($order->fresh('affilie')->toApiArray());
    }

    public function storeFromCatalogue(Request $request, Product $product): JsonResponse
    {
        $affilie = Auth::guard('affilie')->user();

        $data = $request->validate([
            'qte' => ['required', 'integer', 'min:1'],
            'sizes' => ['required', 'array', 'min:1'],
            'sizes.*' => ['string', 'max:40'],
            'couleurs' => ['required', 'array', 'min:1'],
            'couleurs.*' => ['string', 'max:40'],
        ]);

        $quantity = (int) $data['qte'];

        $updated = Product::query()
            ->whereKey($product->id)
            ->where('etat', 'actif')
            ->where('qte', '>=', $quantity)
            ->decrement('qte', $quantity);

        if (! $updated) {
            return response()->json([
                'message' => 'Quantité indisponible. Actualisez le catalogue.',
            ], 422);
        }

        $product->refresh();
        $stock = $product->qte === 0 ? 'rupture' : ($product->qte <= 5 ? 'faible' : 'dispo');
        $product->update(['statue' => $stock]);

        $prix = (float) $product->prix;
        $montant = round($prix * $quantity, 2);

        $order = Order::create([
            'n_cmd' => MouchapCodes::nextOrderCode(),
            'date' => now()->toDateString(),
            'affilie_id' => $affilie->id,
            'affilie_nom' => $affilie->nom_complet,
            'ville' => $affilie->ville ?: '—',
            'product_id' => $product->id,
            'ref_prod' => $product->ref,
            'designation' => $product->designation,
            'categorie' => $product->categorie,
            'famille' => $product->famille,
            'nom_client' => $affilie->nom_complet,
            'contact' => $affilie->contact ?: '—',
            'adresse' => '',
            'qte' => $quantity,
            'sizes' => $data['sizes'],
            'couleurs' => $data['couleurs'],
            'prix_u' => $prix,
            'montant' => $montant,
            'marge' => round($montant * 0.2, 2),
            'recu' => 'non',
            'statue' => 'en_attente',
            'stock' => $stock,
            'source' => 'catalogue',
        ]);

        return response()->json([
            'order' => $order->fresh('affilie')->toApiArray(),
            'product' => app(ProductController::class)->serializePublic($product->fresh()),
        ], 201);
    }

    private function affiliateOrdersQuery()
    {
        $affilie = Auth::guard('affilie')->user();

        return Order::query()
            ->with(['affilie', 'product'])
            ->where('affilie_id', $affilie->id)
            ->latest();
    }

    private function ensureOwnsOrder(Order $order): void
    {
        $affilie = Auth::guard('affilie')->user();
        abort_unless((int) $order->affilie_id === (int) $affilie->id, 403);
    }

    private function validatedAffiliateOrder(Request $request, bool $partial = false): array
    {
        $required = $partial ? 'sometimes' : 'required';

        return $request->validate([
            'date' => [$partial ? 'sometimes' : 'nullable', 'date'],
            'ref_prod' => [$required, 'string', 'max:80'],
            'designation' => [$required, 'string', 'max:255'],
            'categorie' => ['nullable', 'string', 'max:120'],
            'famille' => ['nullable', 'string', 'max:120'],
            'size' => ['nullable', 'string', 'max:40'],
            'qte' => [$required, 'integer', 'min:1'],
            'prix_u' => [$required, 'numeric', 'min:0'],
            'nom_client' => ['nullable', 'string', 'max:255'],
            'ville' => ['nullable', 'string', 'max:120'],
            'contact' => ['nullable', 'string', 'max:30'],
            'adresse' => ['nullable', 'string', 'max:255'],
            'marge' => ['nullable', 'numeric'],
            'date_paie' => ['nullable', 'date'],
            'recu' => ['nullable', Rule::in(['oui', 'non'])],
            'statue' => ['nullable', Rule::in(['livree', 'annulee', 'reporte', 'confirme', 'retour', 'en_attente'])],
            'product_id' => ['nullable', 'integer', 'exists:products,id'],
            'sizes' => ['nullable', 'array'],
            'sizes.*' => ['string', 'max:40'],
            'couleurs' => ['nullable', 'array'],
            'couleurs.*' => ['string', 'max:40'],
        ]);
    }
}
