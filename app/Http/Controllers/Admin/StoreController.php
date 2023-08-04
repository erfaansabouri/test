<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PointSetting;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function ajaxIndex(Request $request)
    {
        $search = $request->search;
        $stores = Store::query()
            ->where('title', 'like', '%' . $search . '%')
            ->get();
        $result = [];
        foreach ($stores as $store) {
            $result[] = [
                'id' => $store->id,
                'text' => $store->id . "- " . $store->title,
            ];
        }
        return $result;
    }

    public function index(Request $request)
    {
        $stores = Store::query()
            ->when($request->search, function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%');
            })
            ->orderByDesc('id')
            ->paginate(50);
        return view('admin.stores.index', compact('stores'));
    }

    public function create()
    {
        $point_setting = PointSetting::firstOrFail();
        return view('admin.stores.form', compact('point_setting'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'price' => ['required', 'numeric'],
            'point' => ['required', 'numeric'],
        ]);
        $record = new Store();
        $record = $this->updateOrCreate($record, $request);
        return redirect()->route('admin.stores.edit', $record->id)->with([
            'success' => "تغییرات با موفقیت اعمال شد."
        ]);
    }

    private function updateOrCreate(Store $record, Request $request)
    {
        $record->title = $request->title;
        $record->price = $request->price;
        $record->point = $request->point;
        $record->is_disable = $request->is_disable == 'on' ? true : false;
        $record->save();
        return $record;
    }

    public function edit($id)
    {
        $record = Store::query()->findOrFail($id);
        $point_setting = PointSetting::firstOrFail();
        return view('admin.stores.form', compact('record', 'point_setting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
            'price' => ['required', 'numeric'],
            'point' => ['required', 'numeric'],
        ]);
        $record = Store::query()->findOrFail($id);
        $this->updateOrCreate($record, $request);
        return redirect()->back()->with([
            'success' => "تغییرات با موفقیت اعمال شد."
        ]);
    }
}
