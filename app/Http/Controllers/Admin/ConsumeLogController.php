<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConsumeLog;
use App\Services\DateServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsumeLogController extends Controller {
    public function index ( Request $request ) {
        $consume_logs = ConsumeLog::query()
                                  ->with([
                                             'customer' ,
                                             'store' ,
                                         ])
                                  ->when($request->store_id , function ( $query ) use ( $request ) {
                                      $query->where('store_id' , '=' , $request->store_id);
                                  })
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
                                      $query->orWhereHas('store' , function ( $query ) use ( $request ) {
                                          $query->where('title' , 'like' , '%' . $request->search . '%');
                                      });
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

        return view('admin.consume-logs.index' , compact('consume_logs'));
    }
}
