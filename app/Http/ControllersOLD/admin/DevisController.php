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

class DevisController extends Controller
{

    function les_nouvelles_demandes(){

        $data = DB::table('devis')->where('traiter',0)
        ->get();

        return view('adminView.devis.newDemande',['devis'=>$data]);
    }

    function les_anciennes_demandes(){

        $data = DB::table('devis')
        ->join('administrateurs', 'devis.traiter_by','administrateurs.id')
        ->where('traiter',1)
        ->get(['devis.*', 'administrateurs.name', 'administrateurs.firstname']);

        return view('adminView.devis.oldDemande',['devis'=>$data]);
    }

    function voir_details($id){

        $data = DB::table('devis')->where('id',$id)
        ->first();

        if( $data->traiter_by != NULL){
            $ad = Administrateur::find($data->traiter_by);

            return view('adminView.devis.detailsDemande',['devis'=>$data , 'admins'=>$ad]);
        }else{
            return view('adminView.devis.detailsDemande',['devis'=>$data]);
        }

    }

    function valide_demande(Request $req){
        $req->validate([
            'idDemande'=>['required', 'numeric', 'min:1'],
            'facture'=>['required', 'file', 'mimes:pdf,word,jpeg,png,jpeg']
        ]);

        $chemin = $req->file('facture')->store('upload/facture_pro','public');

        $de = Devi::find($req['idDemande']);
        $de->fichier_send = $chemin;
        $de->traiter = 1;
        $de->traiter_by = Auth::user()->id;
        $de->date_traitement = date('Y-m-d');
        $de->save();

        return redirect()->route('admin.devis.details',$req['idDemande'])
        ->with('msg-success', "Devis traité avec succès");
    }
}
