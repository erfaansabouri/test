<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Store;
use App\Services\DateServices;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function storePoint(Request $request){
        $request->validate([
            'from_date' => ['nullable'],
            'to_date' => ['nullable'],
        ]);
        $from_date = null;
        $to_date = null;
        if ($request->from_date){
            $from_date = DateServices::jalaliToCarbon($request->from_date)->startOfDay();
        }
        if ($request->from_date){
            $to_date = DateServices::jalaliToCarbon($request->to_date)->endOfDay();
        }

        $stores = Store::with('points')->get();

        $store_sums = [];

        foreach ($stores as $store) {
            $sum = $store->points()
                ->when($from_date != null, function ($query) use ($from_date){
                    $query->where('created_at', '>=', $from_date->startOfDay());
                })
                ->when($to_date != null, function ($query) use ($to_date){
                    $query->where('created_at', '<=', $to_date->endOfDay());
                })
                ->sum('point');

            $store_sums[] = [
                'store_title' => $store->title,
                'total_points' => $sum,
            ];
        }
        $store_sums = collect($store_sums)->sortByDesc('total_points');
        return view('admin.charts.store-point', compact('store_sums'));
    }

    public function customerPoint(Request $request){
        $request->validate([
            'from_date' => ['nullable'],
            'to_date' => ['nullable'],
        ]);
        $from_date = null;
        $to_date = null;
        if ($request->from_date){
            $from_date = DateServices::jalaliToCarbon($request->from_date)->startOfDay();
        }
        if ($request->from_date){
            $to_date = DateServices::jalaliToCarbon($request->to_date)->endOfDay();
        }

        $customers = Customer::with('points')->get();

        $customer_sums = [];

        foreach ($customers as $customer) {
            $sum = $customer->points()
                ->when($from_date != null, function ($query) use ($from_date){
                    $query->where('created_at', '>=', $from_date->startOfDay());
                })
                ->when($to_date != null, function ($query) use ($to_date){
                    $query->where('created_at', '<=', $to_date->endOfDay());
                })
                ->sum('point');

            $customer_sums[] = [
                'customer_full_name' => $customer->full_name,
                'total_points' => $sum,
            ];
        }
        $customer_sums = collect($customer_sums)->where('total_points' , '>' , 0)->sortByDesc('total_points');
        return view('admin.charts.customer-point', compact('customer_sums'));
    }

}
