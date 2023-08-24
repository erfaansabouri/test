<?php

namespace App\Http\Controllers\StoreManager;

use App\Http\Controllers\Controller;
use App\Models\CouponGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponGeneratorController extends Controller {
    public function edit () {
        $store_manager = Auth::guard('store-manager')
                             ->user();
        $coupon_generators = CouponGenerator::query()
                                            ->where('store_id' , $store_manager->store_id)
                                            ->get();

        return view('store-manager.coupon-generators.form' , compact('coupon_generators' , 'store_manager'));
    }

    public function update ( Request $request ) {
        $store_manager = Auth::guard('store-manager')
                             ->user();
        $request->validate([
                               'types' => [
                                   'required' ,
                                   'array' ,
                               ] ,
                           ]);
        foreach ( $request->types as $type_name => $type_value ) {
            if ( $type_value[ 'discount_percent' ] && $type_value[ 'discount_ceiling' ] ) {
                CouponGenerator::query()
                               ->updateOrCreate([
                                                    'store_id' => $store_manager->store_id ,
                                                    'type' => $type_name ,
                                                ] , [
                                                    'discount_percent' => $type_value[ 'discount_percent' ] ,
                                                    'discount_ceiling' => $type_value[ 'discount_ceiling' ] ,
                                                    'days_count' => $type_value[ 'days_count' ] ,
                                                    'meta_data' => $type_value[ 'meta_data' ] ,
                                                ]);
            }
        }

        return redirect()
            ->back()
            ->with([ 'success' => 'عملیات با موفقیت انجام شد.' ]);
    }
}
