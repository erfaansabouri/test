<?php

use App\Http\Controllers\StoreManager\AuthController;
use App\Http\Controllers\StoreManager\CalendarController;
use App\Http\Controllers\StoreManager\ChartController;
use App\Http\Controllers\StoreManager\CustomerController;
use App\Http\Controllers\StoreManager\MyProfileController;
use App\Http\Controllers\StoreManager\PointController;
use App\Http\Controllers\StoreManager\StarController;
use App\Http\Controllers\StoreManager\StoreManagerController;
use App\Http\Controllers\StoreManager\StoreSettingController;
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
        Route::get('/ajax-find-by-phone-number', [CustomerController::class, 'ajaxFindByPhoneNumber'])->name('store-manager.customers.ajax-find-by-phone-number');
        Route::get('/ajax-index', [CustomerController::class, 'ajaxIndex'])->name('store-manager.customers.ajax-index');
        Route::get('/index', [CustomerController::class, 'index'])->name('store-manager.customers.index');
        Route::get('/loyal-index', [CustomerController::class, 'loyalIndex'])->name('store-manager.customers.loyal-index');
        Route::get('/most-purchase-index', [CustomerController::class, 'mostPurchaseIndex'])->name('store-manager.customers.most-purchase-index');
        Route::get('/no-return-index', [CustomerController::class, 'noReturnIndex'])->name('store-manager.customers.no-return-index');
        Route::get('/forgetful-index', [CustomerController::class, 'forgetfulIndex'])->name('store-manager.customers.forgetful-index');
        Route::get('/born-this-month-index', [CustomerController::class, 'bornThisMonthIndex'])->name('store-manager.customers.born-this-month-index');
        Route::get('/levels-chart', [CustomerController::class, 'levelsChart'])->name('store-manager.customers.levels-chart');
        Route::get('/create', [CustomerController::class, 'create'])->name('store-manager.customers.create');
        Route::post('/store', [CustomerController::class, 'store'])->name('store-manager.customers.store');
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('store-manager.customers.edit');
        Route::post('/update/{id}', [CustomerController::class, 'update'])->name('store-manager.customers.update');
    });

    Route::prefix('points')->middleware(['can:' . StoreManager::PERMISSIONS['points']])->group(function () {
        Route::get('/index', [PointController::class, 'index'])->name('store-manager.points.index');
        Route::get('/create-purchase', [PointController::class, 'createPurchase'])->name('store-manager.points.create-purchase');
        Route::post('/store-purchase', [PointController::class, 'storePurchase'])->name('store-manager.points.store-purchase');
        Route::get('/create-non-purchase', [PointController::class, 'createNonPurchase'])->name('store-manager.points.create-non-purchase');
        Route::post('/store-non-purchase', [PointController::class, 'storeNonPurchase'])->name('store-manager.points.store-non-purchase');
        Route::get('/create-fast', [PointController::class, 'createFast'])->name('store-manager.points.create-fast');
        Route::post('/store-fast', [PointController::class, 'storeFast'])->name('store-manager.points.store-fast');
        Route::post('/store', [PointController::class, 'store'])->name('store-manager.points.store');
        Route::get('/edit/{id}', [PointController::class, 'edit'])->name('store-manager.points.edit');
        Route::post('/update/{id}', [PointController::class, 'update'])->name('store-manager.points.update');
    });

    Route::prefix('store-settings')->middleware(['can:' . StoreManager::PERMISSIONS['store-settings']])->group(function () {
        Route::get('/edit', [StoreSettingController::class, 'edit'])->name('store-manager.store-settings.edit');
        Route::post('/update', [StoreSettingController::class, 'update'])->name('store-manager.store-settings.update');
        Route::post('/update-levels', [StoreSettingController::class, 'updateLevels'])->name('store-manager.store-settings.update-levels');
    });

    Route::prefix('stars')->middleware(['can:' . StoreManager::PERMISSIONS['stars']])->group(function () {
        Route::get('/index', [StarController::class, 'index'])->name('store-manager.stars.index');
    });

    Route::prefix('charts')->middleware(['can:' . StoreManager::PERMISSIONS['charts']])->group(function () {
        Route::get('/customer-points', [ChartController::class, 'customerPoints'])->name('store-manager.charts.customer-points');
        Route::get('/customer-prices', [ChartController::class, 'customerPrices'])->name('store-manager.charts.customer-prices');
    });

    Route::prefix('calendar')->middleware(['can:' . StoreManager::PERMISSIONS['calendar']])->group(function () {
        Route::get('/index', [CalendarController::class, 'index'])->name('store-manager.calendar.index');
        Route::get('/create-event', [CalendarController::class, 'createEvent'])->name('store-manager.calendar.create-event');
        Route::post('/save-event', [CalendarController::class, 'saveEvent'])->name('store-manager.calendar.save-event');
    });
});
