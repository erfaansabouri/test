<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Point;
use App\Services\DateServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointController extends Controller {
    public function index ( Request $request ) {
        $customer = Auth::guard('customer')
                        ->user();

        $points = Point::query()
                       ->with([
                                  'customer' ,
                                  'store' ,
                                  'pointType',
                              ])
                       ->where('customer_id' , $customer->id)
                       ->when($request->search , function ( $query ) use ( $request ) {
                           $query->where('id' , $request->search);
                           $query->orWhereHas('store' , function ( $query ) use ( $request ) {
                               $query->where('title' , 'like' , '%' . $request->search . '%');
                           });
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

        return view('customer.points.index' , compact('points' ));
    }
}
