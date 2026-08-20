<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Support\MouchapCodes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(
            User::query()
                ->latest()
                ->get()
                ->map(fn (User $user) => $user->toAdminArray())
                ->values()
        );
    }

    public function store(Request $request): JsonResponse
    {
        $data = $this->validated($request);
        $password = $data['password'] ?: MouchapCodes::randomPassword();
        $login = MouchapCodes::normalizeLogin($data['login'] ?: MouchapCodes::slugLogin($data['nom_complet']));

        $user = User::create([
            'code' => $data['code'] ?: MouchapCodes::nextUserCode(),
            'name' => $data['nom_complet'],
            'contact' => $data['contact'] ?? '',
            'statue' => $data['statue'] ?? 'gerant',
            'email' => $login,
            'password' => $password,
            'password_display' => $password,
        ]);

        return response()->json($user->toAdminArray(), 201);
    }

    public function update(Request $request, User $user): JsonResponse
    {
        $data = $this->validated($request, $user);
        $payload = [
            'name' => $data['nom_complet'],
            'contact' => $data['contact'] ?? '',
            'statue' => $data['statue'] ?? $user->statue,
            'email' => MouchapCodes::normalizeLogin($data['login'] ?: $user->email),
        ];

        if (! empty($data['password'])) {
            $payload['password'] = $data['password'];
            $payload['password_display'] = $data['password'];
        }

        $user->update($payload);

        return response()->json($user->fresh()->toAdminArray());
    }

    public function destroy(Request $request, User $user): JsonResponse
    {
        if ($request->user()?->id === $user->id) {
            return response()->json(['message' => 'Impossible de supprimer votre propre compte.'], 422);
        }

        $user->delete();

        return response()->json(['deleted' => true]);
    }

    private function validated(Request $request, ?User $user = null): array
    {
        return $request->validate([
            'code' => ['nullable', 'string', 'max:40', Rule::unique('users', 'code')->ignore($user?->id)],
            'nom_complet' => ['required', 'string', 'max:255'],
            'contact' => ['nullable', 'string', 'max:40'],
            'statue' => ['nullable', Rule::in(['gerant', 'commercial', 'caisse', 'depot'])],
            'login' => ['nullable', 'string', 'max:120', Rule::unique('users', 'email')->ignore($user?->id)],
            'password' => ['nullable', 'string', 'max:120'],
        ]);
    }
}
