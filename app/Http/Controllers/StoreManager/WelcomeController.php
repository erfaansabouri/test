<?php

namespace App\Http\Controllers\StoreManager;

use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function welcome(){
        return view('store-manager.welcome.welcome');
    }
}
