<?php

namespace App\Http\Controllers\StoreManager;

use App\Http\Controllers\Controller;
use App\Models\StoreManager;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StoreManagerController extends Controller
{
    public function index(Request $request){
        $me = Auth::guard('store-manager')->user();
        $store_managers = StoreManager::query()
            ->where('store_id', $me->store_id)
            ->where('is_super_manager', false)
            ->when($request->search, function ($query) use ($request){
                $query->where('first_name', 'like', '%'.$request->search.'%');
                $query->orWhere('last_name', 'like', '%'.$request->search.'%');
            })
            ->orderByDesc('created_at')
            ->paginate(50);

        return view('store-manager.store-managers.index', compact('store_managers'));
    }

    public function create(){
        return view('store-manager.store-managers.form');
    }

    public function store(Request $request){
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone_number' => ['required'],
        ]);

        $store_manager = new StoreManager();
        $me = Auth::guard('store-manager')->user();
        $store_manager->store_id = $me->id;
        $store_manager = $this->updateOrCreate($store_manager, $request);

        return redirect()->route('store-manager.store-managers.edit', $store_manager->id)->with(['success' => 'عملیات با موفقیت انجام شد.']);

    }

    public function edit($id){
        $me = Auth::guard('store-manager')->user();
        $store_manager = StoreManager::query()
            ->where('store_id', $me->store_id)
            ->where('is_super_manager', false)
            ->where('id', $id)
            ->firstOrFail();
        return view('store-manager.store-managers.form', compact('store_manager'));
    }


    public function update(Request $request, $id){
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone_number' => ['required'],
        ]);

        $me = Auth::guard('store-manager')->user();

        $store_manager = StoreManager::query()
            ->where('store_id', $me->store_id)
            ->where('is_super_manager', false)
            ->where('id', $id)
            ->firstOrFail();

        $this->updateOrCreate($store_manager, $request);
        return redirect()->back()->with(['success' => 'عملیات با موفقیت انجام شد.']);
    }

    public function updateOrCreate($store_manager, $request){

        $store_manager->first_name = $request->first_name;
        $store_manager->last_name = $request->last_name;
        $store_manager->phone_number = $request->phone_number;
        $store_manager->is_disable = $request->is_disable == 'on' ? true : false;

        if ($request->password) {
            $store_manager->password = bcrypt($request->password);
        }
        $store_manager->save();
        if ($request->hasFile('avatar')) {
            $store_manager->addMediaFromRequest('avatar')->toMediaCollection('avatar');
        }
        $store_manager->syncPermissions($request->permission_ids ?? []);
        return $store_manager;
    }
}
