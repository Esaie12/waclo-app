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
use App\Models\Employe;
use App\Models\Contrat;
use App\Models\Programme;
use App\Models\Sousprogramme;

class TravauxController extends Controller
{
    function new_travaux(){
        return view('adminView.travaux.new');
    }

    //Enregistrer un contrat
    function save_new_travaux(Request $req){

        $req->validate([
            'client'=>['required', 'numeric', 'min:1'],
            'date_debut'=>['required', 'date'],
            'date_fin'=>['nullable', 'date'],
            'frequence'=>['required', 'numeric', 'min:1'],
            'modalite'=>['required', 'string', 'min:2'],
            'fichier_contrat'=>['nullable', 'file', 'mimes:pdf,doc,docx'],
        ]);

        if(!empty($req['fichier_contrat'])){
            $chemin = $req->file('fichier_contrat')->store('upload/client', 'public');
        }

        $contrat = Contrat::create([
            'id_client'=> $req['client'],
            'date_debut'=>$req['date_debut'],
            'date_fin'=> $req['date_fin'],
            'frequence'=> $req['frequence'],
            'modalite'=>$req['modalite'],
            'fichier_contrat'=>$chemin ?? null,
            'date_create'=> date('Y-m-d'),
            'creer_by'=> Auth::user()->id,
        ]);

        $info =[
            'actor_id'=> $contrat->id_client,
            'for'=> "user",
            'title' => "Felicitation, notre contrat est pret",
            'content' => "Nous vous informons que le contrat  est pret et débute le ".$contrat->date_debut.". Vous serrez informer des passages de notre équipe.",
            'link'=> route('mescontrats') ,
        ];
        app('App\Http\Controllers\NotificationController')->create_notification($info);

        return redirect()->route('admin.travaux.encours');
    }

    function save_update_travaux(Request $req){
        //"client":"2","date_debut":null,"date_fin":null,"frequence":"1","modalite":"Jours
        $req->validate([
            'idLigne'=>['required', 'numeric', 'min:1'],
            'client'=>['required', 'numeric', 'min:1'],
            'date_debut'=>['required', 'date'],
            'date_fin'=>['nullable', 'date'],
            'frequence'=>['required', 'numeric', 'min:1'],
            'modalite'=>['required', 'string', 'min:2'],
            'fichier_contrat'=>['nullable', 'file', 'mimes:pdf,doc,docx'],
        ]);

        $ct = Contrat::find($req['idLigne']);
        $ct->id_client = $req['client'];
        $ct->date_debut = $req['date_debut'];
        $ct->date_fin = $req['date_fin'];
        $ct->frequence = $req['frequence'];
        $ct->modalite = $req['modalite'];

        if(!empty($req['fichier_contrat'])){
            $chemin = $req->file('fichier_contrat')->store('upload/client', 'public');
            $ct->fichier_contrat = $chemin;
        }
        $ct->date_create = date('Y-m-d');
        $ct->creer_by = Auth::user()->id;
        $ct->save();

        return redirect()->route('admin.travaux.encours');
    }

    function encours_travaux(){

        $data = DB::table('contrats')
        ->join('users', 'contrats.id_client', 'users.id')
        ->where('boucler',0)
        ->get(['contrats.*','users.name']);

        return view('adminView.travaux.encours', ['data'=>$data]);
    }

    function historique_travaux(){

        $data = DB::table('contrats')
        ->join('users', 'contrats.id_client', 'users.id')
        ->where('boucler',1)
        ->get(['contrats.*','users.name']);

        return view('adminView.travaux.historique', ['data'=>$data]);
    }

    function programmes_view($id){

        $data1 = DB::table('contrats')
        ->select(['contrats.*','users.name'])
        ->join('users', 'contrats.id_client', 'users.id')
        ->where('contrats.id',$id)->first();

        $data = DB::table('programmes')
        ->where('id_contrat',$id)
        ->orderBy('date_passage')->get();

        return view('adminView.travaux.programme',['idContrat'=>$id,'contrat'=>$data1, 'programmes'=>$data]);
    }

    function delete_travaux($id){
        $data = Contrat::find($id);
        $data->delete();

        //Supprimer les programmes
        $data2 = DB::table('programmes')->where('id_contrat',$id)->get(['id']);

        foreach ($data2 as  $value) {
            $d = Programme::find($value->id);
            $d->delete();
        }

        return redirect()->route('admin.travaux.encours');
    }

    function modifier_travaux($id){
        $data = Contrat::find($id);
        return view('adminView.travaux.editer',['data'=>$data]);
    }

    function boucler($id){
        $pro = Contrat::find($id);
        $pro->boucler = 1;
        $pro->save();

        return redirect()->route('admin.travaux.historique');
    }


    function save_programmes(Request $req){
        //"idContrat":"1","date_passage":null,"heure_debut":null,"heure_fin":employes
        $req->validate([
            'idContrat'=>['required', 'numeric', 'min:1'],
            'date_passage'=>['required','date'],
            'heure_debut'=>['required'],
            'heure_fin'=>['required'],
            'employes'=>['required'],
            'employes.*'=>['string', 'min:1']
        ]);

        $tab=[]; $tabId=[];
        foreach ($req['employes'] as $key => $value) {
            $tab[] = $value;

            $u = DB::table('employes')->select(['id'])
            ->where('name',$value)->first();

            $tabId[] = $u->id;
        }

        $pm = new Programme();
        $pm->id_contrat = $req['idContrat'];
        $pm->date_passage = $req['date_passage'];
        $pm->heure_debut = $req['heure_debut'];
        $pm->heure_fin = $req['heure_fin'];
        $pm->employes = json_encode($tab);
        $pm->employes_id = json_encode($tabId);
        $pm->creer_by = Auth::user()->id;
        $pm->save();

        foreach ($tabId as $key => $value) {
            $m = new Sousprogramme();
            $m->id_employe = $value;
            $m->id_contrat = $req['idContrat'];
            $m->id_programme = $pm->id;
            $m->save();


            $info =[
                'actor_id'=> $value,
                'for'=> "agent",
                'title' => "Important : Emploi du temps",
                'content' => "Vous avez un programme pour le ".$req['heure_fin']." de ".$req['heure_debut']." à ".$req['heure_fin'].". Veuillez consulter votre emploi de temps",
                'link'=> route('agent.agenda') ,
            ];
            app('App\Http\Controllers\NotificationController')->create_notification($info);

        }


        return redirect()->back();
    }

    function del_programme($id){

        $dat = Programme::find($id);
        $dat->delete();

        $data = DB::table('sousprogrammes')->where('id_programme',$id)->get(['id']);

        foreach ($data as $key => $value) {
            $p = Sousprogramme::find($value->id);
            $p->delete();
        }

        return redirect()->back();
    }


    function confirm_programmes($id){
        $d = Programme::find($id);
        $d->effectuer = 1;
        $d->save();

        return redirect()->back();
    }

    function annuler_programmes($id){
        $d = Programme::find($id);
        $d->effectuer = 0;
        $d->save();

        return redirect()->back();
    }


}
