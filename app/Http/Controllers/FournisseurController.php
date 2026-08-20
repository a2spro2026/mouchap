<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use App\Support\MouchapCodes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FournisseurController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(
            Fournisseur::query()
                ->latest()
                ->get()
                ->map(fn (Fournisseur $item) => $item->toApiArray())
                ->values()
        );
    }

    public function store(Request $request): JsonResponse
    {
        $data = $this->validated($request);

        $item = Fournisseur::create([
            'code' => $data['code'] ?: MouchapCodes::nextFournisseurCode(),
            'date' => $data['date'] ?? now()->toDateString(),
            'nom' => $data['nom'],
            'ville' => $data['ville'] ?? '',
            'contact' => $data['contact'] ?? '',
            'type_regl' => $data['type_regl'] ?? 'Vir',
            'banque' => $data['banque'] ?? '',
            'ice' => $data['ice'] ?? '',
        ]);

        return response()->json($item->toApiArray(), 201);
    }

    public function update(Request $request, Fournisseur $fournisseur): JsonResponse
    {
        $data = $this->validated($request, $fournisseur);

        $fournisseur->update([
            'date' => $data['date'] ?? $fournisseur->date,
            'nom' => $data['nom'],
            'ville' => $data['ville'] ?? '',
            'contact' => $data['contact'] ?? '',
            'type_regl' => $data['type_regl'] ?? $fournisseur->type_regl,
            'banque' => $data['banque'] ?? '',
            'ice' => $data['ice'] ?? '',
        ]);

        return response()->json($fournisseur->fresh()->toApiArray());
    }

    public function destroy(Fournisseur $fournisseur): JsonResponse
    {
        $fournisseur->delete();

        return response()->json(['deleted' => true]);
    }

    private function validated(Request $request, ?Fournisseur $fournisseur = null): array
    {
        return $request->validate([
            'code' => ['nullable', 'string', 'max:40', Rule::unique('fournisseurs', 'code')->ignore($fournisseur?->id)],
            'date' => ['nullable', 'date'],
            'nom' => ['required', 'string', 'max:255'],
            'ville' => ['nullable', 'string', 'max:120'],
            'contact' => ['nullable', 'string', 'max:40'],
            'type_regl' => ['nullable', Rule::in(['Esp', 'Vir', 'Vers', 'Chq', 'Eff'])],
            'banque' => ['nullable', 'string', 'max:120'],
            'ice' => ['nullable', 'string', 'max:40'],
        ]);
    }
}
