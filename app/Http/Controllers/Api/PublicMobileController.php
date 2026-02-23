<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Devi;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PublicMobileController extends Controller
{
    public function createDevis(Request $request): JsonResponse
    {
        $payload = $request->validate([
            'espace' => ['required', 'string', 'max:255'],
            'frequence' => ['required', 'string', 'max:255'],
            'surface' => ['required', 'string', 'max:255'],
            'activite_society' => ['nullable', 'string', 'max:255'],
            'demarrage' => ['nullable', 'string', 'max:255'],
            'collabo_society' => ['nullable', 'string', 'max:255'],
            'your_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'telephone' => ['required', 'string', 'max:255'],
            'name_society' => ['nullable', 'string', 'max:255'],
            'others' => ['nullable', 'string'],
            'services' => ['nullable', 'array'],
            'services.*' => ['string', 'max:255'],
        ]);

        $payload['date_emission'] = now()->toDateString();

        $devis = Devi::create($payload);

        return response()->json([
            'message' => 'Demande de devis créée avec succès.',
            'data' => $devis,
        ], 201);
    }
}
