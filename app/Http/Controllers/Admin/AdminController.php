<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request){
        $admins = Admin::query()
            ->where('is_super_admin', false)
            ->when($request->search, function ($query) use ($request){
                $query->where('first_name', 'like', '%'.$request->search.'%');
                $query->orWhere('last_name', 'like', '%'.$request->search.'%');
            })
            ->orderByDesc('created_at')
            ->paginate(50);

        return view('admin.admins.index', compact('admins'));
    }
    public function create(){
        return view('admin.admins.form');
    }

    public function store(Request $request){
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone_number' => ['required'],
            'password' => ['required'],
        ]);
        $record = new Admin();
        $record->first_name = $request->first_name;
        $record->last_name = $request->last_name;
        $record->phone_number = $request->phone_number;
        $record->is_super_admin = $request->is_super_admin == 'on' ? true : false;
        $record->is_disable = $request->is_disable == 'on' ? true : false;
        if ($request->password){
            $record->password = bcrypt($request->password);
        }

        $record->save();

        $record->syncPermissions($request->permission_ids ?? []);

        return redirect()->route('admin.admins.edit', $record->id)->with([
            'success' => "رکورد با موفقیت ایجاد شد."
        ]);
    }

    public function edit($id){
        $record = Admin::findOrFail($id);
        return view('admin.admins.form', compact('record'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone_number' => ['required'],
        ]);
        $record = Admin::findOrFail($id);
        $record->first_name = $request->first_name;
        $record->last_name = $request->last_name;
        $record->phone_number = $request->phone_number;
        $record->is_super_admin = $request->is_super_admin == 'on' ? true : false;
        $record->is_disable = $request->is_disable == 'on' ? true : false;
        if ($request->password){
            $record->password = bcrypt($request->password);
        }

        $record->save();

        $record->syncPermissions($request->permission_ids ?? []);

        return redirect()->back()->with([
            'success' => "تغییرات با موفقیت اعمال شد."
        ]);
    }
}
