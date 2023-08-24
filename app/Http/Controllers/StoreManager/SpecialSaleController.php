<?php

namespace App\Http\Controllers\StoreManager;

use App\Http\Controllers\Controller;
use App\Models\SpecialSale;
use App\Models\StoreManager;
use App\Services\DateServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpecialSaleController extends Controller {
    public function index ( Request $request ) {
        $store_manager = Auth::guard('store-manager')
                             ->user();
        $special_sales = SpecialSale::query()
                                    ->where('store_id' , $store_manager->store_id)
                                    ->orderByDesc('created_at')
                                    ->paginate(50);

        return view('store-manager.special-sales.index' , compact('special_sales'));
    }

    public function create () {
        $store_manager = Auth::guard('store-manager')
                             ->user();
        $store_levels = $store_manager->store->storeLevels;

        return view('store-manager.special-sales.form' , compact('store_manager' , 'store_levels'));
    }

    public function store ( Request $request ) {

        $request->validate([
                               'discount_percent' => [ 'required' ] ,
                               'discount_ceiling' => [ 'required' ] ,
                               'lower_purchase_amount' => [ 'required' ] ,
                               'upper_purchase_amount' => [ 'required' ] ,
                               'started_at' => [ 'required' ] ,
                               'ended_at' => [ 'required' ] ,
                               'branch' => [ 'required' ] ,
                               'store_level_id' => [ 'required' ] ,
                           ]);
        $store_manager = Auth::guard('store-manager')
                             ->user();
        $started_at = DateServices::jalaliToCarbon($request->started_at)
                                  ->startOfDay();
        $ended_at = DateServices::jalaliToCarbon($request->ended_at)
                                ->endOfDay();
        $special_sale = new SpecialSale();
        $special_sale->store_id = $store_manager->store_id;
        $special_sale->discount_percent = $request->discount_percent;
        $special_sale->discount_ceiling = $request->discount_ceiling;
        $special_sale->lower_purchase_amount = $request->lower_purchase_amount;
        $special_sale->upper_purchase_amount = $request->upper_purchase_amount;
        $special_sale->started_at = $started_at;
        $special_sale->ended_at = $ended_at;
        $special_sale->branch = $request->branch;
        $special_sale->store_level_id = $request->store_level_id;
        $special_sale->save();

        return redirect()
            ->back()
            ->with([ 'success' => 'عملیات با موفقیت انجام شد.' ]);
    }

    public function edit ( $id ) {
        $store_manager = Auth::guard('store-manager')
                             ->user();
        $store_levels = $store_manager->store->storeLevels;
        $special_sale = SpecialSale::findOrFail($id);

        return view('store-manager.special-sales.form' , compact('store_manager' , 'store_levels' , 'special_sale'));
    }

    public function update ( Request $request , $id ) {
        $store_manager = Auth::guard('store-manager')
                             ->user();
        $special_sale = SpecialSale::where('id' , $id)
                                   ->where('store_id' , $store_manager->id)
                                   ->firstOrFail();
        $request->validate([
                               'discount_percent' => [ 'required' ] ,
                               'discount_ceiling' => [ 'required' ] ,
                               'lower_purchase_amount' => [ 'required' ] ,
                               'upper_purchase_amount' => [ 'required' ] ,
                               'started_at' => [ 'required' ] ,
                               'ended_at' => [ 'required' ] ,
                               'branch' => [ 'required' ] ,
                               'store_level_id' => [ 'required' ] ,
                           ]);
        $started_at = DateServices::jalaliToCarbon($request->started_at)
                                  ->startOfDay();
        $ended_at = DateServices::jalaliToCarbon($request->ended_at)
                                ->endOfDay();
        $special_sale->store_id = $store_manager->store_id;
        $special_sale->discount_percent = $request->discount_percent;
        $special_sale->discount_ceiling = $request->discount_ceiling;
        $special_sale->lower_purchase_amount = $request->lower_purchase_amount;
        $special_sale->upper_purchase_amount = $request->upper_purchase_amount;
        $special_sale->started_at = $started_at;
        $special_sale->ended_at = $ended_at;
        $special_sale->branch = $request->branch;
        $special_sale->store_level_id = $request->store_level_id;
        $special_sale->save();

        return redirect()
            ->back()
            ->with([ 'success' => 'عملیات با موفقیت انجام شد.' ]);
    }

    public function destroy ( $id ) {
        $store_manager = Auth::guard('store-manager')
                             ->user();
        $special_sale = SpecialSale::where('id' , $id)
                                   ->where('store_id' , $store_manager->id)
                                   ->firstOrFail();

        $special_sale->delete();
        return redirect()
            ->back()
            ->with([ 'success' => 'عملیات با موفقیت انجام شد.' ]);
    }
}
