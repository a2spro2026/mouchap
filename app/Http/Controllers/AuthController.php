<?php

namespace App\Http\Controllers;

use App\Models\Affilie;
use App\Models\User;
use App\Support\MouchapCodes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function adminLogin(Request $request): JsonResponse
    {
        $data = $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
            'statue' => ['nullable', 'string'],
        ]);

        $login = MouchapCodes::normalizeLogin($data['login']);

        if ($login === '' || ! Auth::attempt(['email' => $login, 'password' => $data['password']], true)) {
            return response()->json([
                'message' => 'Identifiants admin incorrects. Utilisez admin / admin123 (statue Gérant).',
            ], 422);
        }

        $request->session()->regenerate();
        $user = $request->user();

        // La statue du formulaire est informative : on garde celle du compte en base.
        return response()->json([
            'ok' => true,
            'redirect' => '/admin',
            'user' => $user->toAdminArray(),
        ]);
    }

    public function affilieLogin(Request $request): JsonResponse
    {
        $data = $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $login = MouchapCodes::normalizeLogin($data['login']);

        if ($login === '' || ! Auth::guard('affilie')->attempt([
            'login' => $login,
            'password' => $data['password'],
        ], true)) {
            return response()->json(['message' => 'Login ou mot de passe incorrect, ou compte non validé.'], 422);
        }

        $affilie = Auth::guard('affilie')->user();
        if ($affilie->statue === 'susp') {
            Auth::guard('affilie')->logout();

            return response()->json(['message' => 'Compte suspendu.'], 422);
        }

        $request->session()->regenerate();

        return response()->json([
            'ok' => true,
            'redirect' => '/affilie',
            'affilie' => $affilie->toApiArray(),
        ]);
    }

    public function adminLogout(Request $request): JsonResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['ok' => true, 'redirect' => '/']);
    }

    public function affilieLogout(Request $request): JsonResponse
    {
        Auth::guard('affilie')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['ok' => true, 'redirect' => '/']);
    }

    public function adminMe(Request $request): JsonResponse
    {
        /** @var User $user */
        $user = $request->user();

        return response()->json($user->toAdminArray());
    }

    public function affilieMe(): JsonResponse
    {
        /** @var Affilie $affilie */
        $affilie = Auth::guard('affilie')->user();

        return response()->json($affilie->toApiArray());
    }
}
