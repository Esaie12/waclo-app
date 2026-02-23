<?php

use App\Http\Controllers\Api\AdminAuthController;
use App\Http\Controllers\Api\AdminMobileController;
use App\Http\Controllers\Api\AgentAuthController;
use App\Http\Controllers\Api\AgentMobileController;
use App\Http\Controllers\Api\ClientAuthController;
use App\Http\Controllers\Api\ClientMobileController;
use App\Http\Controllers\Api\PublicMobileController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    // Public endpoints
    Route::post('/devis', [PublicMobileController::class, 'createDevis']);

    // Client auth + data
    Route::post('/client/login', [ClientAuthController::class, 'login']);
    Route::middleware('api.token:web')->group(function () {
        Route::post('/client/logout', [ClientAuthController::class, 'logout']);
        Route::get('/client/me', [ClientMobileController::class, 'me']);
        Route::get('/client/contrats', [ClientMobileController::class, 'contrats']);
        Route::get('/client/programmes', [ClientMobileController::class, 'programmes']);
    });

    // Agent auth + data
    Route::post('/agent/login', [AgentAuthController::class, 'login']);
    Route::middleware('api.token:agent')->group(function () {
        Route::post('/agent/logout', [AgentAuthController::class, 'logout']);
        Route::get('/agent/me', [AgentMobileController::class, 'me']);
        Route::get('/agent/agenda', [AgentMobileController::class, 'agenda']);
    });

    // Admin auth + data
    Route::post('/admin/login', [AdminAuthController::class, 'login']);
    Route::middleware('api.token:admin')->group(function () {
        Route::post('/admin/logout', [AdminAuthController::class, 'logout']);
        Route::get('/admin/me', [AdminMobileController::class, 'me']);
        Route::get('/admin/dashboard', [AdminMobileController::class, 'dashboard']);
        Route::get('/admin/devis', [AdminMobileController::class, 'devis']);
        Route::get('/admin/jobs', [AdminMobileController::class, 'jobs']);
        Route::get('/admin/clients', [AdminMobileController::class, 'clients']);
    });
});
