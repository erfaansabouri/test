<?php
return [
    'defaults' => [
        'guard' => 'web' ,
        'passwords' => 'users' ,
    ] ,
    'guards' => [
        'web' => [
            'driver' => 'session' ,
            'provider' => 'users' ,
        ] ,
        'admin' => [
            'driver' => 'session' ,
            'provider' => 'admins' ,
        ] ,
        'store-manager' => [
            'driver' => 'session' ,
            'provider' => 'store-managers' ,
        ] ,
        'customer' => [
            'driver' => 'session' ,
            'provider' => 'customers' ,
        ] ,
    ] ,
    'providers' => [
        'users' => [
            'driver' => 'eloquent' ,
            'model' => App\Models\User::class ,
        ] ,
        'admins' => [
            'driver' => 'eloquent' ,
            'model' => App\Models\Admin::class ,
        ] ,
        'store-managers' => [
            'driver' => 'eloquent' ,
            'model' => App\Models\StoreManager::class ,
        ] ,
        'customers' => [
            'driver' => 'eloquent' ,
            'model' => App\Models\Customer::class ,
        ] ,
    ] ,
    'passwords' => [
        'users' => [
            'provider' => 'users' ,
            'table' => 'password_resets' ,
            'expire' => 60 ,
            'throttle' => 60 ,
        ] ,
    ] ,
    'password_timeout' => 10800 ,
];
