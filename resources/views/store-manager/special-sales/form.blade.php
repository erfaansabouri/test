@extends('store-manager.master')
@section('page-title')
فروش ویژه
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
                            <h2>فروش ویژه</h2>
                        </div>
                        <!--end::کارت title-->
                    </div>
                    <!--end::کارت header-->
                    <!--begin::کارت body-->
                    <div class="card-body pt-5">
                        <!--begin::Form-->
                        <form id="kt_account_profile_details_form" class="form" method="POST" action="@if(isset($special_sale)) {{ route('store-manager.special-sales.update', $special_sale->id) }} @else {{ route('store-manager.special-sales.store') }} @endif">
                            @csrf
                            @method('POST')
                            <!--begin::کارت body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Tags-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">میزان تخفیف</label>
                                    <!--end::Tags-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row">
                                                <div class="input-group  mb-5">
                                                    <input value="{{ @$special_sale->discount_percent }}" type="text" name="discount_percent" class="form-control" placeholder="مثلا 50">
                                                    <span class="input-group-text" id="basic-addon2">درصد</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Tags-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">سقف تخفیف</label>
                                    <!--end::Tags-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row">
                                                <div class="input-group  mb-5">
                                                    <input value="{{ @$special_sale->discount_ceiling }}" type="text" name="discount_ceiling" class="form-control price-input" placeholder="مثلا 50000">
                                                    <span class="input-group-text" id="basic-addon2">تومان</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Tags-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">حداقل مبلغ خرید برای دریافت کوپن</label>
                                    <!--end::Tags-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row">
                                                <div class="input-group  mb-5">
                                                    <input value="{{ @$special_sale->lower_purchase_amount }}" type="text" name="lower_purchase_amount" class="form-control price-input" placeholder="مثلا 50000">
                                                    <span class="input-group-text" id="basic-addon2">تومان</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Tags-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">حداکثر مبلغ خرید برای دریافت کوپن</label>
                                    <!--end::Tags-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row">
                                                <div class="input-group  mb-5">
                                                    <input value="{{ @$special_sale->upper_purchase_amount }}" type="text" name="upper_purchase_amount" class="form-control price-input" placeholder="مثلا 50000">
                                                    <span class="input-group-text" id="basic-addon2">تومان</span>
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
                                                    <input value="@if(isset($special_sale) && $special_sale->started_at) {{ Verta::instance($special_sale->started_at)->format('Y/m/d') }} @endif" name="started_at" class="form-control  persian-datepicker" placeholder="تاریخ شروع"/>
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
                                                    <input value="@if(isset($special_sale) && $special_sale->ended_at) {{ Verta::instance($special_sale->ended_at)->format('Y/m/d') }} @endif" name="ended_at" class="form-control  persian-datepicker" placeholder="تاریخ پایان"/>
                                                    <span class="input-group-text" id="basic-addon2">-</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Tags-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">شعبه</label>
                                    <!--end::Tags-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row">
                                                <div class="input-group  mb-5">
                                                    <input value="{{ @$special_sale->branch }}" type="text" name="branch" class="form-control" placeholder="مثلا شعبه یک">
                                                    <span class="input-group-text" id="basic-addon2">-</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Tags-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">سطح مشتری هدف</label>
                                    <!--end::Tags-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row">
                                                <div class="input-group  mb-5">
                                                    <select class="form-select" name="store_level_id">
                                                        <option value="">انتخاب کنید</option>
                                                        @foreach($store_levels as $store_level)
                                                            <option @if(isset($special_sale) && $special_sale->store_level_id == $store_level->id) selected @endif value="{{ $store_level->id }}">{{ $store_level->level_name }}</option>
                                                        @endforeach
                                                    </select>
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
