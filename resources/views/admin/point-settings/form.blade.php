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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">تنظیمات نرخ تبدیل تومان به امتیاز</h1>
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
                            <h3 class="fw-bold m-0">ویرایش مقادیر</h3>
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
                        <form id="kt_account_profile_details_form" class="form" method="POST" action="{{ route('admin.point-settings.update') }}">
                            @csrf
                            @method('PUT')
                            <!--begin::کارت body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Tags-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">نرخ پیشفرض تبدیل تومان به امتیاز</label>
                                    <!--end::Tags-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row">
                                                <div class="input-group  mb-5">
                                                    <input value="{{ $point_setting->price }}" type="text" name="price" class="form-control" placeholder="مبلغ به تومان" aria-label="مبلغ به تومان" aria-describedby="basic-addon2">
                                                    <span class="input-group-text" id="basic-addon2">مبلغ به تومان</span>
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row">
                                                <div class="input-group  mb-5">
                                                    <input value="{{ $point_setting->point }}" type="text" name="point" class="form-control" placeholder="امتیاز" aria-label="امتیاز" aria-describedby="basic-addon3">
                                                    <span class="input-group-text" id="basic-addon3">امتیاز</span>
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <div class="form-text">هنگامی که یک فروشگاه جدید ایجاد کنید از این مقادیر پیشفرض استفاده خواهد شد.</div>
                                        <!--end::Row-->

                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::کارت body-->
                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <a href="{{ route('admin.welcome') }}" type="reset" class="btn btn-light btn-active-light-primary me-2">لغو</a>
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
