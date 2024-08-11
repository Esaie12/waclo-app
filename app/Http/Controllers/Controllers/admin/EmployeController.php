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

class EmployeController extends Controller
{
    function liste_empl(){

        $data = DB::table('employes')
        ->get();

        return view('adminView.employes.liste',['employes'=>$data]);
    }
    function new_empl(){
        return view('adminView.employes.new');
    }

    function save_new_empl(Request $req){

        /*
        name":null,"email":null,"telephone":null,"adresse":null,"birthday":null,"sexe":"Masculin","photo":null,"date_fonction":null,"date_fin_contrat":null,"contrat":
        */
        /*

        $nbre = random_int(1,100);

        if( random_int(1,2) == 2 ){
            $mdp = $nbre."Waclo".$nbre;
        }else{
            $nbre2 = $nbre +23;
            $mdp = $nbre."Waclo".$nbre2;
        }
        */


        $req->validate([
            'name'=>['required','string', 'max:25'],
            'email'=>['nullable','email'],
            'telephone'=>['required','integer'],
            'adresse'=>['required','string', 'max:30'],
            'birthday'=>['required','date'],
            'sexe'=>['required','string', 'max:10'],
            'date_fonction'=>['required','date'],
            'date_fin_contrat'=>['required','date'],
            'photo'=>['nullable','file', 'mimes:jpeg,png,jpeg'],
            'contrat'=>['nullable','file', 'mimes:pdf,doc,docx'],
            'password'=>['required', 'string', 'min:5'],
        ]);

        $nr = DB::table('employes')
        ->where('email',$req['email'])->orWhere('telephone',$req['telephone'])
        ->count();

        if($nr != 0){
            $req['email'] = '';
            $req['telephone'] ="";

            $req->validate([
                'name'=>['required','string', 'max:25'],
                'email'=>['nullable','email'],
                'telephone'=>['required','integer'],
                'adresse'=>['required','string', 'max:30'],
                'birthday'=>['required','date'],
                'sexe'=>['required','string', 'max:10'],
                'date_fonction'=>['required','date'],
                'date_fin_contrat'=>['required','date'],
                'photo'=>['nullable','file', 'mimes:jpeg,png,jpeg'],
                'contrat'=>['nullable','file', 'mimes:pdf,doc,docx'],
                'password'=>['required', 'string', 'min:5'],
            ]);
        }

        $em = new Employe();
        $em->name = $req['name'];
        $em->email = $req['email'];
        $em->telephone = $req['telephone'];
        $em->adresse = $req['adresse'];
        $em->birthday = $req['birthday'];
        $em->sexe = $req['sexe'];
        $em->date_fonction = $req['date_fonction'];
        $em->date_fin_contrat = $req['date_fin_contrat'];
        if(!empty($req['photo'])){
            $chemin = $req->file('photo')->store('upload/employe', 'public');
            $em->photo = $chemin;
        }
        if(!empty($req['contrat'])){
            $chemin = $req->file('contrat')->store('upload/employe', 'public');
            $em->contrat = $chemin;
        }
        $em->creer_par = Auth::user()->id ;
        $em->date_create = date('Y-m-d');
        //$em->password =  Hash::make($mdp);
        $em->password =  Hash::make($req['password']);
        $em->save();

        if(!empty($req['email'])){

            $details = [
                'type'=>'agent',
                'name'=> $req['name'],
                'email'=> 'waclo@gmail.com',
                'mdp'=> $req['password'],
                'titre'=> "Vous avez un compte Agent chez Waclo",
            ];

            \Mail :: to ( $em->email )
            ->send ( new \App\Mail\NotifCompte( $details ));

        }
        /*

        */

        return redirect()->route('admin.employes.liste')->with("msg-success","Nouveau employé enregistré avec succès");

    }

    function modifier_empl(Request $req){
        $req->validate([
            'idEmploye'=>['required','numeric', 'min:1'],
            'name'=>['required','string', 'max:25'],
            'email'=>['nullable','email'],
            'telephone'=>['required','string', 'max:15'],
            'adresse'=>['required','string', 'max:30'],
            'birthday'=>['required','date'],
            'sexe'=>['required','string', 'max:10'],
            'date_fonction'=>['required','date'],
            'date_fin_contrat'=>['required','date'],
            'password'=>['nullable', 'string', 'min:5'],
        ]);

        $em = Employe::find($req['idEmploye']);
        $em->name = $req['name'];
        $em->email = $req['email'];
        $em->telephone = $req['telephone'];
        $em->adresse = $req['adresse'];
        $em->birthday = $req['birthday'];
        $em->sexe = $req['sexe'];
        if( !empty($req['password']) ){
            $em->password =  Hash::make($req['password']);
        }
        $em->date_fonction = $req['date_fonction'];
        $em->date_fin_contrat = $req['date_fin_contrat'];
        $em->save();

        return redirect()->back()->with("msg-success","Informations de l'employé modifiées avec succès");
    }

    function see_empl($id){
        $data = Employe::find($id);
        return view('adminView.employes.see',['employe'=>$data]);
    }

    function delete_photo_empl($id){
        $emp = Employe::find($id);
        $emp->photo = NULL;
        $emp->save();

        return redirect()->back();
    }

    function delete_empl($id){
        $emp = Employe::find($id);
        $emp->photo = NULL;
        $emp->delete();

        return redirect()->route('admin.employes.liste');
    }

    function setting_empl(Request $req){
        $req->validate([
            'idEmploye'=>['required','numeric', 'min:1'],
            'photo'=>['nullable','file', 'mimes:jpeg,png,jpeg'],
            'contrat'=>['nullable','file', 'mimes:pdf,doc,docx'],
        ]);

        $em = Employe::find($req['idEmploye']);

        if(!empty($req['photo'])){
            $chemin = $req->file('photo')->store('upload/employe', 'public');
            $em->photo = $chemin;
        }
        if(!empty($req['contrat'])){
            $chemin = $req->file('contrat')->store('upload/employe', 'public');
            $em->contrat = $chemin;
        }
        $em->save();

        return redirect()->back()->with("msg-success","Nouveau employé enregistré avec succès");
    }

}
