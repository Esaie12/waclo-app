<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;
use App\Models\Administrateur;
use App\Models\Devi;
use App\Models\Travail;

class TravailController extends Controller
{
    function new_job(){

        $data = DB::table('travails')->where('date_rdv', NULL)
        ->where('traiter',0)
        ->get();

        return view('adminView.jobs.newDemande',['jobs'=>$data]);
    }

    function rdv_job(){

        $data = DB::table('travails')
        ->where('traiter',0)->where('date_rdv','!=', NULL)
        ->get();

        return view('adminView.jobs.rdvDemande',['jobs'=>$data]);
    }

    function old_job(){
        $data = DB::table('travails')
        ->join('administrateurs', 'travails.traiter_by','administrateurs.id')
        ->where('travails.traiter',1)
        ->get(['travails.*', 'administrateurs.name', 'administrateurs.firstname']);

        return view('adminView.jobs.oldDemande',['jobs'=>$data]);
    }

    function details_job($id){
        $data = Travail::find($id);

        if( $data->traiter_by != NULL){
            $ad = Administrateur::find($data->traiter_by);

            return view('adminView.jobs.detailsDemande',['jobs'=>$data , 'admins'=>$ad]);
        }else{
            return view('adminView.jobs.detailsDemande',['jobs'=>$data]);
        }


    }

    function action_job(Request $req){

        $req->validate([
            'idDemande'=>['required', 'numeric', 'min:1'],
            'action'=>['required','numeric','min:1','max:3']
        ]);

        if($req['action'] == 1){

            $req->validate([
                'date_rdv'=>['required', 'date']
            ]);

            $tr = Travail::find($req['idDemande']);
            $tr->date_rdv = $req['date_rdv'];
            $tr->save();

        }

        if($req['action'] == 2){

            $tr = Travail::find($req['idDemande']);
            $tr->traiter = 1;
            $tr->date_traitement = date('Y-m-d');
            $tr->traiter_by = Auth::user()->id;
            $tr->save();

        }

        if($req['action'] == 3){
            $tr = Travail::find($req['idDemande']);
            $tr->traiter = 1;
            $tr->date_traitement = date('Y-m-d');
            $tr->reject_dossier = 1;
            $tr->traiter_by = Auth::user()->id;
            $tr->save();

        }

        return redirect()->back();
    }
}
