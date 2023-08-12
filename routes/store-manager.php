<?php

use App\Http\Controllers\StoreManager\AuthController;
use App\Http\Controllers\StoreManager\MyProfileController;
use App\Http\Controllers\StoreManager\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::middleware([])->prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'loginForm'])->name('store-manager.auth.login-form');
    Route::post('login', [AuthController::class, 'login'])->name('store-manager.auth.login');
    Route::get('logout', [AuthController::class, 'logout'])->name('store-manager.auth.logout')->middleware(['auth:store-manager']);
});


Route::middleware(['auth:store-manager'])->group(function () {
    Route::prefix('welcome')->group(function () {
        Route::get('/', [WelcomeController::class, 'welcome'])->name('store-manager.welcome');
    });
    Route::prefix('my-profile')->group(function () {
        Route::get('/show', [MyProfileController::class, 'show'])->name('store-manager.my-profile.show');
        Route::post('/update', [MyProfileController::class, 'update'])->name('store-manager.my-profile.update');
    });
});
