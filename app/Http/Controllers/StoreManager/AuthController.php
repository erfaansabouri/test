<?php

namespace App\Http\Controllers\StoreManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:store-manager')->except('logout');
    }

    public function loginForm()
    {
        return view('store-manager.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'phone_number' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::guard('store-manager')
            ->attempt(['phone_number' => $request->phone_number , 'password' => $request->password])
        ){
            return redirect()->route('store-manager.welcome');
        }
        return redirect()
            ->back()
            ->withInput($request->only('phone_number'))
            ->withErrors(['err' => 'اطلاعات معتبر نمیباشد.']);
    }

    public function logout(){
        Auth::guard('store-manager')->logout();
        return redirect()->route('store-manager.auth.login-form');
    }
}
