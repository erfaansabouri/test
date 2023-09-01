<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function welcome(){
        return view('customer.welcome.welcome');
    }
}
