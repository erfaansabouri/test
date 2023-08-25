<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StoreManager;
use Illuminate\Http\Request;

class StoreManagerController extends Controller {
    public function index ( Request $request ) {
        $store_managers = StoreManager::query()
                                      ->when($request->search , function ( $query ) use ( $request ) {
                                          $query->where('first_name' , 'like' , '%' . $request->search . '%');
                                          $query->orWhere('last_name' , 'like' , '%' . $request->search . '%');
                                      })
                                      ->orderByDesc('created_at')
                                      ->paginate(50);

        return view('admin.store-managers.index' , compact('store_managers'));
    }

    public function create () {
        return view('admin.store-managers.form');
    }

    public function store ( Request $request ) {
        $request->validate([
                               'first_name' => [ 'required' ] ,
                               'last_name' => [ 'required' ] ,
                               'phone_number' => [ 'required' ] ,
                               'password' => [ 'required' ] ,
                               'store_id' => [
                                   'required' ,
                                   'exists:stores,id',
                               ] ,
                           ]);
        $record = new StoreManager();
        $record->store_id = $request->store_id;
        $record->first_name = $request->first_name;
        $record->last_name = $request->last_name;
        $record->phone_number = $request->phone_number;
        $record->is_super_manager = $request->is_super_manager == 'on' ? true : false;
        $record->is_disable = $request->is_disable == 'on' ? true : false;
        if ( $request->password ) {
            $record->password = bcrypt($request->password);
        }
        $record->save();
        $record->syncPermissions($request->permission_ids ?? []);

        return redirect()
            ->route('admin.store-managers.edit' , $record->id)
            ->with([
                       'success' => "رکورد با موفقیت ایجاد شد.",
                   ]);
    }

    public function edit ( $id ) {
        $record = StoreManager::findOrFail($id);

        return view('admin.store-managers.form' , compact('record'));
    }

    public function update ( Request $request , $id ) {
        $request->validate([
                               'first_name' => [ 'required' ] ,
                               'last_name' => [ 'required' ] ,
                               'phone_number' => [ 'required' ] ,
                               'store_id' => [
                                   'required' ,
                                   'exists:stores,id',
                               ] ,
                           ]);
        $record = StoreManager::findOrFail($id);
        $record->store_id = $request->store_id;
        $record->first_name = $request->first_name;
        $record->last_name = $request->last_name;
        $record->phone_number = $request->phone_number;
        $record->is_super_manager = $request->is_super_admin == 'on' ? true : false;
        $record->is_disable = $request->is_disable == 'on' ? true : false;
        if ( $request->password ) {
            $record->password = bcrypt($request->password);
        }
        $record->save();
        $record->syncPermissions($request->permission_ids ?? []);

        return redirect()
            ->back()
            ->with([
                       'success' => "تغییرات با موفقیت اعمال شد.",
                   ]);
    }

    public function loginAs ( $id ) {
        $store_manager = StoreManager::findOrFail($id);
        auth()
            ->guard('store-manager')
            ->loginUsingId($store_manager->id);

        return redirect()->route('store-manager.welcome');
    }
}
