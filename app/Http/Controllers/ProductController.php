<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function catalogue(): JsonResponse
    {
        return response()->json(
            Product::query()
                ->where('etat', 'actif')
                ->latest()
                ->get()
                ->map(fn (Product $product) => $this->serializePublic($product))
        );
    }

    public function index(): JsonResponse
    {
        return response()->json(
            Product::query()
                ->latest()
                ->get()
                ->map(fn (Product $product) => $this->serializePublic($product))
        );
    }

    public function store(Request $request): JsonResponse
    {
        $data = $this->validated($request);
        $data['ref'] = $this->nextReference();
        $this->syncStockStatus($data);
        $this->storeMedia($request, $data);

        $product = Product::create($data);

        return response()->json($this->serializePublic($product), 201);
    }

    public function update(Request $request, Product $product): JsonResponse
    {
        $data = $this->validated($request, $product);
        $this->syncStockStatus($data);
        $this->storeMedia($request, $data, $product);

        $product->update($data);

        return response()->json($this->serializePublic($product->fresh()));
    }

    public function destroy(Product $product): JsonResponse
    {
        if ($product->media_path) {
            Storage::disk('public')->delete($product->media_path);
        }

        $product->delete();

        return response()->json(['deleted' => true]);
    }

    private function validated(Request $request, ?Product $product = null): array
    {
        return $request->validate([
            'designation' => ['required', 'string', 'max:255'],
            'categorie' => ['nullable', 'string', 'max:120'],
            'famille' => ['nullable', 'string', 'max:120'],
            'saison' => ['required', Rule::in(['ete', 'printemps', 'automne', 'hiver'])],
            'size' => ['nullable', 'string', 'max:120'],
            'qte' => ['required', 'integer', 'min:0'],
            'prix' => ['required', 'numeric', 'min:0'],
            'statue' => ['required', Rule::in(['dispo', 'faible', 'rupture'])],
            'etat' => ['required', Rule::in(['actif', 'inactif'])],
            'media' => [
                'nullable',
                'file',
                'max:10240',
                'mimetypes:image/jpeg,image/png,image/gif,image/webp,video/mp4,video/webm,video/ogg',
            ],
        ]);
    }

    private function nextReference(): string
    {
        $highestNumber = Product::query()
            ->where('ref', 'like', 'PRD%')
            ->pluck('ref')
            ->reduce(function (int $highest, string $reference): int {
                return preg_match('/^PRD-?(\d+)$/i', $reference, $matches)
                    ? max($highest, (int) $matches[1])
                    : $highest;
            }, 0);

        return 'PRD'.str_pad((string) ($highestNumber + 1), 4, '0', STR_PAD_LEFT);
    }

    private function syncStockStatus(array &$data): void
    {
        $quantity = (int) ($data['qte'] ?? 0);
        $data['statue'] = $quantity === 0
            ? 'rupture'
            : ($quantity <= 5 ? 'faible' : 'dispo');
    }

    private function storeMedia(
        Request $request,
        array &$data,
        ?Product $product = null,
    ): void {
        unset($data['media']);

        if (! $request->hasFile('media')) {
            return;
        }

        if ($product?->media_path) {
            Storage::disk('public')->delete($product->media_path);
        }

        $file = $request->file('media');
        $data['media_path'] = $file->store('products', 'public');
        $data['media_type'] = str_starts_with((string) $file->getMimeType(), 'video/')
            ? 'video'
            : 'image';
    }

    public function serializePublic(Product $product): array
    {
        return [
            'id' => (string) $product->id,
            'ref' => $product->ref,
            'designation' => $product->designation,
            'categorie' => $product->categorie ?? '',
            'famille' => $product->famille ?? '',
            'saison' => $product->saison ?? '',
            'size' => $product->size ?? '',
            'qte' => $product->qte,
            'prix' => (float) $product->prix,
            'photo' => $product->media_path
                ? asset(Storage::url($product->media_path))
                : '',
            'media_type' => $product->media_type,
            'statue' => $product->statue,
            'etat' => $product->etat,
            'created_at' => $product->created_at?->toISOString(),
            'updated_at' => $product->updated_at?->toISOString(),
        ];
    }
}
