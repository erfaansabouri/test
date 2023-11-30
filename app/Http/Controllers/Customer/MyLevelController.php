<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Point;
use App\Models\Store;
use App\Services\DateServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyLevelController extends Controller {
    public function index ( Request $request ) {
        $customer = Auth::guard('customer')
                        ->user();

        $stores = Store::all();

        return view('customer.my-levels.index' , compact('stores', 'customer' ));
    }
}
