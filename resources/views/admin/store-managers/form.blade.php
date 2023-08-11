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
                        تنظیمات صاحب کسب و کار
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
                                    ویرایش {{ @$record->first_name }} {{ @$record->last_name }}
                                @else
                                    افزودن صاحب کسب و کار جدید
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
                        <form id="kt_account_profile_details_form" class="form" method="POST" action="@if(isset($record)) {{ route('admin.store-managers.update', $record->id) }} @else {{ route('admin.store-managers.store') }} @endif">
                            @csrf
                            @method('POST')
                            <!--begin::کارت body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">نام کسب و کار</label>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6 fv-row">
                                                <select id="store-select2"  name="store_id" class="form-select  " data-placeholder="انتخاب کسب و کار">
                                                    <option></option>
                                                    @if(isset($record))
                                                        <option value="{{ $record->store_id }}" selected>{{ $record->store->title }}</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">نام صاحب کسب و کار</label>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6 fv-row">
                                                <div class="input-group  mb-5">
                                                    <input value="{{ @$record->first_name }}" type="text" name="first_name" class="form-control" placeholder="نام صاحب کسب و کار" aria-label="نام صاحب کسب و کار" aria-describedby="basic-addon3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">نام خانوادگی صاحب کسب و کار</label>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6 fv-row">
                                                <div class="input-group  mb-5">
                                                    <input value="{{ @$record->last_name }}" type="text" name="last_name" class="form-control" placeholder="نام خانوادگی صاحب کسب و کار" aria-label="نام خانوادگی صاحب کسب و کار" aria-describedby="basic-addon3">
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
                                                    <input value="{{ @$record->phone_number }}" type="text" name="phone_number" class="form-control" placeholder="مثلا 09375556677" aria-label="شماره تماس" aria-describedby="basic-addon3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">غیر فعال سازی حساب</label>
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
                                <hr>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">دسترسی های مجاز</label>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            @foreach(\Spatie\Permission\Models\Permission::query()->where('guard_name', 'store-manager')->get() as $permission)
                                                <div class="col-lg-3 fv-row mb-2">
                                                    <div class="form-check">
                                                        <input @if(isset($record) && $record->hasPermissionTo($permission->name)) checked @endif name="permission_ids[]" class="form-check-input" type="checkbox" value="{{ $permission->id }}" id="flexCheckDefault" />
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            {{ $permission->name }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">رمز عبور</label>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6 fv-row">
                                                <div class="input-group  mb-5">
                                                    <input autocomplete="off" value="" type="password" name="password" class="form-control" placeholder="رمز عبور" aria-label="رمز عبور" aria-describedby="basic-addon3">
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
                                <a href="{{ route('admin.store-managers.index') }}" type="reset" class="btn btn-light btn-active-light-primary me-2">لغو</a>
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
