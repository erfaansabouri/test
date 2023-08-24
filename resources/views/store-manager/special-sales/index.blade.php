@extends('store-manager.master')
@section('page-title')
    فروش ویژه
@endsection
@section('content')
    <div class="card">
        <!--begin::کارت header-->
        <div class="card-header border-0 pt-6">
            <form  method="GET" action="{{ route('store-manager.store-managers.index') }}">
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
        <div class="card-header border-0 pt-6">
            <!--begin::کارت title-->
            <div class="card-title">
                <!--begin::جستجو-->

                <!--end::جستجو-->
            </div>
            <!--begin::کارت title-->
            <!--begin::کارت toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--begin::Add user-->
                    <a href="{{ route('store-manager.special-sales.create') }}" class="btn btn-light-success">
                        <i class="ki-duotone ki-plus fs-2"></i>ایجاد فروش ویژه</a>
                    <!--end::Add user-->
                </div>

            </div>
            <!--end::کارت toolbar-->
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
                        <th class="min-w-25px">درصد تخفیف</th>
                        <th class="min-w-125px">حداکثر تخفیف</th>
                        <th class="min-w-125px">حداقل خرید</th>
                        <th class="min-w-125px">حداکثر خرید</th>
                        <th class="min-w-125px">بازه</th>
                        <th class="min-w-125px">سطح مشتری هدف</th>
                        <th class="min-w-125px">عملیات</th>
                    </tr>
                    </thead>
                    <tbody class=" fw-semibold">
                    @foreach($special_sales as $special_sale)
                        <tr>
                            <td>{{ $special_sale->id }}</td>
                            <td>{{ $special_sale->discount_percent }}</td>
                            <td>{{ number_format($special_sale->discount_ceiling) }}</td>
                            <td>{{ number_format($special_sale->lower_purchase_amount) }}</td>
                            <td>{{ number_format($special_sale->upper_purchase_amount) }}</td>
                            <td><span class="badge badge-success">{{ verta($special_sale->started_at)->formatJalaliDate() }}</span> -> <span class="badge badge-danger">{{ verta($special_sale->ended_at)->formatJalaliDate() }}</span></td>
                            <td>{{ $special_sale->storeLevel->level_name }}</td>
                            <td>
                                <a href="{{ route('store-manager.special-sales.edit', $special_sale->id) }}" class="btn btn-light-primary">ویرایش</a>
                                <a href="{{ route('store-manager.special-sales.destroy', $special_sale->id) }}" class="btn btn-light-danger">حذف</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!--end::Table-->
            {{ $special_sales->withQueryString()->links("pagination::bootstrap-4") }}
        </div>
        <!--end::کارت body-->
    </div>
@endsection
