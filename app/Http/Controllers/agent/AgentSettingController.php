<?php

namespace App\Http\Controllers\agent;

use App\Models\Devi;
use App\Models\User;

use App\Models\Employe;
use App\Models\Travail;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\ResetPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

    public function verify_reset_email(Request $request)
    {
        // Validation des entrées
        $request->validate([
            'email' => ['required', 'email', 'exists:employes,email'],
        ]);

        $agent = Employe::where('email', $request->email)->first();

        if ($agent) {
            $token = Str::random(60);
            $expiration = now()->addMinutes(60);

            try {
                // Check if there's an existing reset request
                $resetRequest = ResetPassword::where('role_id', $agent->id)->first();

                if (!$resetRequest) {
                    $resetRequest = new ResetPassword();
                    $resetRequest->role_id = $agent->id;
                }

                $resetRequest->token_value = $token;
                $resetRequest->expire_date = $expiration;
                $resetRequest->save();

                // Log the reset request
                Log::info("Reset password request created/updated for admin ID: {$agent->id}");

                $info = [
                    'token' => $resetRequest->token_value,
                    'id' => $resetRequest->role_id,
                    'email' => $agent->email,
                    'role' => 'agent',
                ];

                // Envoi de l'e-mail de réinitialisation du mot de passe
                Mail::to($agent->email)->send(new \App\Mail\ResetPassword($info));

                // Log successful email sending
                Log::info("Reset password email sent to: {$agent->email}");

                return redirect()->back()->with('success', "Un e-mail de réinitialisation du mot de passe a été envoyé.");
            } catch (\Exception $e) {
                // Log the error
                Log::error("Failed to process password reset for admin ID: {$agent->id}, Error: {$e->getMessage()}");

                return redirect()->back()->with('error', "Échec de l'envoi de l'e-mail de réinitialisation. Veuillez réessayer.");
            }
        }

        // Log when no matching admin is found
        Log::warning("No admin found with the provided email: {$request->email}");

        return redirect()->back()->with('error', "Si l'e-mail est associé à un compte administrateur, un lien de réinitialisation sera envoyé.");
    }


    /**  Réinitialiser mot de passe */
    public function reset_password($token, $email)
    {
        $resetPasswordEntry = ResetPassword::where('token_value', $token)->first();

        if ($resetPasswordEntry) {
            // Check if the token has expired
            if (now()->greaterThan($resetPasswordEntry->expire_date)) {
                return redirect()->route('agent.forgot')->with('error', "Demande expirée; veuillez réessayer.");
            }

            // Proceed to the reset password view
            $role = "agent";
            return view('authcommon.reset-password', compact('resetPasswordEntry', 'email', 'role'));
        }

        // Token not found or another error occurred
        return redirect()->route('agent.forgot')->with('error', "Une erreur est survenue; veuillez réessayer.");
    }


    /**  Changer mot de passe */
    function change_password(Request $request)
    {
        $request->validate([
            'token_value' => ['required', 'string', 'exists:reset_passwords,token_value'],
            'password' => ['required', 'string', 'min:6'],
            'password_confirmation' => ['required', 'string', 'min:6', 'same:password'],
        ]);

        // Retrieve the reset request
        $resetRequest = ResetPassword::where('token_value', $request->token_value)->first();

        if ($resetRequest) {
            // Check if the token has expired
            if (now()->greaterThan($resetRequest->expire_date)) {
                return redirect()->route('agent.forgot')->with('error', 'Token expiré. Veuillez refaire une demande de réinitialisation.');
            }

            // Retrieve the user and update the password
            $admin = Employe::find($resetRequest->role_id);
            if ($admin) {
                $admin->password = Hash::make($request->password);
                $admin->save();

                // Delete the reset request entry after successful password reset
                $resetRequest->delete();

                return redirect()->route('agent.login')->with('success', 'Mot de passe modifié avec succès.');
            } else {
                return redirect()->route('agent.forgot')->with('error', "Cet utilisateur n'est pas trouvé.");
            }
        }

        return redirect()->route('agent.forgot')->with('error', 'Une erreur est survenue; veuillez réessayer.');
    }

}
