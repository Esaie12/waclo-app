<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contrat;
use App\Models\Programme;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientMobileController extends Controller
{
    public function me(Request $request): JsonResponse
    {
        $user = $request->user('web');

        return response()->json([
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
                'firstname' => $user->firstname,
                'email' => $user->email,
                'telephone' => $user->telephone,
                'adresse' => $user->adresse,
                'type_client' => $user->type_client,
            ],
        ]);
    }

    public function contrats(Request $request): JsonResponse
    {
        $user = $request->user('web');

        $contrats = Contrat::query()
            ->where('id_client', $user->id)
            ->orderByDesc('id')
            ->get();

        return response()->json(['data' => $contrats]);
    }

    public function programmes(Request $request): JsonResponse
    {
        $user = $request->user('web');

        $request->validate([
            'contrat_id' => ['nullable', 'integer'],
        ]);

        $contratIds = Contrat::query()
            ->where('id_client', $user->id)
            ->pluck('id');

        $programmesQuery = Programme::query()
            ->whereIn('id_contrat', $contratIds)
            ->orderByDesc('date_passage');

        if ($request->filled('contrat_id')) {
            $programmesQuery->where('id_contrat', (int) $request->input('contrat_id'));
        }

        return response()->json(['data' => $programmesQuery->get()]);
    }
}
