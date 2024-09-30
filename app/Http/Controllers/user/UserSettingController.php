<?php

namespace App\Http\Controllers\user;

use App\Models\Devi;
use App\Models\User;

use App\Models\Travail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\ResetPassword;
use App\Models\Administrateur;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

    public function verify_reset_email(Request $request)
    {
        // Validation des entrées
        $request->validate([
            'email' => ['required', 'email', 'exists:administrateurs,email'],
        ]);

        $admin = Administrateur::where('email', $request->email)->first();

        if ($admin) {
            $token = Str::random(60);
            $expiration = now()->addMinutes(60);

            try {
                // Check if there's an existing reset request
                $resetRequest = ResetPassword::where('role_id', $admin->id)->first();

                if (!$resetRequest) {
                    $resetRequest = new ResetPassword();
                    $resetRequest->role_id = $admin->id;
                }

                $resetRequest->token_value = $token;
                $resetRequest->expire_date = $expiration;
                $resetRequest->save();

                // Log the reset request
                Log::info("Reset password request created/updated for admin ID: {$admin->id}");

                $info = [
                    'token' => $resetRequest->token_value,
                    'id' => $resetRequest->role_id,
                    'email' => $admin->email,
                    'role' => 'admin',
                ];

                // Envoi de l'e-mail de réinitialisation du mot de passe
                Mail::to($admin->email)->send(new \App\Mail\ResetPassword($info));

                // Log successful email sending
                Log::info("Reset password email sent to: {$admin->email}");

                return redirect()->back()->with('success', "Un e-mail de réinitialisation du mot de passe a été envoyé.");
            } catch (\Exception $e) {
                // Log the error
                Log::error("Failed to process password reset for admin ID: {$admin->id}, Error: {$e->getMessage()}");

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
                return redirect()->route('admin.forgot')->with('error', "Demande expirée; veuillez réessayer.");
            }

            // Proceed to the reset password view
            $role = "admin";
            return view('authcommon.reset-password', compact('resetPasswordEntry', 'email', 'role'));
        }

        // Token not found or another error occurred
        return redirect()->route('admin.forgot')->with('error', "Une erreur est survenue; veuillez réessayer.");
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
                return redirect()->route('admin.forgot')->with('error', 'Token expiré. Veuillez refaire une demande de réinitialisation.');
            }

            // Retrieve the user and update the password
            $admin = Administrateur::find($resetRequest->role_id);
            if ($admin) {
                $admin->password = Hash::make($request->password);
                $admin->save();

                // Delete the reset request entry after successful password reset
                $resetRequest->delete();

                return redirect()->route('admin.login')->with('success', 'Mot de passe modifié avec succès.');
            } else {
                return redirect()->route('admin.forgot')->with('error', "Cet utilisateur n'est pas trouvé.");
            }
        }

        return redirect()->route('admin.forgot')->with('error', 'Une erreur est survenue; veuillez réessayer.');
    }

}
