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
use App\Models\User;

class UserSettingController extends Controller
{
    function page_setting(){
        $data =  User::find(Auth::user()->id);
        return view('userView.settingUser',['data'=>$data]);
    }
    function mdp_setting(Request $req){

        $req->validate([
            'old_password'=>['required', 'string', 'min:2'],
            'new_password'=>['required', 'string', 'min:5'],
            'confirm_password'=>['required', 'string', 'min:5']
        ]);
        if($req['new_password'] != $req['confirm_password'] ){

            $u = User::find(Auth::user()->id);

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
            'name'=>['required', 'string', 'max:30'],
            'type_client'=>['required', 'string', 'max:15'],
            'adresse'=>['required', 'string', 'min:2', 'max:50'],
            'telephone'=>['nullable', 'string', 'min:8', 'max:15'],
        ]);


        $n  = User::find(Auth::user()->id);
        $n->name = $req['name'];
        $n->type_client = $req['type_client'];
        $n->adresse = $req['adresse'];
        $n->telephone = $req['telephone'];
        $n->save();


        return redirect()->back();

    }

}
