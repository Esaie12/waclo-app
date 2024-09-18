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
use App\Models\User;

class DashController extends Controller
{
    function page_home(){
        $d1 = DB::table('employes')->where('actif',1)->count();
        $d1a = DB::table('employes')->where('actif',0)->count();

        $d2 = DB::table('devis')->where('traiter',0)->count();
        $d2a = DB::table('devis')->where('traiter',1)->count();

        $d3 = DB::table('travails')->where('traiter',0)->count();
        $d3a = DB::table('travails')->where('traiter',1)->count();

        $d4 = DB::table('administrateurs')->count();

        $d5 = DB::table('users')->count();

        $nbre =[
            'employes'=>$d1,
            'total_employes'=>$d1a,
            'devis'=>$d2,
            'total_devis'=>$d2a,
            'jobs'=>$d3,
            'total_jobs'=>$d3a,
            'admin'=>$d4,
            'client'=>$d5
        ];
        return view('adminView.dashboard',['nbre'=>$nbre]);
    }

    function mes_clients(){
        $data = DB::table('users')
        ->get();

        return view('adminView.clients.liste',['clients'=>$data]);
    }

    function new_client(){
        return view('adminView.clients.new');
    }

    function save_client(Request $req){
        //"name":null,"type_client":null,"email":null,"adresse":null,"telephone":null}
        /*

        */

        $nbre = random_int(1,100);

        if( random_int(1,2) == 2 ){
            $mdp = $nbre."Waclo".$nbre;
        }else{
            $nbre2 = $nbre +23;
            $mdp = $nbre."Waclo".$nbre2;
        }

        $req->validate([
            'name'=>['required', 'string', 'max:30'],
            'type_client'=>['required', 'string', 'max:30'],
            'email'=>['required', 'email'],
            'adresse'=>['required', 'string', 'min:2', 'max:50'],
            'telephone'=>['nullable', 'string', 'min:8', 'max:15'],
        ]);

        $n = DB::table('users')->where('email', $req['email'])->count();
        if($n != 0){
            $req['email'] = "";

            $req->validate([
                'name'=>['required', 'string', 'max:30'],
                'type_client'=>['required', 'string', 'max:30'],
                'email'=>['required', 'email'],
            ]);
        }

        $n  = new User();
        $n->name = $req['name'];
        $n->type_client = $req['type_client'];
        $n->email = $req['email'];
        $n->adresse = $req['adresse'];
        $n->telephone = $req['telephone'];
        $n->password = Hash::make($mdp);
        $n->date_sign = date('Y-m-d');
        $n->save();

        $details = [
            'type'=>'client',
            'name'=> $req['name'],
            'email'=> 'waclo@gmail.com',
            'mdp'=> $mdp,
            'titre'=> "Vous avez un compte Client chez Waclo",
        ];

        \Mail :: to ( $n->email )
        ->send ( new \App\Mail\NotifCompte( $details ));

        return redirect()->route('admin.clients.mesclients');

    }

    function see_client($id){
        $data = User::find($id);
        return view('adminView.clients.see',['data'=>$data]);
    }

    function update_client(Request $req){
        $req->validate([
            'idUser'=>['required', 'numeric', 'min:1'],
            'name'=>['required', 'string', 'max:30'],
            'type_client'=>['required', 'string', 'max:15'],
            'email'=>['required', 'email'],
            'adresse'=>['required', 'string', 'min:2', 'max:50'],
            'telephone'=>['nullable', 'string', 'min:8', 'max:15'],
        ]);


        $n = DB::table('users')->where('email', $req['email'])
        ->where('id', '!=', $req['idUser'])->count();

        if($n == 0){

            $n  = User::find($req['idUser']);
            $n->name = $req['name'];
            $n->type_client = $req['type_client'];
            $n->email = $req['email'];
            $n->adresse = $req['adresse'];
            $n->telephone = $req['telephone'];
            $n->save();

            /*
            $details = [
                'name'=> $req['name'],
                'email'=> 'waclo@gmail.com',
                'mdp'=> $mdp,
            ];

            \Mail :: to ( $n->email )
            ->send ( new \App\Mail\NotifCompte( $details ));
            */
            return redirect()->back();

        }else{
            return redirect()->back();
        }


    }

    function delete_client($id){
        $d = User::find($id);
        $d->delete();

        return redirect()->route('admin.clients.mesclients');
    }
}
