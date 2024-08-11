<?php

use Illuminate\Support\Facades\Route;
use App\Providers\FortifyServiceProvider;

use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\user\DevisController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\UserSettingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('siteweb.index');
})->name('index');

Route::get('/about', function () {
    return view('siteweb.about');
})->name('about');


Route::get('/travaillez-avec-nous', function () {
    return view('siteweb.job');
})->name('job');

Route::get('/service', function () {
    return view('siteweb.service');
})->name('service');

Route::prefix('service')->name('services.')->group(function () {

    Route::get('nettoyage-de-bureau',function () {
        return view('siteweb.pages.bureau');
    })->name('bureau');

    Route::get('nettoyage-de-lieu-commercial',function () {
        return view('siteweb.pages.commerce');
    })->name('commerce');

    Route::get('nettoyage-de-copropriété',function () {
        return view('siteweb.pages.maison');
    })->name('maison');

    Route::get('nettoyage-ponctuel-et-remises-en-etat',function () {
        return view('siteweb.pages.ponctuel');
    })->name('ponctuel');

    Route::get('nettoyage-des-restaurants-et-hotels',function () {
        return view('siteweb.pages.hotel');
    })->name('restaurant');
});

Route::get('/contact', function () {
    return view('siteweb.contact');
})->name('contact');

Route::get('/faire-un-devis', function () {
    return view('siteweb.devis');
})->name('devis');

Route::post('make-devis-gratuitement', [DevisController::class, "send_devis"])
->name('send_devis');

Route::post('send-message', [DevisController::class, "send_message"])
->name('send_msg');

Route::post('send-job-demande', [DevisController::class, "send_job_demande"])
->name('send_demande');

//file:///C:/Users/Dell/Downloads/Logo%20Waclo%20(2)%20(1).pdf

require __DIR__.'/admin.php';

require __DIR__.'/agent.php';

Route::get('loginadmin', function(){
    return redirect()->route('admin.login');
} )->name('loginadmin');

Route::get('loginagent', function(){
    return redirect()->route('agent.login');
} )->name('loginagent');

Route::middleware(['auth'])->group(function () {

    Route::get('home', [UserController::class, 'home_user'])
    ->name('home');

    Route::name('programmes.')->prefix('programmes')->group(function () {

        Route::get('/', [UserController::class, 'mesprogrammes'])
        ->name('mesprogrammes');

        Route::get('/confirm/{id}', [UserController::class, 'confirm_programmes'])
        ->name('confirm');

        Route::get('search', [UserController::class, 'programmes_search'])
        ->name('search');

    });

    Route::prefix('contrats')->group(function () {

        Route::get('/mines', [UserController::class, 'mesContrats'])
        ->name('mescontrats');

        Route::get('/programmes/{id}', [UserController::class, 'mesProgrammes_Contrats'])
        ->name('prog_contrat');

    });

     //Les parametres
    Route::name('setting.')->prefix('setting')->group(function () {

        Route::get('/', [UserSettingController::class, "page_setting"])
        ->name('index');

        Route::post('/mdp', [UserSettingController::class, "mdp_setting"])
        ->name('mdp');

        Route::post('/update', [UserSettingController::class, "update_setting"])
        ->name('update');

    });

});
