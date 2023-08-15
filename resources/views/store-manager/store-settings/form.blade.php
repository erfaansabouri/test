@extends('store-manager.master')
@section('page-title')
    تنظیمات کسب و کار من
@endsection
@section('content')
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
                <h2>    تنظیمات کسب و کار من</h2>
            </div>
            <!--end::کارت title-->
        </div>
        <!--end::کارت header-->
        <!--begin::کارت body-->
        <div class="card-body pt-5">
            <!--begin::Form-->
            <form id="kt_account_profile_details_form" class="form" method="POST" action="{{ route('store-manager.store-settings.update') }}">
                @csrf
                @method('POST')
                <!--begin::کارت body-->
                <div class="card-body border-top p-9">
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Tags-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">در صورتی که مشتری پروفایل خود را تکمیل کرد:</label>
                        <!--end::Tags-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-6 fv-row">
                                    <div class="input-group  mb-5">
                                        <input value="{{ @$store_setting->customer_completed_profile_event_stars }}" type="text" name="customer_completed_profile_event_stars" class="form-control" placeholder="تعداد ستاره" aria-label="تعداد ستاره" aria-describedby="basic-addon2">
                                        <span class="input-group-text" id="basic-addon2">ستاره به عنوان پاداش دریافت کند.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-6">
                        <!--begin::Tags-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">در صورتی که مشتری خرید انجام داد:</label>
                        <!--end::Tags-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-6 fv-row">
                                    <div class="input-group  mb-5">
                                        <input value="{{ $store_setting->customer_did_a_purchased_from_store_event_stars }}" type="text" name="customer_did_a_purchased_from_store_event_stars" class="form-control" placeholder="تعداد ستاره" aria-label="تعداد ستاره" aria-describedby="basic-addon2">
                                        <span class="input-group-text" id="basic-addon2">ستاره به عنوان پاداش دریافت کند.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-6">
                        <!--begin::Tags-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">در صورتی که مشتری عضو کسب و کار من شد:</label>
                        <!--end::Tags-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-6 fv-row">
                                    <div class="input-group  mb-5">
                                        <input value="{{ $store_setting->customer_joined_store_event_stars }}" type="text" name="customer_joined_store_event_stars" class="form-control" placeholder="تعداد ستاره" aria-label="تعداد ستاره" aria-describedby="basic-addon2">
                                        <span class="input-group-text" id="basic-addon2">ستاره به عنوان پاداش دریافت کند.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-6">
                        <!--begin::Tags-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">در صورتی که مشتری از رویداد غیر پرداختی امتیاز گرفت:</label>
                        <!--end::Tags-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-6 fv-row">
                                    <div class="input-group  mb-5">
                                        <input value="{{ $store_setting->customer_received_non_purchase_point_event_stars }}" type="text" name="customer_received_non_purchase_point_event_stars" class="form-control" placeholder="تعداد ستاره" aria-label="تعداد ستاره" aria-describedby="basic-addon2">
                                        <span class="input-group-text" id="basic-addon2">ستاره به عنوان پاداش دریافت کند.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-6">
                        <!--begin::Tags-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">در صورتی که مشتری یک نفر را دعوت کرد:</label>
                        <!--end::Tags-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-6 fv-row">
                                    <div class="input-group  mb-5">
                                        <input value="{{ $store_setting->customer_referred_a_friend_event_stars }}" type="text" name="customer_referred_a_friend_event_stars" class="form-control" placeholder="تعداد ستاره" aria-label="تعداد ستاره" aria-describedby="basic-addon2">
                                        <span class="input-group-text" id="basic-addon2">ستاره به عنوان پاداش دریافت کند.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-6">
                        <!--begin::Tags-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">در صورتی که مشتری بیش از </label>
                        <!--end::Tags-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-6 fv-row">
                                    <div class="input-group  mb-5">
                                        <input value="{{ $store_setting->customer_purchased_more_than_amount }}" type="text" name="customer_purchased_more_than_amount" class="form-control" placeholder="تعداد ستاره" aria-label="تعداد ستاره" aria-describedby="basic-addon2">
                                        <span class="input-group-text" id="basic-addon2">تومان خریداری کرد، آنگاه  </span>
                                    </div>
                                </div>
                                <div class="col-lg-6 fv-row">
                                    <div class="input-group  mb-5">
                                        <input value="{{ $store_setting->customer_purchased_more_than_amount_event_stars }}" type="text" name="customer_purchased_more_than_amount_event_stars" class="form-control" placeholder="تعداد ستاره" aria-label="تعداد ستاره" aria-describedby="basic-addon2">
                                        <span class="input-group-text" id="basic-addon2">ستاره به عنوان پاداش دریافت کنند</span>
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
                    <a href="{{ route('admin.stores.index') }}" type="reset" class="btn btn-light btn-active-light-primary me-2">لغو</a>
                    <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">ذخیره تغییرات</button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::کارت body-->
    </div>
@endsection
