<?php

namespace App\Http\Controllers\StoreManager;

use App\Http\Controllers\Controller;
use App\Models\StoreLevel;
use App\Models\StoreSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreSettingController extends Controller
{
    public function edit()
    {
        $store_manager = Auth::guard('store-manager')->user();
        $store_setting = StoreSetting::query()
            ->firstOrCreate(['store_id' => $store_manager->store_id]);
        $store_levels = StoreLevel::query()
            ->where('store_id', $store_manager->store_id)
            ->get();
        return view('store-manager.store-settings.form', compact('store_manager', 'store_setting', 'store_levels'));
    }

    public function updateLevels(Request $request)
    {
        $request->validate([
            'levels' => ['required', 'array'],
            'levels.*.level_name' => ['required'],
            'levels.*.min_stars_count' => ['required', 'numeric'],
            'levels.*.max_stars_count' => ['required', 'numeric'],
        ]);

        $store_manager = Auth::guard('store-manager')->user();
        $store_manager->store->storeLevels()->delete();
        foreach ($request->levels as $level){
            $store_manager->store->storeLevels()->create($level);
        }
        return redirect()->back()->with(['success' => 'عملیات با موفقیت انجام شد.']);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'customer_completed_profile_event_stars' => ['required', 'numeric'],
            'customer_did_a_purchased_from_store_event_stars' => ['required', 'numeric'],
            'customer_joined_store_event_stars' => ['required', 'numeric'],
            'customer_purchased_more_than_amount' => ['required', 'numeric'],
            'customer_purchased_more_than_amount_event_stars' => ['required', 'numeric'],
            'customer_received_non_purchase_point_event_stars' => ['required', 'numeric'],
            'customer_referred_a_friend_event_stars' => ['required', 'numeric'],
        ]);
        $store_manager = Auth::guard('store-manager')->user();
        $store_setting = StoreSetting::query()
            ->firstOrCreate(['store_id' => $store_manager->store_id]);
        $store_setting->fill($validated);
        $store_setting->save();
        return redirect()->back()->with(['success' => 'عملیات با موفقیت انجام شد.']);
    }
}
