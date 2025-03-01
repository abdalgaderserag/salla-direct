<?php

use App\Http\Controllers\Salla\Authorization\CallbackController;
use App\Http\Controllers\Salla\Test\CustomerController;
use App\Http\Controllers\Salla\WebhookController;
use App\Http\Controllers\User\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/salla/callback', [CallbackController::class, 'index'])->name('salla.redirect');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/test/client',[CustomerController::class, 'index']);

Route::post('/webhook/salla', [WebhookController::class, 'handleWebhook']);

Route::get('/clients', [DashboardController::class, 'clients'])->name('clients.index');
Route::get('/clients/banned', [DashboardController::class, 'banned'])->name('clients.banned');

Route::get('/campaigns', [DashboardController::class, 'campaigns'])->name('campaigns.index');
Route::get('/campaign/create', [DashboardController::class, 'campaign'])->name('campaigns.create');
Route::get('/widget', [DashboardController::class, 'widget'])->name('widget');

Route::get('/auto-messages', [DashboardController::class, 'autoMessages'])->name('auto');
