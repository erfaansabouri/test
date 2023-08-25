<?php

namespace App\Http\Controllers\StoreManager;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\SpecialSale;
use App\Services\DateServices;
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
                         ->when($request->customer_id , function ( $query ) use ( $request ) {
                             $query->where('customer_id' , '=' , $request->customer_id);
                         })
                         ->when($request->from_date , function ( $query ) use ( $request ) {
                             $from_date = DateServices::jalaliToCarbon($request->from_date)
                                                      ->startOfDay();
                             $query->where('created_at' , '>=' , $from_date);
                         })
                         ->when($request->to_date , function ( $query ) use ( $request ) {
                             $to_date = DateServices::jalaliToCarbon($request->to_date)
                                                    ->endOfDay();
                             $query->where('created_at' , '<=' , $to_date);
                         })
                         ->orderByDesc('created_at')
                         ->paginate(50);

        return view('store-manager.coupons.index' , compact('coupons'));
    }
}
