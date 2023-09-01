<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

    public function loginForm()
    {
        return view('customer.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'phone_number' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::guard('customer')
            ->attempt(['phone_number' => $request->phone_number , 'password' => $request->password])
        ){
            return redirect()->route('customer.welcome');
        }
        return redirect()
            ->back()
            ->withInput($request->only('phone_number'))
            ->withErrors(['err' => 'اطلاعات معتبر نمیباشد.']);
    }

    public function logout(){
        Auth::guard('customer')->logout();
        return redirect()->route('customer.auth.login-form');
    }
}
