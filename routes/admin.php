<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\PointSettingController;
use App\Http\Controllers\Admin\StoreController;
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
    Route::prefix('stores')->group(function () {
        Route::get('/index', [StoreController::class, 'index'])->name('admin.stores.index');
        Route::get('/create', [StoreController::class, 'create'])->name('admin.stores.create');
        Route::post('/store', [StoreController::class, 'store'])->name('admin.stores.store');
        Route::get('/edit/{id}', [StoreController::class, 'edit'])->name('admin.stores.edit');
        Route::post('/update/{id}', [StoreController::class, 'update'])->name('admin.stores.update');
    });
    Route::prefix('customers')->group(function () {
        Route::get('/index', [CustomerController::class, 'index'])->name('admin.customers.index');
        Route::get('/create', [CustomerController::class, 'create'])->name('admin.customers.create');
        Route::post('/store', [CustomerController::class, 'store'])->name('admin.customers.store');
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('admin.customers.edit');
        Route::post('/update/{id}', [CustomerController::class, 'update'])->name('admin.customers.update');
    });
});


