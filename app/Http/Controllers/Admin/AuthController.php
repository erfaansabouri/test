<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function loginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'phone_number' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::guard('admin')
            ->attempt(['phone_number' => $request->phone_number , 'password' => $request->password])
        ){
            return redirect()->route('admin.point-settings.edit');
        }
        return redirect()
            ->back()
            ->withInput($request->only('phone_number'))
            ->withErrors(['err' => 'اطلاعات معتبر نمیباشد.']);
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.auth.login-form');
    }
}
