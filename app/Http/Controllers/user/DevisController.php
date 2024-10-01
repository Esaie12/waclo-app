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
use App\Models\Contact;

class DevisController extends Controller
{

    //Envoyer un message depuis la page contac
    function send_message(Request $req){

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

        $contact = Contact::create($details);

        $admins = DB::table('administrateurs')->where('receve_mail', 1)->get(['id','email']);

        foreach ($admins as $value) {
            Mail::to( $value->email )->send( new \App\Mail\SendMsg( $details ));

            $info =[
                'actor_id'=> $value->id,
                'for'=> "admin",
                'title' => "Nouveau message",
                'content' => "Le client ".$req['first_name']." vient d'envoyer un message",
                'link'=> route('admin.devis.details',$contact->id) ,
            ];
            app('App\Http\Controllers\NotificationController')->create_notification($info);
        }

        return redirect()->back()->with('msg', "Message envoyé avec succès");

    }


    //Envoyer un devis à la société
    function send_devis(Request $req){


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
            'services'=>['required','array'],
            'services.*'=>[ 'string'],
        ]);

        $tab=[];
        foreach ($req['services'] as $key => $value) {
           $tab[]=$value;
        }

        $data = [
            'espace' => $req->espace,
            'frequence' => $req->frequence,
            'surface' => $req->surface,
            'demarrage' => $req->demarrage,
            'collabo_society' => $req->collabo_society,
            'your_name' => $req->your_name,
            'email' => $req->email,
            'telephone' => $req->telephone,
            'name_society' => $req->name_society,
            'others' => $req->others,
            'services' => $tab,
            'date_emission' => date('Y-m-d'),
        ];

        //Créer le devis
        $dev = Devi::create($data);

        $info = [
            'user_name' => $req->your_name,
        ];

        Mail::to($req->email)->send(new \App\Mail\UserDevis($info));

        //Envoyer le mail aux admins
        $admins = DB::table('administrateurs')->where('receve_mail', 1)->get(['id','email']);

        foreach ($admins as $value) {
            Mail ::to( $value->email)->send ( new \App\Mail\SendDevis( $data ));

            $info =[
                'actor_id'=> $value->id,
                'for'=> "admin",
                'title' => "Nouvelle demander de devis",
                'content' => "Le client ".$data['your_name']." vient d'envoyer une demande de devis",
                'link'=> route('admin.devis.details',$dev->id) ,
            ];
            app('App\Http\Controllers\NotificationController')->create_notification($info);
        }

        return redirect()->back()->with('msg', "Dévis envoyé avec succès");
    }

    //Demande de job
    function send_job_demande(Request $req){
        $req->validate([
            'your_name'=>['required', 'string', 'max:25'],
            'sexe'=>['required', 'string'],
            'email'=>['required', 'email'],
            'telephone'=>['required', 'string', 'max:15'],
            'age'=>['required', 'numeric', 'min:15'],
            'adresse'=>['required', 'string', 'max:30'],
            'others'=>['required', 'string', 'max:255'],
        ]);

        $details = [
            'sexe'=> $req['sexe'],
            'age'=> $req['age'],
            'adresse'=> $req['adresse'],
            'your_name'=> $req['your_name'],
            'email'=> $req['email'],
            'telephone'=> $req['telephone'],
            'others'=> $req['others'],
            'date_demande'=>date('Y-m-d'),
        ];

        $taf = Travail::create($details);

        $admins = DB::table('administrateurs')->where('receve_mail', 1)
        ->get(['email','id']);


        foreach ($admins as $value) {
            Mail:: to( $value->email)->send( new \App\Mail\SendJob( $details ));

            $info =[
                'actor_id'=> $value->id,
                'for'=> "admin",
                'title' => "Demande d'emploi",
                'content' => $req['your_name']." souhaite rejoindre votre équipe",
                'link'=> route('admin.jobs.details',$taf->id) ,
            ];
            app('App\Http\Controllers\NotificationController')->create_notification($info);

        }

        return redirect()->back()->with('msg', "Demande envoyée avec succès");

    }
}
