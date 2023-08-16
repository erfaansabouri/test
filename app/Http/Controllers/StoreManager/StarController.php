<?php

namespace App\Http\Controllers\StoreManager;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Star;
use App\Services\DateServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StarController extends Controller
{
    public function index(Request $request){
        $store_manager = Auth::guard('store-manager')->user();
        $stars = Star::query()
            ->with(['store', 'customer'])
            ->where('store_id', $store_manager->store_id)
            ->when($request->customer_id, function ($query) use ($request){
                $query->where('customer_id', '=', $request->customer_id);
            })
            ->when($request->from_date, function ($query) use ($request){
                $from_date = DateServices::jalaliToCarbon($request->from_date)->startOfDay();
                $query->where('created_at', '>=', $from_date);
            })
            ->when($request->to_date, function ($query) use ($request){
                $to_date = DateServices::jalaliToCarbon($request->to_date)->endOfDay();
                $query->where('created_at', '<=', $to_date);
            })
            ->orderByDesc('id')
            ->paginate(50);

        return view('store-manager.stars.index', compact('stars'));
    }
}
