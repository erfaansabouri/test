<?php

namespace App\Http\Controllers\Admin;

use App\Events\CustomerCreatedEvent;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Services\DateServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Verta;

class CustomerController extends Controller {
    public function ajaxIndex ( Request $request ) {
        $customers = Customer::query()
                             ->where('id' , $request->search)
                             ->orwhere('first_name' , 'like' , '%' . $request->search . '%')
                             ->orwhere('last_name' , 'like' , '%' . $request->search . '%')
                             ->orwhere('group_name' , 'like' , '%' . $request->search . '%')
                             ->orwhere('email' , 'like' , '%' . $request->search . '%')
                             ->orwhere('phone_number' , 'like' , '%' . $request->search . '%')
                             ->orwhere('national_code' , 'like' , '%' . $request->search . '%')
                             ->orwhere('birthdate' , 'like' , '%' . $request->search . '%')
                             ->orderByDesc('id')
                             ->get();
        $result = [];
        foreach ( $customers as $customer ) {
            $result[] = [
                'id' => $customer->id ,
                'text' => $customer->id . "- " . $customer->full_name ,
            ];
        }

        return $result;
    }

    public function index ( Request $request ) {
        $customers = Customer::query()
                             ->with([ 'points' ])
                             ->when($request->search , function ( $query ) use ( $request ) {
                                 $query->where('id' , $request->search);
                                 $query->orwhere('first_name' , 'like' , '%' . $request->search . '%');
                                 $query->orwhere('last_name' , 'like' , '%' . $request->search . '%');
                                 $query->orwhere('group_name' , 'like' , '%' . $request->search . '%');
                                 $query->orwhere('email' , 'like' , '%' . $request->search . '%');
                                 $query->orwhere('phone_number' , 'like' , '%' . $request->search . '%');
                                 $query->orwhere('national_code' , 'like' , '%' . $request->search . '%');
                                 $query->orwhere('birthdate' , 'like' , '%' . $request->search . '%');
                             })
                             ->orderByDesc('id')
                             ->paginate(50);

        return view('admin.customers.index' , compact('customers'));
    }

    public function create () {
        return view('admin.customers.form');
    }

    public function store ( Request $request ) {
        $request->validate([
                               'phone_number' => [
                                   'required' ,
                                   'min_digits:11',
                                   'unique:customers,phone_number',
                               ],
                               'national_code' => [
                                   'required' ,
                                   'unique:customers,national_code',
                               ],
                           ]);
        $customer = new Customer();
        $customer = $this->updateOrCreate($customer , $request);

        return redirect()
            ->route('admin.customers.edit' , $customer->id)
            ->with([
                       'success' => "تغییرات با موفقیت اعمال شد.",
                   ]);
    }

    private function updateOrCreate ( Customer $record , Request $request ) {
        $record->first_name = $request->first_name;
        $record->last_name = $request->last_name;
        $record->group_name = $request->group_name;
        $record->email = $request->email;
        $record->phone_number = $request->phone_number;
        $record->national_code = $request->national_code;
        if ( $request->birthdate ) {
            $record->birthdate = DateServices::jalaliToCarbon($request->birthdate)
                                             ->format('Y-m-d');
        }

        if ($request->password){
            $record->password = bcrypt($request->password);
        }
        $record->save();

        if ($request->password){
            CustomerCreatedEvent::dispatch($record->id, $request->password);
        }

        return $record;
    }

    public function edit ( $id ) {
        $record = Customer::findOrFail($id);

        return view('admin.customers.form' , compact('record'));
    }

    public function update ( Request $request , $id ) {
        $request->validate([
                               'phone_number' => [
                                   'required' ,
                                   'min_digits:11',
                                   'unique:customers,phone_number,' . $id,
                               ],
                               'national_code' => [
                                   'required' ,
                                   'unique:customers,national_code,' . $id,
                               ],
                           ]);
        $customer = Customer::query()
                            ->findOrFail($id);
        $this->updateOrCreate($customer , $request);

        return redirect()
            ->back()
            ->with([
                       'success' => "تغییرات با موفقیت اعمال شد.",
                   ]);
    }

    public function ajaxFindByPhoneNumber ( Request $request ) {
        $customer = Customer::query()
                            ->where('phone_number' , $request->search)
                            ->first();
        if ( $customer ) {
            return [
                'status' => true ,
                'customer' => "کاربر یافت شد: " . $customer->first_name . " " . $customer->last_name ,
            ];
        }
        else {
            return [
                'status' => false ,
                'customer' => "کاربری با شماره {$request->search} یافت نشد." ,
            ];
        }
    }
}
