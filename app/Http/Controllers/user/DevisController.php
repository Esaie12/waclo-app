<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;
use App\Models\Devi;
use App\Models\Travail;

class DevisController extends Controller
{
    function send_message(Request $req){

        /*
        ,"first_name":"uj","email":"y@mil.com","phone":"95962410","message":"BBniiuu","submit"
        */
        $req->validate([
            'first_name'=>['required', 'string'],
            'email'=> ['required', 'email'],
            'phone'=>['required', 'numeric'],
            'message'=>['required', 'string'],
        ]);

        $details = [
            'first_name'=>$req['first_name'],
            'email'=>$req['email'],
            'phone'=>$req['phone'],
            'message'=>$req['message'],
        ];

        $ad = DB::table('administrateurs')->where('receve_mail', 1)
        ->get(['email']);

        foreach ($ad as $value) {

            \Mail :: to (  $value->email )
             ->send ( new \App\Mail\SendMsg( $details ));
        }



        return redirect()->back()->with('msg', "ok");

    }

    function send_devis(Request $req){
        /*
        espace":null,"frequence":"Quotidiennement","surface":"Moins de 50 m\u00b2","demarrage":"D'ici une semaine","activite_society":null,"your_name":null,"email":null,"telephone":null,"name_society":null,"others"
        */

        $req->validate([
            'espace'=>['required', 'string','min:1'],
            'frequence'=>['required', 'string','min:1'],
            'surface'=>['required', 'string','min:1'],
            'demarrage'=>['required', 'string','min:1'],
            //'activite_society'=>['nullable', 'string','min:1'],
            'collabo_society'=>['nullable', 'string','min:1'],
            'your_name'=>['required', 'string','min:1'],
            'email'=>['required', 'string','min:1'],
            'telephone'=>['required', 'string','min:1'],
            'name_society'=>['nullable', 'string','min:1'],
            'others'=>['nullable', 'string','min:1'],
            'services'=>['required'],
            'services.*'=>[ 'string','min:1'],
        ]);

        $dev = new Devi();
        $dev->espace = $req['espace'];
        $dev->frequence = $req['frequence'];
        $dev->surface = $req['surface'];
        $dev->demarrage = $req['demarrage'];
        $dev->collabo_society = $req['collabo_society'];
        $dev->your_name = $req['your_name'];
        $dev->email = $req['email'];
        $dev->telephone = $req['telephone'];
        $dev->name_society = $req['name_society'];
        $dev->others = $req['others'];
        $dev->services = json_encode($req['services']);
        $dev->date_emission = date('Y-m-d');
        $dev->save();

        $details = [
            "espace" => $req['espace'],
            'frequence'=> $req['frequence'],
            'surface'=> $req['surface'],
            'demarrage'=> $req['demarrage'],
            //'activite_society'=> $req['activite_society'],
            'collabo_society'=> $req['collabo_society'],
            'your_name'=> $req['your_name'],
            'email'=> $req['email'],
            'telephone'=> $req['telephone'],
            'name_society'=> $req['name_society'],
            'others'=> $req['others'],
            'services'=> json_encode($req['services']),
        ];

        $ad = DB::table('administrateurs')->where('receve_mail', 1)
        ->get(['email']);

        foreach ($ad as $value) {
            \Mail :: to (  $value->email )
            ->send ( new \App\Mail\SendDevis( $details ));
        }



        return redirect()->back()->with('msg', "ok");

    }

    function send_job_demande(Request $req){
        //"your_name":null,"sexe":"Masculin","email":null,"telephone":null,"age":"18","adresse":null,"others"#
        $req->validate([
            'your_name'=>['required', 'string', 'max:25'],
            'sexe'=>['required', 'string'],
            'email'=>['required', 'email'],
            'telephone'=>['required', 'string', 'max:15'],
            'age'=>['required', 'numeric', 'min:15'],
            'adresse'=>['required', 'string', 'max:30'],
            'others'=>['required', 'string', 'max:255'],
        ]);

        $tr = new Travail();
        $tr->sexe = $req['sexe'];
        $tr->age = $req['age'];
        $tr->adresse = $req['adresse'];
        $tr->your_name = $req['your_name'];
        $tr->email = $req['email'];
        $tr->telephone = $req['telephone'];
        $tr->others = $req['others'];
        $tr->date_demande =date('Y-m-d');
        $tr->save();

        $details = [
            'sexe'=> $req['sexe'],
            'age'=>$req['age'],
            'adresse'=>$req['adresse'],
            'your_name'=> $req['your_name'],
            'email'=> $req['email'],
            'telephone'=> $req['telephone'],
            'others'=> $req['others'],
        ];

        $ad = DB::table('administrateurs')->where('receve_mail', 1)
        ->get(['email']);

        foreach ($ad as $value) {
            \Mail :: to ( $value->email )
            ->send ( new \App\Mail\SendJob( $details ));
        }


        return redirect()->back()->with('msg', "ok");

    }
}
