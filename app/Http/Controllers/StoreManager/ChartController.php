<?php

namespace App\Http\Controllers\StoreManager;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Point;
use App\Models\Store;
use App\Services\DateServices;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    public function customerPoints(Request $request){
        $store_manager = Auth::guard('store-manager')->user();
        $request->validate([
            'from_date' => ['nullable'],
            'to_date' => ['nullable'],
        ]);
        $from_date = Carbon::now()->subDays(30);
        $to_date = Carbon::now();
        if ($request->from_date){
            $from_date = DateServices::jalaliToCarbon($request->from_date)->startOfDay();
        }
        if ($request->from_date){
            $to_date = DateServices::jalaliToCarbon($request->to_date)->endOfDay();
        }

        $dates = [];
        $current_date = $from_date->copy();

        while ($current_date->lte($to_date)) {
            $dates[] = $current_date->format('Y-m-d');
            $current_date->addDay();
        }

        $result = collect([]);

        foreach ($dates as $date){
            $point_query = Point::query()
                ->where('store_id', $store_manager->store_id)
                ->whereDate('created_at', $date)
                ->when($request->customer_id, function ($query) use ($request){
                    $query->where('customer_id', $request->customer_id);
                });
            $result->push([
                'date' => $date,
                'persian_date' => verta($date)->format('Y-m-d'),
                'total_points' => (clone $point_query)->sum('point'),
            ]);
        }
        return view('store-manager.charts.customer-points', compact('result'));
    }
    public function customerPrices(Request $request){
        $store_manager = Auth::guard('store-manager')->user();
        $request->validate([
            'from_date' => ['nullable'],
            'to_date' => ['nullable'],
        ]);
        $from_date = Carbon::now()->subDays(30);
        $to_date = Carbon::now();
        if ($request->from_date){
            $from_date = DateServices::jalaliToCarbon($request->from_date)->startOfDay();
        }
        if ($request->from_date){
            $to_date = DateServices::jalaliToCarbon($request->to_date)->endOfDay();
        }

        $dates = [];
        $current_date = $from_date->copy();

        while ($current_date->lte($to_date)) {
            $dates[] = $current_date->format('Y-m-d');
            $current_date->addDay();
        }

        $result = collect([]);

        foreach ($dates as $date){
            $point_query = Point::query()
                ->where('store_id', $store_manager->store_id)
                ->whereDate('created_at', $date)
                ->when($request->customer_id, function ($query) use ($request){
                    $query->where('customer_id', $request->customer_id);
                });
            $result->push([
                'date' => $date,
                'persian_date' => verta($date)->format('Y-m-d'),
                'total_prices' => (clone $point_query)->sum('price'),
            ]);
        }
        return view('store-manager.charts.customer-prices', compact('result'));
    }
}
