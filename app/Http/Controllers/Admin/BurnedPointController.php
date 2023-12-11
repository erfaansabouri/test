<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BurnedPoint;
use App\Models\Customer;
use App\Models\Point;
use App\Models\Store;
use App\Services\DateServices;
use Illuminate\Http\Request;

class BurnedPointController extends Controller {
    public function index ( Request $request ) {
        $burned_points = BurnedPoint::query()
                                    ->with([
                                               'customer' ,
                                           ])
                                    ->when($request->search , function ( $query ) use ( $request ) {
                                        $query->whereHas('customer' , function ( $query ) use ( $request ) {
                                            $query->where('first_name' , 'like' , '%' . $request->search . '%');
                                            $query->orwhere('last_name' , 'like' , '%' . $request->search . '%');
                                            $query->orwhere('group_name' , 'like' , '%' . $request->search . '%');
                                            $query->orwhere('email' , 'like' , '%' . $request->search . '%');
                                            $query->orwhere('phone_number' , 'like' , '%' . $request->search . '%');
                                            $query->orwhere('national_code' , 'like' , '%' . $request->search . '%');
                                            $query->orwhere('birthdate' , 'like' , '%' . $request->search . '%');
                                        });
                                    })
                                    ->when($request->to_date , function ( $query ) use ( $request ) {
                                        $to_date = DateServices::jalaliToCarbon($request->to_date)
                                                               ->endOfDay();
                                        $query->where('created_at' , '<=' , $to_date);
                                    })
                                    ->orderByDesc('created_at')
                                    ->paginate(50);

        return view('admin.burned-points.index' , compact('burned_points'));
    }

    public function create () {
        return view('admin.burned-points.form');
    }

    public function store ( Request $request ) {
        $customer = Customer::findOrFail($request->get('customer_id'));
        if ($customer && $customer->balance > $request->get('point')){
            BurnedPoint::query()
                       ->create([
                                    'point' => $request->get('point') ,
                                    'customer_id' => $request->get('customer_id') ,
                                ]);

            return redirect()
                ->route('admin.burned-points.index')
                ->with([
                           'success' => "عملیات موفقیت آمیز بود" ,
                       ]);
        }
        return redirect()
            ->back()
            ->withErrors([ 'err' => 'موجودی کاربر کافی نیست' ]);

    }
}
