<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CalendarEventController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\ConsumeLogController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\LotteryController;
use App\Http\Controllers\Admin\PointController;
use App\Http\Controllers\Admin\PointSettingController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\StoreManagerController;
use App\Http\Controllers\Admin\WelcomeController;
use App\Models\Admin;
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
    Route::prefix('stores')->middleware(['can:' . Admin::PERMISSIONS['stores']])->group(function () {
        Route::get('/ajax-index', [StoreController::class, 'ajaxIndex'])->name('admin.stores.ajax-index')->withoutMiddleware(['can:' . Admin::PERMISSIONS['stores']]);
        Route::get('/index', [StoreController::class, 'index'])->name('admin.stores.index');
        Route::get('/create', [StoreController::class, 'create'])->name('admin.stores.create');
        Route::post('/store', [StoreController::class, 'store'])->name('admin.stores.store');
        Route::get('/edit/{id}', [StoreController::class, 'edit'])->name('admin.stores.edit');
        Route::post('/update/{id}', [StoreController::class, 'update'])->name('admin.stores.update');
    });
    Route::prefix('store-managers')->middleware(['can:' . Admin::PERMISSIONS['store-managers']])->group(function () {
        Route::get('/ajax-index', [StoreManagerController::class, 'ajaxIndex'])->name('admin.store-managers.ajax-index');
        Route::get('/index', [StoreManagerController::class, 'index'])->name('admin.store-managers.index');
        Route::get('/create', [StoreManagerController::class, 'create'])->name('admin.store-managers.create');
        Route::post('/store', [StoreManagerController::class, 'store'])->name('admin.store-managers.store');
        Route::get('/edit/{id}', [StoreManagerController::class, 'edit'])->name('admin.store-managers.edit');
        Route::post('/update/{id}', [StoreManagerController::class, 'update'])->name('admin.store-managers.update');
        Route::get('/login-as/{id}', [StoreManagerController::class, 'loginAs'])->name('admin.store-managers.login-as');
    });
    Route::prefix('customers')->middleware(['can:' . Admin::PERMISSIONS['customers']])->group(function () {
        Route::get('/ajax-find-by-phone-number', [CustomerController::class, 'ajaxFindByPhoneNumber'])->name('admin.customers.ajax-find-by-phone-number');
        Route::get('/ajax-index', [CustomerController::class, 'ajaxIndex'])->name('admin.customers.ajax-index');
        Route::get('/index', [CustomerController::class, 'index'])->name('admin.customers.index');
        Route::get('/create', [CustomerController::class, 'create'])->name('admin.customers.create');
        Route::post('/store', [CustomerController::class, 'store'])->name('admin.customers.store');
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('admin.customers.edit');
        Route::post('/update/{id}', [CustomerController::class, 'update'])->name('admin.customers.update');
    });
    Route::prefix('points')->middleware(['can:' . Admin::PERMISSIONS['points']])->group(function () {
        Route::get('/index', [PointController::class, 'index'])->name('admin.points.index');
        Route::middleware(['can:'.Admin::PERMISSIONS['create-points']])->group(function (){
            Route::get('/create-purchase', [PointController::class, 'createPurchase'])->name('admin.points.create-purchase');
            Route::post('/store-purchase', [PointController::class, 'storePurchase'])->name('admin.points.store-purchase');
            Route::get('/create-non-purchase', [PointController::class, 'createNonPurchase'])->name('admin.points.create-non-purchase');
            Route::post('/store-non-purchase', [PointController::class, 'storeNonPurchase'])->name('admin.points.store-non-purchase');
            Route::get('/create-fast', [PointController::class, 'createFast'])->name('admin.points.create-fast');
            Route::post('/store-fast', [PointController::class, 'storeFast'])->name('admin.points.store-fast');
        });
        Route::middleware(['can'.Admin::PERMISSIONS['consume-points']])->group(function (){
            Route::get('/create-consume', [PointController::class, 'createConsume'])->name('admin.points.create-consume');
            Route::post('/store-consume', [PointController::class, 'storeConsume'])->name('admin.points.store-consume');
        });
        Route::get('/edit/{id}', [PointController::class, 'edit'])->name('admin.points.edit');
        Route::post('/update/{id}', [PointController::class, 'update'])->name('admin.points.update');
        Route::post('/calculate-points', [PointController::class, 'calculatePoints'])->name('admin.points.calculate-points');
    });

    Route::prefix('consume-logs')->middleware(['can:' . Admin::PERMISSIONS['points']])->group(function () {
        Route::get('/index', [ConsumeLogController::class, 'index'])->name('admin.consume-logs.index');
    });

    Route::prefix('charts')->middleware(['can:' . Admin::PERMISSIONS['charts']])->group(function () {
        Route::get('/store-point', [ChartController::class, 'storePoint'])->name('admin.charts.store-point');
        Route::get('/customer-point', [ChartController::class, 'customerPoint'])->name('admin.charts.customer-point');
    });
    Route::prefix('admins')->middleware(['can:' . Admin::PERMISSIONS['admins']])->group(function () {
        Route::get('/index', [AdminController::class, 'index'])->name('admin.admins.index');
        Route::get('/create', [AdminController::class, 'create'])->name('admin.admins.create');
        Route::post('/store', [AdminController::class, 'store'])->name('admin.admins.store');
        Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.admins.edit');
        Route::post('/update/{id}', [AdminController::class, 'update'])->name('admin.admins.update');
    });
    Route::prefix('calendar-events')->middleware(['can:' . Admin::PERMISSIONS['calendar-events']])->group(function () {
        Route::get('/index', [CalendarEventController::class, 'index'])->name('admin.calendar-events.index');
    });
    Route::prefix('lotteries')->middleware(['can:' . Admin::PERMISSIONS['lotteries']])->group(function () {
        Route::get('/winners/{id}', [LotteryController::class, 'winners'])->name('admin.lotteries.winners');
        Route::get('/index', [LotteryController::class, 'index'])->name('admin.lotteries.index');
        Route::get('/create', [LotteryController::class, 'create'])->name('admin.lotteries.create');
        Route::post('/store', [LotteryController::class, 'store'])->name('admin.lotteries.store');
        Route::get('/edit/{id}', [LotteryController::class, 'edit'])->name('admin.lotteries.edit');
        Route::post('/update/{id}', [LotteryController::class, 'update'])->name('admin.lotteries.update');
        Route::get('/destroy/{id}', [LotteryController::class, 'destroy'])->name('admin.lotteries.destroy');
    });
});


