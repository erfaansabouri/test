@extends('admin.master')
@section('page-title')
قرعه کشی
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-flush h-lg-100" id="kt_contacts_main">
                    <!--begin::کارت header-->
                    <div class="card-header pt-7" id="kt_chat_contacts_header">
                        <!--begin::کارت title-->
                        <div class="card-title">
                            <i class="ki-duotone ki-badge fs-1 me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                            <h2>قرعه کشی</h2>
                        </div>
                        <!--end::کارت title-->
                    </div>
                    <!--end::کارت header-->
                    <!--begin::کارت body-->
                    <div class="card-body pt-5">
                        <!--begin::Form-->
                        <form id="kt_account_profile_details_form" class="form" method="POST" action="@if(isset($lottery)) {{ route('admin.lotteries.update', $lottery->id) }} @else {{ route('admin.lotteries.store') }} @endif">
                            @csrf
                            @method('POST')
                            <!--begin::کارت body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Tags-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">عنوان قرعه کشی</label>
                                    <!--end::Tags-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row">
                                                <div class="input-group  mb-5">
                                                    <input value="{{ @$lottery->title }}" type="text" name="title" class="form-control" placeholder="مثلا قرعه کشی یک">
                                                    <span class="input-group-text" id="basic-addon2">-</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Tags-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">توضیحات قرعه کشی</label>
                                    <!--end::Tags-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row">
                                                <div class="input-group  mb-5">
                                                    <input value="{{ @$lottery->description }}" type="text" name="description" class="form-control" placeholder="مثلا قرعه کشی بزرگ سال">
                                                    <span class="input-group-text" id="basic-addon2">-</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">نام کسب و کار</label>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6 fv-row">
                                                <select id="store-select2"  name="store_id" class="form-select  " data-placeholder="انتخاب کسب و کار">
                                                    @if(isset($lottery))
                                                        <option value="{{ $lottery->store_id }}" selected>{{ $lottery->store->title }}</option>
                                                    @endif
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Tags-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">سقف نفرات شرکت کننده</label>
                                    <!--end::Tags-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row">
                                                <div class="input-group  mb-5">
                                                    <input value="{{ @$lottery->capacity }}" type="text" name="capacity" class="form-control price-input" placeholder="مثلا 100">
                                                    <span class="input-group-text" id="basic-addon2">نفر</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Tags-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">تعداد برندگان</label>
                                    <!--end::Tags-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row">
                                                <div class="input-group  mb-5">
                                                    <input value="{{ @$lottery->max_winners_count }}" type="text" name="max_winners_count" class="form-control" placeholder="مثلا 100">
                                                    <span class="input-group-text" id="basic-addon2">نفر</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Tags-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">امتیاز ورود به قرعه کشی</label>
                                    <!--end::Tags-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row">
                                                <div class="input-group  mb-5">
                                                    <input value="{{ @$lottery->points }}" type="text" name="points" class="form-control price-input" placeholder="مثلا 1000">
                                                    <span class="input-group-text" id="basic-addon2">امتیاز</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Tags-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">تاریخ شروع</label>
                                    <!--end::Tags-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row">
                                                <div class="input-group  mb-5">
                                                    <input value="@if(isset($lottery) && $lottery->started_at) {{ Verta::instance($lottery->started_at)->format('Y/m/d') }} @endif" name="started_at" class="form-control  persian-datepicker" placeholder="تاریخ شروع"/>
                                                    <span class="input-group-text" id="basic-addon2">-</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Tags-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">تاریخ پایان</label>
                                    <!--end::Tags-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row">
                                                <div class="input-group  mb-5">
                                                    <input value="@if(isset($lottery) && $lottery->ended_at) {{ Verta::instance($lottery->ended_at)->format('Y/m/d') }} @endif" name="ended_at" class="form-control  persian-datepicker" placeholder="تاریخ پایان"/>
                                                    <span class="input-group-text" id="basic-addon2">-</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                            </div>
                            <!--end::کارت body-->
                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">ذخیره تغییرات</button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::کارت body-->
                </div>
            </div>
        </div>
    </div>
@endsection
