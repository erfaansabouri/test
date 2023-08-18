@extends('store-manager.master')
@section('page-title')
    مشتریان بدون بازگشت
@endsection
@section('content')
    <div class="card">
        <!--begin::کارت header-->
        <div class="card-header border-0 pt-6">
            <form  method="GET" action="{{ route('store-manager.customers.no-return-index') }}">
                <div class="d-flex align-items-center position-relative my-2 row">
                    <div class="col-8">
                        <div class="input-group ">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                            <input value="{{ request('search') }}" name="search" type="text" class="form-control" placeholder="جستجو" aria-label="جستجو" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary">اعمال</button>
                    </div>
                </div>
            </form>
        </div>
        <!--end::کارت header-->
        <!--begin::کارت body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover align-middle table-row-dashed fs-6 gy-5" >
                    <thead>
                    <tr class="text-center  fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-25px">شناسه</th>
                        <th class="min-w-125px">نام کامل</th>
                        <th class="min-w-125px">شماره تماس</th>
                        <th class="min-w-125px">تعداد خرید</th>
                        <th class="min-w-125px">تاریخ آخرین خرید</th>
                        <th class="min-w-125px">تاریخ عضویت</th>
                        <th class="min-w-125px">مبلغ کل خرید</th>
                        <th class="min-w-125px">ستاره های دریافتی</th>
                        <th class="min-w-125px">جمع امتیاز دریافتی</th>
                        <th class="min-w-125px">امتیاز کل در باشگاه</th>
                        <th class="min-w-125px">عملیات</th>
                    </tr>
                    </thead>
                    <tbody class=" fw-semibold">
                    @foreach($customers as $customer)
                        <tr class="text-center">
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                            <td>{{ $customer->phone_number }}</td>
                            <td>{{ number_format($customer->points()->interactWithStore($store_manager->id)->count()) }}</td>
                            <td>{{ verta($customer->points()->interactWithStore($store_manager->id)->first()->created_at)->format('Y/m/d H:i') }}</td>
                            <td>{{ verta($customer->created_at)->format('Y/m/d H:i') }}</td>
                            <td>{{ number_format($customer->points()->interactWithStore($store_manager->id)->sum('price')) }}</td>
                            <td class="text-primary">{{ number_format($customer->storeProfile($store_manager->store_id)->stars) }}</td>
                            <td class="text-primary">{{ number_format($customer->points()->interactWithStore($store_manager->id)->sum('point')) }}</td>
                            <td class="text-success">{{ number_format($customer->balance) }}</td>
                            <td>
                                <a href="{{ route('store-manager.points.index', ['customer_id' => $customer->id]) }}" class="btn btn-light-info">تاریخچه امتیاز های دریافتی</a>
                                <a href="{{ route('store-manager.customers.edit', $customer->id) }}" class="btn btn-light-primary">ویرایش</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!--end::Table-->
            {{ $customers->withQueryString()->links("pagination::bootstrap-4") }}
        </div>
        <!--end::کارت body-->
    </div>
@endsection
