<?php

namespace App\Http\Controllers\StoreManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyProfileController extends Controller
{
    public function show()
    {
        $store_manager = Auth::guard('store-manager')->user();
        return view('store-manager.my-profile.show', compact('store_manager'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'new_password' => ['required_with:current_password'],
        ]);
        $store_manager = Auth::guard('store-manager')->user();
        $store_manager->first_name = $request->first_name;
        $store_manager->last_name = $request->last_name;
        if ($request->current_password || $request->new_password){
            if (Hash::check($request->current_password, $store_manager->password)) {
                $store_manager->password = bcrypt($request->new_password);
            } else {
                return redirect()->back()->withErrors([
                    'error' => 'پسورد کنونی اشتباه است.'
                ]);
            }
        }
        $store_manager->save();
        if ($request->hasFile('avatar')) {
            $store_manager->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }
        return redirect()->back()->with(['success' => 'عملیات با موفقیت انجام شد.']);
    }
}
