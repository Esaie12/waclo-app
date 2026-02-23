<?php

namespace App\Http\Middleware;

use App\Models\Administrateur;
use App\Models\Employe;
use App\Models\User;
use App\Support\JwtService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiTokenAuth
{
    public function handle(Request $request, Closure $next, string $expectedGuard): mixed
    {
        $token = $request->bearerToken();

        if (! $token) {
            return response()->json(['message' => 'Token JWT manquant.'], 401);
        }

        $payload = JwtService::parse($token);

        if (! $payload) {
            return response()->json(['message' => 'Token JWT invalide ou expiré.'], 401);
        }

        if (($payload['guard'] ?? null) !== $expectedGuard) {
            return response()->json(['message' => 'Token non autorisé pour ce profil.'], 403);
        }

        $user = match ($expectedGuard) {
            'web' => User::find($payload['sub'] ?? 0),
            'agent' => Employe::find($payload['sub'] ?? 0),
            'admin' => Administrateur::find($payload['sub'] ?? 0),
            default => null,
        };

        if (! $user) {
            return response()->json(['message' => 'Utilisateur introuvable.'], 401);
        }

        Auth::guard($expectedGuard)->setUser($user);
        $request->attributes->set('api_token', $token);
        $request->attributes->set('api_jwt_payload', $payload);

        return $next($request);
    }
}
