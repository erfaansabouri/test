<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\PointController;
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
        Route::get('/ajax-index', [StoreController::class, 'ajaxIndex'])->name('admin.stores.ajax-index');
        Route::get('/index', [StoreController::class, 'index'])->name('admin.stores.index');
        Route::get('/create', [StoreController::class, 'create'])->name('admin.stores.create');
        Route::post('/store', [StoreController::class, 'store'])->name('admin.stores.store');
        Route::get('/edit/{id}', [StoreController::class, 'edit'])->name('admin.stores.edit');
        Route::post('/update/{id}', [StoreController::class, 'update'])->name('admin.stores.update');
    });
    Route::prefix('customers')->group(function () {
        Route::get('/ajax-index', [CustomerController::class, 'ajaxIndex'])->name('admin.customers.ajax-index');
        Route::get('/index', [CustomerController::class, 'index'])->name('admin.customers.index');
        Route::get('/create', [CustomerController::class, 'create'])->name('admin.customers.create');
        Route::post('/store', [CustomerController::class, 'store'])->name('admin.customers.store');
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('admin.customers.edit');
        Route::post('/update/{id}', [CustomerController::class, 'update'])->name('admin.customers.update');
    });
    Route::prefix('points')->group(function () {
        Route::get('/index', [PointController::class, 'index'])->name('admin.points.index');
        Route::get('/create', [PointController::class, 'create'])->name('admin.points.create');
        Route::post('/store', [PointController::class, 'store'])->name('admin.points.store');
        Route::get('/edit/{id}', [PointController::class, 'edit'])->name('admin.points.edit');
        Route::post('/update/{id}', [PointController::class, 'update'])->name('admin.points.update');
        Route::post('/calculate-points', [PointController::class, 'calculatePoints'])->name('admin.points.calculate-points');
    });
    Route::prefix('charts')->group(function () {
        Route::get('/store-point', [ChartController::class, 'storePoint'])->name('admin.charts.store-point');
        Route::get('/customer-point', [ChartController::class, 'customerPoint'])->name('admin.charts.customer-point');
    });

    Route::prefix('admins')->group(function () {
        Route::get('/index', [AdminController::class, 'index'])->name('admin.admins.index');
        Route::get('/create', [AdminController::class, 'create'])->name('admin.admins.create');
        Route::post('/store', [AdminController::class, 'store'])->name('admin.admins.store');
        Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.admins.edit');
        Route::post('/update/{id}', [AdminController::class, 'update'])->name('admin.admins.update');
    });
});


