<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgentMobileController extends Controller
{
    public function me(Request $request): JsonResponse
    {
        $agent = $request->user('agent');

        return response()->json([
            'data' => [
                'id' => $agent->id,
                'name' => $agent->name,
                'email' => $agent->email,
                'telephone' => $agent->telephone,
                'adresse' => $agent->adresse,
                'photo' => $agent->photo,
            ],
        ]);
    }

    public function agenda(Request $request): JsonResponse
    {
        $agent = $request->user('agent');

        $request->validate([
            'date' => ['nullable', 'date'],
        ]);

        $agenda = DB::table('sousprogrammes as sp')
            ->join('programmes as p', 'p.id', '=', 'sp.id_programme')
            ->join('contrats as c', 'c.id', '=', 'sp.id_contrat')
            ->leftJoin('users as u', 'u.id', '=', 'c.id_client')
            ->where('sp.id_employe', $agent->id)
            ->when($request->filled('date'), fn ($q) => $q->whereDate('p.date_passage', $request->input('date')))
            ->select([
                'p.id as programme_id',
                'p.id_contrat',
                'p.date_passage',
                'p.heure_debut',
                'p.heure_fin',
                'p.remarques',
                'p.effectuer',
                'u.name as client_name',
                'u.firstname as client_firstname',
                'u.telephone as client_telephone',
                'u.adresse as client_adresse',
            ])
            ->orderBy('p.date_passage')
            ->orderBy('p.heure_debut')
            ->get();

        return response()->json(['data' => $agenda]);
    }
}
