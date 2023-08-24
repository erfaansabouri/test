<?php

namespace App\Http\Controllers\StoreManager;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\SpecialSale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller {
    public function index ( Request $request ) {
        $store_manager = Auth::guard('store-manager')
                             ->user();
        $coupons = Coupon::query()
                         ->with([ 'customer' ])
                         ->where('store_id' , $store_manager->store_id)
                         ->when($request->search , function ( $query ) use ( $request ) {
                             $query->where('code' , 'like' , '%' . $request->search . '%');
                         })
                         ->orderByDesc('created_at')
                         ->paginate(50);

        return view('store-manager.coupons.index' , compact('coupons'));
    }
}
