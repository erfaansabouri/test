<?php

namespace App\Http\Controllers\StoreManager;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Point;
use App\Models\PointType;
use App\Models\Store;
use App\Services\DateServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PointController extends Controller {
    public function index ( Request $request ) {
        $store_manager = Auth::guard('store-manager')
                             ->user();
        $points = Point::query()
                       ->with([
                                  'customer' ,
                                  'store' ,
                                  'pointType' ,
                              ])
                       ->where('store_id' , $store_manager->store_id)
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

        return view('store-manager.points.index' , compact('points' , 'store_manager'));
    }

    public function createPurchase () {
        return view('store-manager.points.purchase-form');
    }

    public function storePurchase ( Request $request ) {
        $request->validate([
                               'customer_id' => [
                                   'required' ,
                                   'exists:customers,id' ,
                               ] ,
                               'price' => [
                                   'required' ,
                                   'numeric' ,
                               ] ,
                           ]);
        $store_id = Auth::guard('store-manager')
                        ->user()->store_id;
        $point = new Point();
        $point->store_id = $store_id;
        $point->customer_id = $request->customer_id;
        $point->price = $request->price;
        $point->point = Store::findOrFail($store_id)
                             ->calculatePoint($request->price);
        $point->point_type_id = PointType::purchaseId();
        $point->invoice_code = $request->get('invoice_code');

        $point->save();

        return redirect()
            ->route('store-manager.points.index')
            ->with([
                       'success' => "{$point->point} امتیاز با موفقیت به کاربر اضافه شد." ,
                   ]);
    }

    public function createNonPurchase () {
        return view('store-manager.points.non-purchase-form');
    }

    public function storeNonPurchase ( Request $request ) {
        $request->validate([
                               'customer_id' => [
                                   'required' ,
                                   'exists:customers,id' ,
                               ] ,
                               'point' => [
                                   'required' ,
                                   'int' ,
                               ] ,
                               'other_type_reason' => [ 'nullable' ] ,
                           ]);
        $store_id = Auth::guard('store-manager')
                        ->user()->store_id;
        $point = new Point();
        $point->store_id = $store_id;
        $point->customer_id = $request->customer_id;
        $point->point = $request->point;
        $point->point_type_id = PointType::nonPurchaseId();
        $point->reason = $request->reason;
        $point->invoice_code = $request->get('invoice_code');

        $point->save();

        return redirect()
            ->route('store-manager.points.index')
            ->with([
                       'success' => "{$point->point} امتیاز با موفقیت به کاربر اضافه شد." ,
                   ]);
    }

    public function createFast () {
        return view('store-manager.points.fast-form');
    }

    public function storeFast ( Request $request ) {
        $request->validate([
                               'phone_number' => [ 'required' ] ,
                               'type' => [
                                   'required' ,
                                   'in:purchase,non_purchase' ,
                               ] ,
                               'value' => [ 'required' ] ,
                           ]);
        $customer = Customer::query()
                            ->firstOrCreate([
                                                'phone_number' => $request->phone_number ,
                                            ]);
        $store_id = Auth::guard('store-manager')
                        ->user()->store_id;
        if ( $request->type == 'purchase' ) {
            $point = new Point();
            $point->store_id = $store_id;
            $point->customer_id = $customer->id;
            $point->price = $request->value;
            $point->point = Store::findOrFail($store_id)
                                 ->calculatePoint($request->value);
            $point->point_type_id = PointType::purchaseId();
            $point->invoice_code = $request->get('invoice_code');

            $point->save();
        }
        else {
            $point = new Point();
            $point->store_id = $store_id;
            $point->customer_id = $customer->id;
            $point->point = $request->value;
            $point->point_type_id = PointType::nonPurchaseId();
            $point->invoice_code = $request->get('invoice_code');

            $point->save();
        }

        return redirect()
            ->route('store-manager.points.index')
            ->with([
                       'success' => "{$point->point} امتیاز با موفقیت به کاربر اضافه شد." ,
                   ]);
    }

    public function createConsume () {
        return view('store-manager.points.consume-form');
    }

    public function storeConsume ( Request $request ) {
        $request->validate([
                               'phone_number' => [ 'required' ] ,
                               'points' => [ 'required' ] ,
                               'password' => [ 'required' ] ,
                               'invoice_code' => [ 'required' ] ,
                           ]);
        $points = $request->points;
        $customer = Customer::query()
                            ->where('phone_number' , $request->phone_number)
                            ->firstOrFail();
        $store_id = Auth::guard('store-manager')
                        ->user()->store_id;
        if ( !Hash::check($request->password , $customer->password) ) {
            return redirect()
                ->back()
                ->withErrors([ 'err' => 'برداشت ناموفق. رمز اشتباه است' ]);
        }
        if ( $customer->balance >= $points ) {
            $customer->consume($store_id , $points , 'manual-by-store', $request->get('invoice_code'));

            return redirect()
                ->back()
                ->with([ 'success' => 'برداشت از حساب کاربر با موفقیت انجام شد.' ]);
        }

        return redirect()
            ->back()
            ->withInput($request->except('password'))
            ->withErrors([ 'err' => 'برداشت ناموفق. موجودی ناکافی' ]);
    }
}
