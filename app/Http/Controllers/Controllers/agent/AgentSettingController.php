<?php

namespace App\Http\Controllers\agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;
use App\Models\Devi;
use App\Models\Travail;
use App\Models\Employe;
use App\Models\User;

class AgentSettingController extends Controller
{
    function page_setting(){
        $data =  Employe::find(Auth::user()->id);
        return view('agentView.setting',['employe'=>$data]);
    }
    function mdp_setting(Request $req){

        $req->validate([
            'old_password'=>['required', 'string', 'min:2'],
            'new_password'=>['required', 'string', 'min:5'],
            'confirm_password'=>['required', 'string', 'min:5']
        ]);
        if($req['new_password'] != $req['confirm_password'] ){

            $u = Employe::find(Auth::user()->id);

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


    function update_setting(Request $req){

        $req->validate([
            'name'=>['required','string', 'max:25'],
            'telephone'=>['required','string', 'max:15'],
            'adresse'=>['required','string', 'max:30'],
            'birthday'=>['required','date'],
            'sexe'=>['required','string', 'max:10'],
        ]);

        $em = Employe::find(Auth::user()->id);
        $em->name = $req['name'];
        $em->telephone = $req['telephone'];
        $em->adresse = $req['adresse'];
        $em->birthday = $req['birthday'];
        $em->sexe = $req['sexe'];
        $em->save();

        return redirect()->back();

    }

    function delete_empl(){
        $emp = Employe::find(Auth::user()->id);
        $emp->photo = NULL;
        $emp->delete();

        return redirect()->route('admin.employes.liste');
    }

    function delete_photo_empl(){
        $emp = Employe::find(Auth::user()->id);
        $emp->photo = NULL;
        $emp->save();

        return redirect()->back();
    }


    function setting_empl(Request $req){
        $req->validate([
            'photo'=>['nullable','file', 'mimes:jpeg,png,jpeg'],
        ]);

        $em = Employe::find(Auth::user()->id);

        if(!empty($req['photo'])){
            $chemin = $req->file('photo')->store('upload/employe', 'public');
            $em->photo = $chemin;
        }

        $em->save();

        return redirect()->back()->with("msg-success","Nouveau employé enregistré avec succès");
    }

}
