<?php

namespace App\Http\Controllers\StoreManager;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerStore;
use App\Models\StoreLevel;
use App\Services\DateServices;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function ajaxFindByPhoneNumber(Request $request)
    {
        $customer = Customer::query()
            ->where('phone_number', $request->search)
            ->first();
        if ($customer) {
            return [
                'status' => true,
                'customer' => "کاربر یافت شد: " . $customer->first_name . " " . $customer->last_name,
            ];
        } else {
            return [
                'status' => false,
                'customer' => "کاربری با شماره {$request->search} یافت نشد.",
            ];
        }
    }

    public function ajaxIndex(Request $request)
    {
        $store_manager = Auth::guard('store-manager')->user();
        $customers = Customer::query()
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('id', $request->search)
                        ->orwhere('first_name', 'like', '%' . $request->search . '%')
                        ->orwhere('last_name', 'like', '%' . $request->search . '%')
                        ->orwhere('group_name', 'like', '%' . $request->search . '%')
                        ->orwhere('email', 'like', '%' . $request->search . '%')
                        ->orwhere('phone_number', 'like', '%' . $request->search . '%')
                        ->orwhere('national_code', 'like', '%' . $request->search . '%')
                        ->orwhere('birthdate', 'like', '%' . $request->search . '%');
                });
            })
            ->orderByDesc('id')
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
        $store_manager = Auth::guard('store-manager')->user();
        $customers = Customer::interactWithStore($store_manager->store_id)
            ->with(['storeProfiles' => function ($query) use ($store_manager) {
                $query->where('store_id', $store_manager->store_id);
            }])
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('id', $request->search)
                        ->orwhere('first_name', 'like', '%' . $request->search . '%')
                        ->orwhere('last_name', 'like', '%' . $request->search . '%')
                        ->orwhere('group_name', 'like', '%' . $request->search . '%')
                        ->orwhere('email', 'like', '%' . $request->search . '%')
                        ->orwhere('phone_number', 'like', '%' . $request->search . '%')
                        ->orwhere('national_code', 'like', '%' . $request->search . '%')
                        ->orwhere('birthdate', 'like', '%' . $request->search . '%');
                });
            })
            ->orderByDesc('id')
            ->paginate(30);
        return view('store-manager.customers.index', compact('customers', 'store_manager'));
    }

    public function loyalIndex(Request $request)
    {
        $store_manager = Auth::guard('store-manager')->user();
        $customers = Customer::interactWithStore($store_manager->store_id)
            ->withCount(['points' => function ($query) use ($store_manager) {
                $query->where('store_id', $store_manager->store_id);
            }])
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('id', $request->search)
                        ->orwhere('first_name', 'like', '%' . $request->search . '%')
                        ->orwhere('last_name', 'like', '%' . $request->search . '%')
                        ->orwhere('group_name', 'like', '%' . $request->search . '%')
                        ->orwhere('email', 'like', '%' . $request->search . '%')
                        ->orwhere('phone_number', 'like', '%' . $request->search . '%')
                        ->orwhere('national_code', 'like', '%' . $request->search . '%')
                        ->orwhere('birthdate', 'like', '%' . $request->search . '%');
                });
            })
            ->orderByDesc('points_count')
            ->paginate(30);
        return view('store-manager.customers.loyal-index', compact('customers', 'store_manager'));
    }

    public function mostPurchaseIndex(Request $request)
    {
        $store_manager = Auth::guard('store-manager')->user();
        $ids = CustomerStore::where('store_id', $store_manager->store_id)
            ->orderByDesc('total_price')
            ->pluck('customer_id')->toArray();
        $ids_ordered = implode(',', $ids);
        $customers = Customer::interactWithStore($store_manager->store_id)
            ->withCount(['points' => function ($query) use ($store_manager) {
                $query->where('store_id', $store_manager->store_id);
            }])
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('id', $request->search)
                        ->orwhere('first_name', 'like', '%' . $request->search . '%')
                        ->orwhere('last_name', 'like', '%' . $request->search . '%')
                        ->orwhere('group_name', 'like', '%' . $request->search . '%')
                        ->orwhere('email', 'like', '%' . $request->search . '%')
                        ->orwhere('phone_number', 'like', '%' . $request->search . '%')
                        ->orwhere('national_code', 'like', '%' . $request->search . '%')
                        ->orwhere('birthdate', 'like', '%' . $request->search . '%');
                });
            })
            ->orderByRaw("FIELD(id, $ids_ordered)")
            ->paginate(30);
        return view('store-manager.customers.most-purchase-index', compact('customers', 'store_manager'));
    }

    public function noReturnIndex(Request $request)
    {
        $store_manager = Auth::guard('store-manager')->user();
        $customers = Customer::interactWithStore($store_manager->store_id)
            ->withCount([
                'points' => function ($query) use ($store_manager) {
                    $query->where('store_id', $store_manager->store_id);
                },
            ])
            ->whereHas('points', function ($query) use ($store_manager) {
                $query->where('store_id', $store_manager->store_id);
            }, '=', 1)
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('id', $request->search)
                        ->orwhere('first_name', 'like', '%' . $request->search . '%')
                        ->orwhere('last_name', 'like', '%' . $request->search . '%')
                        ->orwhere('group_name', 'like', '%' . $request->search . '%')
                        ->orwhere('email', 'like', '%' . $request->search . '%')
                        ->orwhere('phone_number', 'like', '%' . $request->search . '%')
                        ->orwhere('national_code', 'like', '%' . $request->search . '%')
                        ->orwhere('birthdate', 'like', '%' . $request->search . '%');
                });
            })
            ->orderByDesc("id")
            ->paginate(30);
        return view('store-manager.customers.no-return-index', compact('customers', 'store_manager'));
    }

    public function forgetfulIndex(Request $request)
    {
        $store_manager = Auth::guard('store-manager')->user();
        $customers = Customer::interactWithStore($store_manager->store_id)
            ->withCount([
                'points' => function ($query) use ($store_manager) {
                    $query->where('store_id', $store_manager->store_id);
                },
            ])
            ->whereDoesntHave('points', function ($query) {
                $query->where('created_at', '>', now()->subMonths(1));
            })
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('id', $request->search)
                        ->orwhere('first_name', 'like', '%' . $request->search . '%')
                        ->orwhere('last_name', 'like', '%' . $request->search . '%')
                        ->orwhere('group_name', 'like', '%' . $request->search . '%')
                        ->orwhere('email', 'like', '%' . $request->search . '%')
                        ->orwhere('phone_number', 'like', '%' . $request->search . '%')
                        ->orwhere('national_code', 'like', '%' . $request->search . '%')
                        ->orwhere('birthdate', 'like', '%' . $request->search . '%');
                });
            })
            ->orderByDesc("id")
            ->paginate(30);
        return view('store-manager.customers.forgetful-index', compact('customers', 'store_manager'));
    }

    public function bornThisMonthIndex(Request $request)
    {
        $store_manager = Auth::guard('store-manager')->user();
        $customers = Customer::interactWithStore($store_manager->store_id)
            ->withCount([
                'points' => function ($query) use ($store_manager) {
                    $query->where('store_id', $store_manager->store_id);
                },
            ])
            ->whereMonth('birthdate', now()->month)
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('id', $request->search)
                        ->orwhere('first_name', 'like', '%' . $request->search . '%')
                        ->orwhere('last_name', 'like', '%' . $request->search . '%')
                        ->orwhere('group_name', 'like', '%' . $request->search . '%')
                        ->orwhere('email', 'like', '%' . $request->search . '%')
                        ->orwhere('phone_number', 'like', '%' . $request->search . '%')
                        ->orwhere('national_code', 'like', '%' . $request->search . '%')
                        ->orwhere('birthdate', 'like', '%' . $request->search . '%');
                });
            })
            ->orderByDesc("id")
            ->paginate(30);
        return view('store-manager.customers.born-this-month-index', compact('customers', 'store_manager'));
    }

    public function create()
    {
        $store_manager = Auth::guard('store-manager')->user();
        return view('store-manager.customers.form', compact('store_manager'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => ['required', 'unique:customers,phone_number']
        ]);
        $customer = new Customer();
        $customer = $this->updateOrCreate($customer, $request);
        return redirect()->route('store-manager.customers.edit', $customer->id)->with([
            'success' => "تغییرات با موفقیت اعمال شد."
        ]);
    }

    public function edit($id)
    {
        $record = Customer::findOrFail($id);
        $store_manager = Auth::guard('store-manager')->user();
        return view('store-manager.customers.form', compact('record', 'store_manager'));
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

    private function updateOrCreate(Customer $record, Request $request)
    {
        $record->first_name = $request->first_name;
        $record->last_name = $request->last_name;
        $record->email = $request->email;
        $record->phone_number = $request->phone_number;
        $record->national_code = $request->national_code;
        $record->created_by_store_id = Auth::guard('store-manager')->user()->store_id;
        if ($request->birthdate) {
            $record->birthdate = DateServices::jalaliToCarbon($request->birthdate)->format('Y-m-d');
        }
        $record->save();
        return $record;
    }

    public function levelsChart(Request $request){
        $store_manager = Auth::guard('store-manager')->user();
        $levels = StoreLevel::query()
            ->where('store_id', $store_manager->store_id)
            ->get();

        foreach ($levels as $level){
            $level->customers_count = CustomerStore::where('store_id', $store_manager->store_id)
                ->whereBetween('stars', [$level->min_stars_count, $level->max_stars_count])
                ->count();
        }

        return view('store-manager.customers.levels-chart', compact('levels'));
    }
}
