@extends('admin.master')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        تنظیمات فروشگاه
                    </h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>

        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::پایه info-->
                <div class="card mb-5 mb-xl-10">
                    <!--begin::کارت header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expوed="true" aria-controls="kt_account_profile_details">
                        <!--begin::کارت title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">
                                @if(isset($record))
                                    ویرایش {{ @$record->title }}
                                @else
                                    افزودن رکورد جدید
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
                        @if (\Illuminate\Support\Facades\Session::get('success'))
                                <div dir="rtl" class="notice d-flex bg-light-success rounded border-success border border-dashed p-6">
                                    <!--begin::Icon-->
                                    <i class="ki-duotone ki-information fs-2tx text-success me-4">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                    <!--end::Icon-->
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <!--begin::Content-->
                                        <div class="fw-semibold">
                                            <h4 class="text-gray-900 fw-bold">تبریک</h4>
                                            <div class="fs-6 text-gray-700">
                                                {{ \Illuminate\Support\Facades\Session::get('success') }}
                                            </div>
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                            @endif
                        <!--begin::Form-->
                        <form id="kt_account_profile_details_form" class="form" method="POST" action="@if(isset($record)) {{ route('admin.stores.update', $record->id) }} @else {{ route('admin.stores.store') }} @endif">
                            @csrf
                            @method('POST')
                            <!--begin::کارت body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">نام فروشگاه</label>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6 fv-row">
                                                <div class="input-group  mb-5">
                                                    <input value="{{ @$record->title }}" type="text" name="title" class="form-control" placeholder="عنوان فروشگاه" aria-label="عنوان فروشگاه" aria-describedby="basic-addon3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Tags-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">نرخ تبدیل تومان به امتیاز</label>
                                    <!--end::Tags-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row">
                                                <div class="input-group  mb-5">
                                                    <input value="{{ @$record->price ?? $point_setting->price }}" type="text" name="price" class="form-control" placeholder="مبلغ به تومان" aria-label="مبلغ به تومان" aria-describedby="basic-addon2">
                                                    <span class="input-group-text" id="basic-addon2">مبلغ به تومان</span>
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row">
                                                <div class="input-group  mb-5">
                                                    <input value="{{ @$record->point ?? $point_setting->point }}" type="text" name="point" class="form-control" placeholder="امتیاز" aria-label="امتیاز" aria-describedby="basic-addon3">
                                                    <span class="input-group-text" id="basic-addon3">امتیاز</span>
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">غیر فعال کردن</label>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6 fv-row">
                                                <div class="form-check form-switch form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" id="is_disable" name="is_disable" @if(isset($record) && $record->is_disable) checked="checked" @endif>
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
                                <a href="{{ route('admin.stores.index') }}" type="reset" class="btn btn-light btn-active-light-primary me-2">لغو</a>
                                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">ذخیره تغییرات</button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::پایه info-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
@endsection
