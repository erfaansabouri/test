<?php

use App\Http\Controllers\StoreManager\AuthController;
use App\Http\Controllers\StoreManager\CustomerController;
use App\Http\Controllers\StoreManager\MyProfileController;
use App\Http\Controllers\StoreManager\StoreManagerController;
use App\Http\Controllers\StoreManager\WelcomeController;
use App\Models\StoreManager;
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

    Route::prefix('store-managers')->middleware(['can:' . StoreManager::PERMISSIONS['store-managers']])->group(function () {
        Route::get('/index', [StoreManagerController::class, 'index'])->name('store-manager.store-managers.index');
        Route::get('/create', [StoreManagerController::class, 'create'])->name('store-manager.store-managers.create');
        Route::post('/store', [StoreManagerController::class, 'store'])->name('store-manager.store-managers.store');
        Route::get('/edit/{id}', [StoreManagerController::class, 'edit'])->name('store-manager.store-managers.edit');
        Route::post('/update/{id}', [StoreManagerController::class, 'update'])->name('store-manager.store-managers.update');
    });

    Route::prefix('store-managers')->middleware(['can:' . StoreManager::PERMISSIONS['store-managers']])->group(function () {
        Route::get('/index', [StoreManagerController::class, 'index'])->name('store-manager.store-managers.index');
        Route::get('/create', [StoreManagerController::class, 'create'])->name('store-manager.store-managers.create');
        Route::post('/store', [StoreManagerController::class, 'store'])->name('store-manager.store-managers.store');
        Route::get('/edit/{id}', [StoreManagerController::class, 'edit'])->name('store-manager.store-managers.edit');
        Route::post('/update/{id}', [StoreManagerController::class, 'update'])->name('store-manager.store-managers.update');
    });

    Route::prefix('customers')->middleware(['can:' . StoreManager::PERMISSIONS['customers']])->group(function () {
        Route::get('/index', [CustomerController::class, 'index'])->name('store-manager.customers.index');
        Route::get('/create', [CustomerController::class, 'create'])->name('store-manager.customers.create');
        Route::post('/store', [CustomerController::class, 'store'])->name('store-manager.customers.store');
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('store-manager.customers.edit');
        Route::post('/update/{id}', [CustomerController::class, 'update'])->name('store-manager.customers.update');
    });
});
