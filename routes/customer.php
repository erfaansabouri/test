<?php

use App\Http\Controllers\Customer\AuthController;
use App\Http\Controllers\Customer\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::middleware([])->prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'loginForm'])->name('customer.auth.login-form');
    Route::post('login', [AuthController::class, 'login'])->name('customer.auth.login');
    Route::get('logout', [AuthController::class, 'logout'])->name('customer.auth.logout')->middleware(['auth:customer']);
});

Route::middleware(['auth:customer'])->group(function () {
    Route::prefix('welcome')->group(function () {
        Route::get('/', [WelcomeController::class, 'welcome'])->name('customer.welcome');
    });
});
