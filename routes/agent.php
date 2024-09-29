<?php
use Illuminate\Support\Facades\Route;
use App\Providers\FortifyServiceProvider;
use App\Http\Controllers\agent\BordController;

use App\Http\Controllers\admin\DirectionController;
use App\Http\Controllers\admin\PersonnelController;
use App\Http\Controllers\user\UserSettingController;

use App\Http\Controllers\agent\AgentSettingController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\admin\SocieteController as SocieteController;

Route::get('/2', function(){
    return view('appweb.dashboard');
} )->name('user');

Route::prefix('agent')->name('agent.')->group(function () {

    Route::get('home', [BordController::class, 'page_home'] )
    ->middleware('auth:agent')
    ->name('home');

    Route::get('/forgot', function () {
        return view('auth.forgot-password');
    })->name('forgot')->middleware(['guest:agent']);

    Route::post('forgot-password', [AgentSettingController::class, 'verify_reset_email'])->name('forgot-password')->middleware(['guest:agent']);
    Route::get('reset-password/{token}/{email}', [AgentSettingController::class, 'reset_password'])->name('reset-password')->middleware(['guest:agent']);
    Route::post('change-password', [AgentSettingController::class, 'change_password'])->name('change-password')->middleware(['guest:agent']);

    Route::middleware(['auth:agent'])->group(function () {

        Route::get('agenda', [BordController::class, "agenda"])
        ->name('agenda');


        Route::get('agents_search', [BordController::class, "search_agenda"])
        ->name('search');

    });

    Route::middleware(['auth:agent'])->name('setting.')->prefix('setting')->group(function () {

        Route::get('/', [AgentSettingController::class, "page_setting"])
        ->name('index');

        Route::post('/mdp', [AgentSettingController::class, "mdp_setting"])
        ->name('mdp');

        Route::post('/update', [AgentSettingController::class, "update_setting"])
        ->name('update');

        Route::get('delete_photo', [AgentSettingController::class, "delete_photo_empl"])
        ->name('delete_photo');

        Route::post('setting', [AgentSettingController::class, "setting_empl"])
        ->name('setting');

    });

    Route::get('login',function(){ return view('auth.loginAgent'); })
    ->middleware(['guest:agent'])
    ->name('login');


    $limiter = config('fortify.limiters.login');
    $twoFactorLimiter = config('fortify.limiters.two-factor');
    $verificationLimiter = config('fortify.limiters.verification', '6,1');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:agent',
            $limiter ? 'throttle:'.$limiter : null,
        ]));

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:agent')
        ->name('logout');

});

