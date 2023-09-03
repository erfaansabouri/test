<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Services\DateServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyProfileController extends Controller {
    public function show () {
        $customer = Auth::guard('customer')
                        ->user();

        return view('customer.my-profile.show' , compact('customer'));
    }

    public function update ( Request $request ) {
        $request->validate([
                               'first_name' => [ 'required' ] ,
                               'last_name' => [ 'required' ] ,
                               'phone_number' => [ 'required' ] ,
                               'email' => [
                                   'required' ,
                                   'email',
                               ] ,
                               'national_code' => [ 'required' ] ,
                               'birthdate' => [ 'required' ] ,
                               'new_password' => [ 'required_with:current_password' ] ,
                           ]);
        $customer = Auth::guard('customer')
                        ->user();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone_number = $request->phone_number;
        $customer->email = $request->email;
        $customer->national_code = $request->national_code;
        if ( $request->birthdate ) {
            $customer->birthdate = DateServices::jalaliToCarbon($request->birthdate)
                                               ->format('Y-m-d');
        }
        if ( $request->current_password || $request->new_password ) {
            if ( Hash::check($request->current_password , $customer->password) ) {
                $customer->password = bcrypt($request->new_password);
            }
            else {
                return redirect()
                    ->back()
                    ->withErrors([
                                     'error' => 'پسورد کنونی اشتباه است.',
                                 ]);
            }
        }
        $customer->save();
        if ( $request->hasFile('avatar') ) {
            $customer->addMediaFromRequest('avatar')
                     ->toMediaCollection('avatar');
        }

        return redirect()
            ->back()
            ->with([ 'success' => 'عملیات با موفقیت انجام شد.' ]);
    }
}
