<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Administrateur;
use App\Support\JwtService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $admin = Administrateur::where('email', $credentials['email'])->first();

        if (! $admin || ! Hash::check($credentials['password'], $admin->password)) {
            return response()->json(['message' => 'Email ou mot de passe invalide.'], 401);
        }

        $token = JwtService::issue('admin', (int) $admin->id);

        return response()->json([
            'message' => 'Connexion admin réussie.',
            'token' => $token,
            'admin' => [
                'id' => $admin->id,
                'name' => $admin->name,
                'firstname' => $admin->firstname,
                'email' => $admin->email,
                'telephone' => $admin->telephone,
                'role' => $admin->role,
            ],
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $payload = $request->attributes->get('api_jwt_payload');

        if (is_array($payload)) {
            JwtService::revokeFromPayload($payload);
        }

        return response()->json(['message' => 'Déconnexion admin réussie.']);
    }
}
