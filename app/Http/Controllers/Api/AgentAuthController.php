<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Support\JwtService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgentAuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $agent = Employe::where('email', $credentials['email'])->first();

        if (! $agent || ! Hash::check($credentials['password'], $agent->password)) {
            return response()->json(['message' => 'Email ou mot de passe invalide.'], 401);
        }

        $token = JwtService::issue('agent', (int) $agent->id);

        return response()->json([
            'message' => 'Connexion réussie.',
            'token' => $token,
            'agent' => [
                'id' => $agent->id,
                'name' => $agent->name,
                'email' => $agent->email,
                'telephone' => $agent->telephone,
                'photo' => $agent->photo,
            ],
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $token = $request->attributes->get('api_token');

        if ($token) {
            $payload = $request->attributes->get('api_jwt_payload');
            if (is_array($payload)) {
                JwtService::revokeFromPayload($payload);
            }
        }

        return response()->json(['message' => 'Déconnexion réussie.']);
    }
}
