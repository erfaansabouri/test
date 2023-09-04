<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Award;
use Illuminate\Http\Request;

class AwardController extends Controller {
    public function index ( Request $request ) {
        $awards = Award::query()
                       ->with([ 'customer', 'store' ])
                       ->when($request->search , function ( $query ) use ( $request ) {
                           $query->where(function ( $query ) use ( $request ) {
                               $query->where('id' , $request->search)
                                     ->orwhere('code' , 'like' , '%' . $request->search . '%')
                                     ->orwhere('title' , 'like' , '%' . $request->search . '%')
                                     ->orwhere('description' , 'like' , '%' . $request->search . '%')
                                     ->orwhere('points' , 'like' , '%' . $request->search . '%');
                           });
                       })
                       ->orderByDesc('created_at')
                       ->paginate(50);

        return view('customer.awards.index' , compact('awards'));
    }

    public function buy ( $id ) {
        $award = Award::findOrFail($id);
        $customer = \Auth::guard('customer')
                         ->user();
        if ( !$award->customer && $customer->balance >= $award->points ) {
            $customer->consume($award->store_id,$award->points, 'award');
            $award->purchased_at = now();
            $award->purchased_by_customer_id = $customer->id;
            $award->save();

            return redirect()
                ->back()
                ->with([ 'success' => 'خرید با موفقیت انجام شد.' ]);
        }

        return redirect()
            ->back()
            ->withErrors([ 'err' => 'خرید نا موفق! موجودی حساب شما کافی نیست یا این جایزه قبلا خریداری شده است.' ]);
    }
}
