<?php

use App\Http\Controllers\Customer\LotteryController;
use App\Http\Controllers\Customer\MyProfileController;
use App\Http\Controllers\Customer\PointController;
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

    Route::prefix('my-profile')->group(function () {
        Route::get('/show', [MyProfileController::class, 'show'])->name('customer.my-profile.show');
        Route::post('/update', [MyProfileController::class, 'update'])->name('customer.my-profile.update');
    });

    Route::prefix('points')->middleware([])->group(function () {
        Route::get('/index', [PointController::class, 'index'])->name('customer.points.index');
    });

    Route::prefix('lotteries')->middleware([])->group(function () {
        Route::get('/index', [LotteryController::class, 'index'])->name('customer.lotteries.index');
        Route::get('/winners/{id}', [LotteryController::class, 'winners'])->name('customer.lotteries.winners');
        Route::get('/participate/{id}', [LotteryController::class, 'participate'])->name('customer.lotteries.participate');
    });
});
