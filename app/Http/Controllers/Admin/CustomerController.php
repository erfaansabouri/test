<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function ajaxIndex(Request $request)
    {
        $customers = Customer::query()
            ->where('id', $request->search)
            ->orwhere('first_name', 'like', '%' . $request->search . '%')
            ->orwhere('last_name', 'like', '%' . $request->search . '%')
            ->orwhere('group_name', 'like', '%' . $request->search . '%')
            ->orwhere('email', 'like', '%' . $request->search . '%')
            ->orwhere('phone_number', 'like', '%' . $request->search . '%')
            ->orwhere('national_code', 'like', '%' . $request->search . '%')
            ->orwhere('birthdate', 'like', '%' . $request->search . '%')
            ->get();
        $result = [];
        foreach ($customers as $customer) {
            $result[] = [
                'id' => $customer->id,
                'text' => $customer->id . "- " . $customer->full_name,
            ];
        }
        return $result;
    }

    public function index(Request $request)
    {
        $customers = Customer::query()
            ->when($request->search, function ($query) use ($request) {
                $query->where('id', $request->search);
                $query->orwhere('first_name', 'like', '%' . $request->search . '%');
                $query->orwhere('last_name', 'like', '%' . $request->search . '%');
                $query->orwhere('group_name', 'like', '%' . $request->search . '%');
                $query->orwhere('email', 'like', '%' . $request->search . '%');
                $query->orwhere('phone_number', 'like', '%' . $request->search . '%');
                $query->orwhere('national_code', 'like', '%' . $request->search . '%');
                $query->orwhere('birthdate', 'like', '%' . $request->search . '%');
            })
            ->orderByDesc('created_at')
            ->paginate(50);
        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => ['required', 'unique:customers,phone_number']
        ]);
        $customer = new Customer();
        $customer = $this->updateOrCreate($customer, $request);
        return redirect()->route('admin.customers.edit', $customer->id)->with([
            'success' => "تغییرات با موفقیت اعمال شد."
        ]);
    }

    private function updateOrCreate(Customer $record, Request $request)
    {
        $record->first_name = $request->first_name;
        $record->last_name = $request->last_name;
        $record->group_name = $request->group_name;
        $record->email = $request->email;
        $record->phone_number = $request->phone_number;
        $record->national_code = $request->national_code;
        $record->birthdate = $request->birthdate;
        $record->save();
        return $record;
    }

    public function edit($id)
    {
        $record = Customer::findOrFail($id);
        return view('admin.customers.form', compact('record'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'phone_number' => ['required', 'unique:customers,phone_number,' . $id]
        ]);
        $customer = Customer::query()->findOrFail($id);
        $this->updateOrCreate($customer, $request);
        return redirect()->back()->with([
            'success' => "تغییرات با موفقیت اعمال شد."
        ]);
    }
}
