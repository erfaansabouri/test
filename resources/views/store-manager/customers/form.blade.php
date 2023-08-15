@extends('store-manager.master')
@section('page-title')
    حساب کاربری مشتری
@endsection
@section('content')
    @if(isset($record))
        <div class="card pt-4 mt-6 mb-6">
            <!--begin::کارت header-->
            <div class="card-header border-0">
                <!--begin::کارت title-->
                <div class="card-title">
                    <h2>اطلاعات</h2>
                </div>
                <!--end::کارت title-->
                <!--begin::کارت toolbar-->
                <!--end::کارت toolbar-->
            </div>
            <!--end::کارت header-->
            <!--begin::کارت body-->
            <div class="card-body py-0">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6  fw-semibold gy-5" id="kt_table_customers_رویدادها">
                    <tbody>
                    <tr>
                        <td class="min-w-400px">تاریخ عضویت</td>
                        <td class="pe-0  text-end min-w-200px">{{ Verta::instance($record->created_at)->formatJalaliDatetime() }}</td>
                    </tr>
                    <tr>
                        <td class="min-w-400px">تاریخ اولین خرید</td>
                        <td class="pe-0  text-end min-w-200px">{{ $record->points()->where('store_id', $store_manager->store_id)->first() ? Verta::instance($record->points()->where('store_id', $store_manager->store_id)->first()->created_at)->formatJalaliDatetime() : 'خریدی ندارد'}}</td>
                    </tr>
                    <tr>
                        <td class="min-w-400px">تاریخ آخرین خرید</td>
                        <td class="pe-0  text-end min-w-200px">{{ $record->points()->where('store_id', $store_manager->store_id)->orderByDesc('created_at')->first() ? Verta::instance($record->points()->where('store_id', $store_manager->store_id)->orderByDesc('created_at')->first()->created_at)->formatJalaliDatetime() : 'خریدی ندارد'}}</td>
                    </tr>
                    <tr>
                        <td class="min-w-400px">مجموع امتیاز های دریافتی</td>
                        <td class="pe-0  text-end min-w-200px text-primary fw-bolder">{{ number_format($record->points()->where('store_id', $store_manager->store_id)->sum('point')) }}
                            <small>(رویداد پرداختی = {{ number_format($record->points()->where('store_id', $store_manager->store_id)->purchaseType()->sum('point')) }} + رویداد غیر پرداختی = {{ number_format($record->points()->where('store_id', $store_manager->store_id)->nonPurchaseType()->sum('point')) }})</small>
                        </td>
                    </tr>
                    <tr>
                        <td class="min-w-400px">مجموع امتیاز های مصرف شده</td>
                        <td class="pe-0  text-end min-w-200px text-danger fw-bolder">TODO</td>
                    </tr>
                    <tr>
                        <td class="min-w-400px">مجموع امتیاز های قابل استفاده</td>
                        <td class="pe-0  text-end min-w-200px text-success fw-bolder">{{ number_format($record->balance) }}</td>
                    </tr>
                    <tr>
                        <td class="min-w-400px">نمایش امتیاز های دریافتی</td>
                        <td class="pe-0  text-end min-w-200px"><a target="_blank" href="{{ route('store-manager.points.index', ['customer_id' => $record->id]) }}">رفتن به لیست امتیاز ها</a></td>
                    </tr>
                    </tbody>
                </table>
                <!--end::Table-->
            </div>
            <!--end::کارت body-->
        </div>
    @endif
    <div class="card mb-5 mb-xl-10">
        <!--begin::کارت header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expوed="true" aria-controls="kt_account_profile_details">
            <!--begin::کارت title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">
                    @if(isset($record))
                        ویرایش اطلاعات مشتری {{ @$record->id }}
                    @else
                        افزودن مشتری جدید
                    @endif
                </h3>
            </div>
            <!--end::کارت title-->
        </div>
        <!--begin::کارت header-->
        <!--begin::Content-->

        <div id="kt_account_settings_profile_details" class="collapse show">
            @if ($errors->any())
                <div dir="rtl" class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                    <!--begin::Icon-->
                    <i class="ki-duotone ki-information fs-2tx text-warning me-4">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i>
                    <!--end::Icon-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1">
                        <!--begin::Content-->
                        <div class="fw-semibold">
                            <h4 class="text-gray-900 fw-bold">خطا</h4>
                            <div class="fs-6 text-gray-700">
                                @foreach($errors->all() as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            </div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
            @endif

            <!--begin::Form-->
            <form id="kt_account_profile_details_form" class="form" method="POST" action="@if(isset($record)) {{ route('store-manager.customers.update', $record->id) }} @else {{ route('store-manager.customers.store') }} @endif">
                @csrf
                @method('POST')
                <!--begin::کارت body-->
                <div class="card-body border-top p-9">
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">نام</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6 fv-row">
                                    <div class="input-group  mb-5">
                                        <input value="{{ @$record->first_name }}" type="text" name="first_name" class="form-control" placeholder="نام" aria-label="نام" aria-describedby="basic-addon3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">نام خانوادگی</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6 fv-row">
                                    <div class="input-group  mb-5">
                                        <input value="{{ @$record->last_name }}" type="text" name="last_name" class="form-control" placeholder="نام خانوادگی" aria-label="نام خانوادگی" aria-describedby="basic-addon3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">ایمیل</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6 fv-row">
                                    <div class="input-group  mb-5">
                                        <input value="{{ @$record->email }}" type="text" name="email" class="form-control" placeholder="ایمیل" aria-label="ایمیل" aria-describedby="basic-addon3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">شماره تماس</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6 fv-row">
                                    <div class="input-group  mb-5">
                                        <input value="{{ @$record->phone_number }}" type="text" name="phone_number" class="form-control" placeholder="شماره تماس" aria-label="شماره تماس" aria-describedby="basic-addon3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">کد ملی</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6 fv-row">
                                    <div class="input-group  mb-5">
                                        <input value="{{ @$record->national_code }}" type="text" name="national_code" class="form-control" placeholder="کد ملی" aria-label="کد ملی" aria-describedby="basic-addon3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">تاریخ تولد</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6 fv-row">
                                    <div class="input-group  mb-5">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                        <input value="@if(isset($record) && $record->birthdate) {{ Verta::instance($record->birthdate)->format('Y/m/d') }} @endif" name="birthdate" class="form-control  persian-datepicker" placeholder="تاریخ تولد"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::کارت body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a href="{{ route('store-manager.customers.index') }}" class="btn btn-light btn-active-light-primary me-2">لغو</a>
                    <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">ذخیره تغییرات</button>
                </div>
                <!--end::Actions-->
            </form>

            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>
@endsection
