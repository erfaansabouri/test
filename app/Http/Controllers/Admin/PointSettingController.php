<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PointSetting;
use Illuminate\Http\Request;

class PointSettingController extends Controller
{
    public function edit(){
        $point_setting = PointSetting::query()->firstOrFail();
        return view('admin.point-settings.form', compact('point_setting'));
    }

    public function update(Request $request){
        $request->validate([
            'price' => ['required', 'numeric'],
            'point' => ['required', 'numeric'],
        ]);
        $point_setting = PointSetting::query()->firstOrFail();
        $point_setting->price = $request->price;
        $point_setting->point = $request->point;
        $point_setting->save();

        return redirect()->back()->with([
            'success' => "تغییرات با موفقیت اعمال شد."
        ]);
    }
}
