<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider {
    public const HOME = '/home';

    public function boot () {
        $this->configureRateLimiting();
        $this->routes(function () {
            Route::middleware('web')
                 ->namespace($this->namespace)
                 ->prefix('admin')
                 ->group(base_path('routes/admin.php'));
            Route::middleware('web')
                 ->namespace($this->namespace)
                 ->prefix('store-manager')
                 ->group(base_path('routes/store-manager.php'));
            Route::middleware('web')
                 ->namespace($this->namespace)
                 ->prefix('customer')
                 ->group(base_path('routes/customer.php'));
        });
    }

    protected function configureRateLimiting () {
        RateLimiter::for('api' , function ( Request $request ) {
            return Limit::perMinute(60)
                        ->by($request->user()?->id ? : $request->ip());
        });
    }
}
