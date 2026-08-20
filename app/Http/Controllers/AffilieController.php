<?php

namespace App\Http\Controllers;

use App\Models\Affilie;
use App\Support\MouchapCodes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AffilieController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(
            Affilie::query()
                ->latest()
                ->get()
                ->map(fn (Affilie $item) => $item->toApiArray())
                ->values()
        );
    }

    public function store(Request $request): JsonResponse
    {
        $data = $this->validated($request);
        $password = $data['password'] ?: MouchapCodes::randomPassword();

        $affilie = Affilie::create([
            'code' => $data['code'] ?: MouchapCodes::nextAffiliationCode(),
            'date' => $data['date'] ?? now()->toDateString(),
            'nom_complet' => $data['nom_complet'],
            'titre' => $data['titre'] ?? '',
            'cin' => $data['cin'] ?? '',
            'contact' => $data['contact'] ?? '',
            'ville' => $data['ville'] ?? '',
            'banque' => $data['banque'] ?? '',
            'rib' => $data['rib'] ?? '',
            'type_paiement' => $data['type_paiement'] ?? 'Vir',
            'statue' => $data['statue'] ?? 'actif',
            'login' => MouchapCodes::normalizeLogin($data['login'] ?: MouchapCodes::slugLogin($data['nom_complet'])),
            'password' => $password,
            'password_display' => $password,
        ]);

        return response()->json($affilie->toApiArray(), 201);
    }

    public function update(Request $request, Affilie $affilie): JsonResponse
    {
        $data = $this->validated($request, $affilie);

        $payload = [
            'date' => $data['date'] ?? $affilie->date,
            'nom_complet' => $data['nom_complet'],
            'titre' => $data['titre'] ?? '',
            'cin' => $data['cin'] ?? '',
            'contact' => $data['contact'] ?? '',
            'ville' => $data['ville'] ?? '',
            'banque' => $data['banque'] ?? '',
            'rib' => $data['rib'] ?? '',
            'type_paiement' => $data['type_paiement'] ?? $affilie->type_paiement,
            'statue' => $data['statue'] ?? $affilie->statue,
            'login' => MouchapCodes::normalizeLogin($data['login'] ?: $affilie->login),
        ];

        if (! empty($data['password'])) {
            $payload['password'] = $data['password'];
            $payload['password_display'] = $data['password'];
        }

        $affilie->update($payload);

        return response()->json($affilie->fresh()->toApiArray());
    }

    public function destroy(Affilie $affilie): JsonResponse
    {
        $affilie->delete();

        return response()->json(['deleted' => true]);
    }

    public function patch(Request $request, Affilie $affilie): JsonResponse
    {
        $data = $request->validate([
            'type_paiement' => ['sometimes', Rule::in(['Esp', 'Vir', 'Vers', 'Chq', 'Eff'])],
            'statue' => ['sometimes', Rule::in(['actif', 'susp'])],
        ]);

        $affilie->update($data);

        return response()->json($affilie->fresh()->toApiArray());
    }

    private function validated(Request $request, ?Affilie $affilie = null): array
    {
        return $request->validate([
            'code' => ['nullable', 'string', 'max:40', Rule::unique('affilies', 'code')->ignore($affilie?->id)],
            'date' => ['nullable', 'date'],
            'nom_complet' => ['required', 'string', 'max:255'],
            'titre' => ['nullable', 'string', 'max:120'],
            'cin' => ['nullable', 'string', 'max:40'],
            'contact' => ['nullable', 'string', 'max:20'],
            'ville' => ['nullable', 'string', 'max:120'],
            'banque' => ['nullable', 'string', 'max:120'],
            'rib' => ['nullable', 'string', 'max:40'],
            'type_paiement' => ['nullable', Rule::in(['Esp', 'Vir', 'Vers', 'Chq', 'Eff'])],
            'statue' => ['nullable', Rule::in(['actif', 'susp'])],
            'login' => ['nullable', 'string', 'max:120', Rule::unique('affilies', 'login')->ignore($affilie?->id)],
            'password' => ['nullable', 'string', 'max:120'],
        ]);
    }
}
