<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;
use App\Models\Devi;
use App\Models\Travail;
use App\Models\User;
use App\Models\Administrateur;
use App\Models\Siteweb;

class AdminSettingController extends Controller
{
    function page_setting(){
        return view('adminView.profil.setting');
    }
    function mdp_setting(Request $req){

        $req->validate([
            'old_password'=>['required', 'string', 'min:2'],
            'new_password'=>['required', 'string', 'min:5'],
            'confirm_password'=>['required', 'string', 'min:5']
        ]);
        if($req['new_password'] != $req['confirm_password'] ){

            $u = Administrateur::find(Auth::user()->id);

            if( Hash::check($req['old_password'], $u->password) ){
                $u->password = Hash::make($req['new_password']);
                $u->save();

                return redirect()->back();

            }else{
                return redirect()->back()->with('msg-error', "Impossible de modifier, mot de passe incorrect.");
            }
        }else{
            return redirect()->back()->with('msg-error', "Impossible de modifier, mot de passe incorrect.");
        }
    }

    function siteweb_setting(){
        $si = Siteweb::find(1);
        return view('adminView.settingWeb',['data'=>$si]);
    }

    function site_web_update(Request $req){
        /*
        "adresse":null,"telephone":null,"email_one":null,"email_deux":null,"facebook":null,"twitter":null,"whatsapp":null,"tiktok":null,"google_maps":
        */
        $req->validate([
            'adresse'=>['required', 'string', 'max:30'],
            'telephone'=>['required', 'string', 'max:15'],
            'email_one'=>['required', 'email'],
            'email_deux'=>['nullable', 'email'],
            'facebook'=>['nullable', 'string'],
            'twitter'=>['nullable', 'string'],
            'whatsapp'=>['nullable', 'string'],
            'tiktok'=>['nullable', 'string'],
            'google_maps'=>['required', 'string'],
        ]);

        $si = Siteweb::find(1);
        $si->adresse = $req['adresse'];
        $si->telephone = $req['telephone'];
        $si->email_one = $req['email_one'];
        $si->email_deux = $req['email_deux'];
        $si->facebook = $req['facebook'];
        $si->twitter = $req['twitter'];
        $si->whatsapp = $req['whatsapp'];
        $si->tiktok = $req['tiktok'];
        $si->google_maps = $req['google_maps'];
        $si->save();

        return redirect()->back();
    }

    function new_collabo(){
        return view('adminView.collabo.new');
    }

    function save_collabo(Request $req){
        //,"name":null,"email":null,"telephone":null,"adresse":null,"receve_mail":"1"}
        $req->validate([
            'name'=>['required', 'string', 'min:1', 'max:20'],
            'firstname'=>['required', 'string', 'min:1', 'max:20'],
            'email'=>['required', 'email'],
            'telephone'=>['required', 'numeric'],
            'adresse'=>['required', 'string', 'max:30'],
            'receve_mail'=>['required', 'numeric', 'min:0', 'max:1']
        ]);

        $n= DB::table('administrateurs')
        ->where('email',$req['email'])->count();

        if($n == 0){
            $n= DB::table('administrateurs')->Where('telephone',$req['telephone'])
            ->count();
        }

        if( $n == 0){

            $nbre = random_int(1,100);

            if( random_int(1,2) == 2 ){
                $mdp = $nbre."Waclo".$nbre;
            }else{
                $nbre2 = $nbre +23;
                $mdp = $nbre."Waclo".$nbre2;
            }

            $c = new Administrateur();
            $c->name = $req['name'];
            $c->receve_mail = $req['receve_mail'];
            $c->telephone = $req['telephone'];
            $c->adresse = $req['adresse'];
            $c->firstname = $req['firstname'];
            $c->password = Hash::make($mdp);
            $c->email = $req['email'];
            $c->save();

            $details = [
                'type'=>'admin',
                'name'=> $req['name']." ".$req['firstname'],
                'email'=> 'waclo@gmail.com',
                'mdp'=> $mdp,
                'titre'=> "Vous avez un compte Administrateur chez Waclo",
            ];

            \Mail :: to ( $c->email )
            ->send ( new \App\Mail\NotifCompte( $details ));

            return redirect()->route('admin.collabo.liste');

        }else{
            return redirect()->back();
        }


    }

    function delete_collabo($id){
        $a = Administrateur::find($id);
        $a->delete();
        return redirect()->route('admin.collabo.liste');
    }

    function liste_collabo(){
        $data = DB::table('administrateurs')->get();

        return view('adminView.collabo.liste',['collabo'=>$data]);
    }

    function see_collabo($id){
        $admin = Administrateur::find($id);
        return view('adminView.collabo.see',['data'=>$admin]);
    }

    function setting_collabo(Request $req){
        //"idLigne":"1","name":"OMIYALE","telephone":null,"adresse":null,"receve_mail":"1"


        $req->validate([
            'idLigne'=>['required', 'numeric', 'min:1'],
            'name'=>['required', 'string', 'min:1', 'max:20'],
            'telephone'=>['required', 'numeric'],
            'adresse'=>['required', 'string', 'max:30'],
            'receve_mail'=>['required', 'numeric', 'min:0', 'max:1']
        ]);


        $c = Administrateur::find($req['idLigne']);
        $c->name = $req['name'];
        $c->receve_mail = $req['receve_mail'];
        $c->telephone = $req['telephone'];
        $c->adresse = $req['adresse'];
        $c->firstname = $req['name'];
        $c->save();

        return redirect()->back();

        if( $n == 0){



            $c = Administrateur::find($req['idLigne']);
            $c->name = $req['name'];
            $c->receve_mail = $req['receve_mail'];
            $c->telephone = $req['telephone'];
            $c->adresse = $req['adresse'];
            $c->firstname = $req['name'];
            $c->email = $req['email'];
            $c->save();

            /*
            $details = [
                'type'=>'admin',
                'name'=> $req['name'],
                'email'=> 'waclo@gmail.com',
                'mdp'=> $mdp,
                'titre'=> "Vous avez un compte Administrateur chez Waclo",
            ];

            \Mail :: to ( $c->email )
            ->send ( new \App\Mail\NotifCompte( $details ));
            */

            return redirect()->route('admin.collabo.liste');

        }else{
            return redirect()->back();
        }

        return $req;
    }



    function delete_photo_collabo(){
        $emp = Administrateur::find(Auth::user()->id);
        $emp->photo = NULL;
        $emp->save();

        return redirect()->back();
    }


    function photo_collabo(Request $req){
        $req->validate([
            'photo'=>['nullable','file', 'mimes:jpeg,png,jpeg'],
        ]);

        $em = Administrateur::find(Auth::user()->id);

        if(!empty($req['photo'])){
            $chemin = $req->file('photo')->store('upload/employe', 'public');
            $em->photo = $chemin;
        }

        $em->save();

        return redirect()->back()->with("msg-success","Nouveau employé enregistré avec succès");
    }

}
