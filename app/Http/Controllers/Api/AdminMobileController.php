<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contrat;
use App\Models\Devi;
use App\Models\Employe;
use App\Models\Programme;
use App\Models\Travail;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminMobileController extends Controller
{
    public function me(Request $request): JsonResponse
    {
        $admin = $request->user('admin');

        return response()->json([
            'data' => [
                'id' => $admin->id,
                'name' => $admin->name,
                'firstname' => $admin->firstname,
                'email' => $admin->email,
                'telephone' => $admin->telephone,
                'role' => $admin->role,
            ],
        ]);
    }

    public function dashboard(): JsonResponse
    {
        return response()->json([
            'data' => [
                'clients_total' => User::count(),
                'agents_total' => Employe::count(),
                'contrats_total' => Contrat::count(),
                'programmes_total' => Programme::count(),
                'devis_new_total' => Devi::where('traiter', false)->count(),
                'jobs_new_total' => Travail::where('traiter', false)->count(),
            ],
        ]);
    }

    public function devis(Request $request): JsonResponse
    {
        $request->validate([
            'status' => ['nullable', 'in:new,old'],
            'limit' => ['nullable', 'integer', 'min:1', 'max:100'],
        ]);

        $status = $request->input('status', 'new');
        $limit = (int) $request->input('limit', 20);

        $devis = Devi::query()
            ->when($status === 'new', fn ($q) => $q->where('traiter', false))
            ->when($status === 'old', fn ($q) => $q->where('traiter', true))
            ->orderByDesc('id')
            ->limit($limit)
            ->get();

        return response()->json(['data' => $devis]);
    }

    public function jobs(Request $request): JsonResponse
    {
        $request->validate([
            'status' => ['nullable', 'in:new,old'],
            'limit' => ['nullable', 'integer', 'min:1', 'max:100'],
        ]);

        $status = $request->input('status', 'new');
        $limit = (int) $request->input('limit', 20);

        $jobs = Travail::query()
            ->when($status === 'new', fn ($q) => $q->where('traiter', false))
            ->when($status === 'old', fn ($q) => $q->where('traiter', true))
            ->orderByDesc('id')
            ->limit($limit)
            ->get();

        return response()->json(['data' => $jobs]);
    }

    public function clients(Request $request): JsonResponse
    {
        $request->validate([
            'q' => ['nullable', 'string', 'max:255'],
            'limit' => ['nullable', 'integer', 'min:1', 'max:100'],
        ]);

        $limit = (int) $request->input('limit', 20);
        $q = $request->input('q');

        $clients = User::query()
            ->when($q, function ($query, $search) {
                $query->where(function ($inner) use ($search) {
                    $inner->where('name', 'like', "%{$search}%")
                        ->orWhere('firstname', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('telephone', 'like', "%{$search}%");
                });
            })
            ->orderByDesc('id')
            ->limit($limit)
            ->get();

        return response()->json(['data' => $clients]);
    }
}
