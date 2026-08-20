<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureAffilie
{
    public function handle(Request $request, Closure $next): Response
    {
        $affilie = Auth::guard('affilie')->user();

        if (! $affilie || $affilie->statue === 'susp') {
            Auth::guard('affilie')->logout();

            if ($request->expectsJson() || $request->is('api/*')) {
                return response()->json(['message' => 'Non authentifié.'], 401);
            }

            return redirect('/')->with('error', 'Connexion affilié requise.');
        }

        return $next($request);
    }
}
