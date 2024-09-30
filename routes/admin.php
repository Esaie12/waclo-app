<?php
use Illuminate\Support\Facades\Route;
use App\Providers\FortifyServiceProvider;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

use App\Http\Controllers\admin\SocieteController as SocieteController;
use App\Http\Controllers\admin\DirectionController;
use App\Http\Controllers\admin\PersonnelController;

use App\Http\Controllers\admin\TravailController;
use App\Http\Controllers\admin\DevisController;
use App\Http\Controllers\admin\EmployeController;
use App\Http\Controllers\admin\DashController;
use App\Http\Controllers\admin\TravauxController;
use App\Http\Controllers\admin\AdminSettingController as ASController;
use App\Http\Controllers\user\UserSettingController;

Route::get('/2', function(){
    return view('appweb.dashboard');
} )->name('user');

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('home', [DashController::class, 'page_home'] )
    ->middleware('auth:admin')
    ->name('home');

    //Collaborateurs
    Route::middleware(['auth:admin'])->name('collabo.')->prefix('collaborateur')->group(function () {

        Route::get('/new', [ASController::class, "new_collabo"])
        ->name('new');

        Route::post('/save_collabo', [ASController::class, "save_collabo"])
        ->name('save_collabo');

        Route::get('/liste', [ASController::class, "liste_collabo"])
        ->name('liste');

        Route::get('/see/{id}', [ASController::class, "see_collabo"])
        ->name('see');

        Route::post('/setting', [ASController::class, "setting_collabo"])
        ->name('setting');

        Route::post('photo', [ASController::class, "photo_collabo"])
        ->name('photo');


        Route::get('/photo_del', [ASController::class, "delete_photo_collabo"])
        ->name('photo_del');

        Route::get('/delete/{id}', [ASController::class , "delete_collabo"])
        ->name('delete_collabo');

    });

    //Les parametres
    Route::middleware(['auth:admin'])->name('setting.')->prefix('setting')->group(function () {

        Route::get('/', [ASController::class, "page_setting"])
        ->name('index');

        Route::post('/mdp', [ASController::class, "mdp_setting"])
        ->name('mdp');

        Route::post('/update', [ASController::class, "update_setting"])
        ->name('update');

        Route::get('/siteweb', [ASController::class, "siteweb_setting"])
        ->name('siteweb');

        Route::post('/site_web_update', [ASController::class, "site_web_update"])
        ->name('site_web_update');

    });

    //Les demandes de devis
    Route::prefix('devis-demandes')->middleware('auth:admin')->name('devis.')->group(function () {

        Route::get('/new', [DevisController::class, "les_nouvelles_demandes"])
        ->name('new');

        Route::get('/old', [DevisController::class, "les_anciennes_demandes"])
        ->name('old');


        Route::get('details/{id}', [DevisController::class, 'voir_details'])
        ->name('details');

        Route::post('valid', [DevisController::class, 'valide_demande'])
        ->name('valide');

    });

    //Les jobs
    Route::middleware(['auth:admin'])->prefix('job')->name('jobs.')->group(function () {

        Route::get('/new', [TravailController::class, 'new_job'])
        ->name('new');

        Route::get('/old', [TravailController::class, 'old_job'])
        ->name('old');

        Route::get('/rdv', [TravailController::class, 'rdv_job'])
        ->name('rdv');

        Route::get('/details/{id}', [TravailController::class, 'details_job'])
        ->name('details');

        Route::post('actions', [TravailController::class, "action_job"])
        ->name('actions');

    });

    //Les employés
    Route::middleware(['auth:admin'])->prefix('employment')->name('employes.')->group(function () {

        Route::get('liste', [EmployeController::class, "liste_empl"])
        ->name('liste');

        Route::get('new', [EmployeController::class, "new_empl"])
        ->name('new');

        Route::post('save_new', [EmployeController::class, "save_new_empl"])
        ->name('save_new');

        Route::get('see/{id}', [EmployeController::class, "see_empl"])
        ->name('see');

        Route::post('update', [EmployeController::class, "modifier_empl"])
        ->name('update');

        Route::get('delete_photo/{id}', [EmployeController::class, "delete_photo_empl"])
        ->name('delete_photo');


        Route::get('delete_empl/{id}', [EmployeController::class, "delete_empl"])
        ->name('delete_empl');

        Route::post('setting', [EmployeController::class, "setting_empl"])
        ->name('setting');

    });

    //Les travaux
    Route::middleware(['auth:admin'])->prefix('travaux')->name('travaux.')->group(function () {

        Route::get('new', [TravauxController::class, "new_travaux"])
        ->name('new');

        Route::post('save_new', [TravauxController::class, "save_new_travaux"])
        ->name('save_new');

        Route::get('delete/{id}', [TravauxController::class, "delete_travaux"])
        ->name('delete');

        Route::get('edit/{id}', [TravauxController::class, "modifier_travaux"])
        ->name('edit');

        Route::post('save_update', [TravauxController::class, "save_update_travaux"])
        ->name('save_update');

        Route::get('encours', [TravauxController::class, "encours_travaux"])
        ->name('encours');

        Route::get('historique', [TravauxController::class, "historique_travaux"])
        ->name('historique');

        Route::get('boucler/{id}', [TravauxController::class, "boucler"])
        ->name('boucler');

        Route::get('programmes/{id}', [TravauxController::class, "programmes_view"])
        ->name('programmes');

        Route::get('confirm/{id}', [TravauxController::class, "confirm_programmes"])
        ->name('confirm_programmes');

        Route::get('annuler/{id}', [TravauxController::class, "annuler_programmes"])
        ->name('annuler_programmes');

        Route::post('save_programmes', [TravauxController::class, "save_programmes"])
        ->name('save_programmes');

        Route::get('delete_programme/{id}', [TravauxController::class, "del_programme"])
        ->name('del_programme');


    });

    //LEs clients
    Route::middleware(['auth:admin'])->prefix('clients')->name('clients.')->group(function () {

        Route::get('/new',[DashController::class, 'new_client'])
        ->name('new');

        Route::post('/save_client',[DashController::class, 'save_client'])
        ->name('save_client');

        Route::get('/', [DashController::class, 'mes_clients'])
        ->name('mesclients');

        Route::get('/see/{id}', [DashController::class, 'see_client'])
        ->name('see');

        Route::post('/update_client',[DashController::class, 'update_client'])
        ->name('update');

        Route::get('/delete/{id}', [DashController::class, 'delete_client'])
        ->name('delete_client');

    });


    Route::get('login',function(){ return view('auth.loginAdmin'); })
    ->middleware(['guest:admin'])
    ->name('login');

    Route::get('/forgot', function () {
        return view('auth.forgot-password');
    })->name('forgot')->middleware(['guest:admin']);

    Route::post('forgot-password', [UserSettingController::class, 'verify_reset_email'])->name('forgot-password')->middleware(['guest:admin']);
    Route::get('reset-password/{token}/{email}', [UserSettingController::class, 'reset_password'])->name('reset-password')->middleware(['guest:admin']);
    Route::post('change-password', [UserSettingController::class, 'change_password'])->name('change-password')->middleware(['guest:admin']);

    $limiter = config('fortify.limiters.login');
    $twoFactorLimiter = config('fortify.limiters.two-factor');
    $verificationLimiter = config('fortify.limiters.verification', '6,1');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:admin',
            $limiter ? 'throttle:'.$limiter : null,
        ]));

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:admin')
        ->name('logout');

});
