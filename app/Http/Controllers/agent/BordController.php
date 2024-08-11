<?php

namespace App\Http\Controllers\agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;
use App\Models\Administrateur;
use App\Models\Devi;
use App\Models\Travail;
use App\Models\Employe;
use App\Models\User;
use App\Models\Programme;

class BordController extends Controller
{
    function page_home(){

        $programme = DB::table('programmes')
        ->join('contrats', 'programmes.id_contrat','contrats.id')
        ->join('sousprogrammes', 'programmes.id', 'sousprogrammes.id_programme')
        ->join('users', 'contrats.id_client', 'users.id')
        ->where('sousprogrammes.id_employe',Auth::user()->id)
        //->where('programmes.effectuer',0)
        ->where('programmes.date_passage',date('Y-m-d'))
        //->orderBy('programmes.date_passage')
        ->get(['programmes.*', 'users.name', 'users.adresse']);

        return view('agentView.dashboard',['programmes'=>$programme]);
    }

    function agenda(){

        $programme = DB::table('programmes')
        ->join('contrats', 'programmes.id_contrat','contrats.id')
        ->join('sousprogrammes', 'programmes.id', 'sousprogrammes.id_programme')
        ->join('users', 'contrats.id_client', 'users.id')
        ->where('sousprogrammes.id_employe',Auth::user()->id)
        //->where('programmes.effectuer',0)
        //->where('programmes.date_passage',date('Y-m-d'))
        //->orderBy('programmes.date_passage')
        ->get(['programmes.*', 'users.name', 'users.adresse']);

        return view('agentView.monAgenda',['programmes'=>$programme, 'result'=>0]);

    }

    function search_agenda(Request $req){

        $req->validate([
            'date_min'=>['nullable', 'date'],
            'date_max'=>['nullable', 'date'],
            'type'=>['required', 'numeric', 'min:0', 'max:2'],
        ]);

        $data = Programme::query();

        $data = $data->join('contrats', 'programmes.id_contrat','contrats.id')
        ->join('sousprogrammes', 'programmes.id', 'sousprogrammes.id_programme')
        ->join('users', 'contrats.id_client', 'users.id')
        ->where('sousprogrammes.id_employe',Auth::user()->id);

        /*
        if( !empty($req['date_min']) ){

            $data = $data->where('programmes.date_passage','>=', $req['date_min']);
        }
        if( !empty($req['date_max'])){

            $data = $data->where('programmes.date_passage','<=', $req['date_min']);
        }
        */

        if( $req['type'] < 2 ){
            $data = $data->where('programmes.effectuer',$req['type']);
        }
        //->where('programmes.date_passage',date('Y-m-d'))
        //->orderBy('programmes.date_passage')
        $data = $data->get(['programmes.*', 'users.name', 'users.adresse']);

        return view('agentView.monAgenda',['programmes'=>$data, 'result'=>1, 'date_max'=>$req['date_max'], 'type'=>$req['type'] ,'date_min'=>$req['date_min']]);

    }

}
