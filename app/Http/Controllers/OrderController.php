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
                ->with('affilie')
                ->latest()
                ->get()
                ->map(fn (Order $order) => $order->toApiArray())
                ->values()
        );
    }

    public function mine(): JsonResponse
    {
        $affilie = Auth::guard('affilie')->user();

        return response()->json(
            Order::query()
                ->with('affilie')
                ->where('affilie_id', $affilie->id)
                ->latest()
                ->get()
                ->map(fn (Order $order) => $order->toApiArray())
                ->values()
        );
    }

    public function stats(): JsonResponse
    {
        $orders = Order::query()->get();
        $confirmees = $orders->where('statue', 'confirme');
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

    public function update(Request $request, Order $order): JsonResponse
    {
        $data = $request->validate([
            'statue' => ['sometimes', Rule::in(['confirme', 'annulee', 'reporte', 'retour'])],
            'stock' => ['sometimes', Rule::in(['dispo', 'faible', 'rupture'])],
            'prix_u' => ['sometimes', 'numeric', 'min:0'],
            'montant' => ['sometimes', 'numeric', 'min:0'],
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

        $order = Order::create([
            'n_cmd' => MouchapCodes::nextOrderCode(),
            'date' => now()->toDateString(),
            'affilie_id' => $affilie->id,
            'affilie_nom' => $affilie->nom_complet,
            'ville' => $affilie->ville ?: '—',
            'product_id' => $product->id,
            'ref_prod' => $product->ref,
            'designation' => $product->designation,
            'nom_client' => $affilie->nom_complet,
            'contact' => $affilie->contact ?: '—',
            'qte' => $quantity,
            'sizes' => $data['sizes'],
            'couleurs' => $data['couleurs'],
            'prix_u' => 0,
            'montant' => 0,
            'statue' => 'reporte',
            'stock' => $stock,
            'source' => 'catalogue',
        ]);

        return response()->json([
            'order' => $order->toApiArray(),
            'product' => app(ProductController::class)->serializePublic($product->fresh()),
        ], 201);
    }
}
