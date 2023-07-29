<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PointSettingController;
use App\Http\Controllers\Admin\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::middleware([])->prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'loginForm'])->name('admin.auth.login-form');
    Route::post('login', [AuthController::class, 'login'])->name('admin.auth.login');
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.auth.logout')->middleware(['auth:admin']);
});
Route::middleware(['auth:admin'])->group(function () {
    Route::prefix('welcome')->group(function () {
        Route::get('/', [WelcomeController::class, 'welcome'])->name('admin.welcome');
    });
    Route::prefix('point-settings')->group(function () {
        Route::get('/edit', [PointSettingController::class, 'edit'])->name('admin.point-settings.edit');
        Route::put('/update', [PointSettingController::class, 'update'])->name('admin.point-settings.update');
    });
});


