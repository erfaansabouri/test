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

        return view('store-manager.coupon-generators.form', compact('coupon_generators', 'store_manager'));
    }

    public function update ( Request $request ) {
        dd($request->all());
        $store_manager = Auth::guard('store-manager')
                             ->user();
        $request->validate([
                               'types' => [
                                   'required' ,
                                   'array' ,
                               ] ,
                               'types.*.discount_percent' => [ 'required' ] ,
                               'types.*.discount_ceiling' => [ 'required' ] ,
                               'types.*.days_count' => [ 'required' ] ,
                           ]);
        $store_manager->store->couponGenerators()
                             ->delete();
        foreach ( $request->types as $type ) {
            CouponGenerator::query()
                           ->create([
                                        'type' => $type[ 'type' ] ,
                                        'discount_percent' => $type[ 'discount_percent' ] ,
                                        'discount_ceiling' => $type[ 'discount_ceiling' ] ,
                                        'days_count' => $type[ 'days_count' ] ,
                                    ]);
        }
        return redirect()->back()->with(['success' => 'عملیات با موفقیت انجام شد.']);
    }
}
