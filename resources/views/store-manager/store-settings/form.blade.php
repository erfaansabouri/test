@extends('store-manager.master')
@section('page-title')
    تنظیمات کسب و کار من
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
                            <h2> تعریف ستاره های هر رویداد</h2>
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
                                                    <input value="{{ @$store_setting->customer_completed_profile_event_stars }}" type="text" name="customer_completed_profile_event_stars" class="form-control price-input" placeholder="تعداد ستاره" aria-label="تعداد ستاره" aria-describedby="basic-addon2">
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
                                                    <input value="{{ $store_setting->customer_did_a_purchased_from_store_event_stars }}" type="text" name="customer_did_a_purchased_from_store_event_stars" class="form-control price-input" placeholder="تعداد ستاره" aria-label="تعداد ستاره" aria-describedby="basic-addon2">
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
                                                    <input value="{{ $store_setting->customer_joined_store_event_stars }}" type="text" name="customer_joined_store_event_stars" class="form-control price-input" placeholder="تعداد ستاره" aria-label="تعداد ستاره" aria-describedby="basic-addon2">
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
                                                    <input value="{{ $store_setting->customer_received_non_purchase_point_event_stars }}" type="text" name="customer_received_non_purchase_point_event_stars" class="form-control price-input" placeholder="تعداد ستاره" aria-label="تعداد ستاره" aria-describedby="basic-addon2">
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
                                                    <input value="{{ $store_setting->customer_referred_a_friend_event_stars }}" type="text" name="customer_referred_a_friend_event_stars" class="form-control price-input" placeholder="تعداد ستاره" aria-label="تعداد ستاره" aria-describedby="basic-addon2">
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
                                                    <input value="{{ $store_setting->customer_purchased_more_than_amount }}" type="text" name="customer_purchased_more_than_amount" class="form-control price-input" placeholder="تعداد ستاره" aria-label="تعداد ستاره" aria-describedby="basic-addon2">
                                                    <span class="input-group-text" id="basic-addon2">تومان خریداری کرد، آنگاه  </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 fv-row">
                                                <div class="input-group  mb-5">
                                                    <input value="{{ $store_setting->customer_purchased_more_than_amount_event_stars }}" type="text" name="customer_purchased_more_than_amount_event_stars" class="form-control price-input" placeholder="تعداد ستاره" aria-label="تعداد ستاره" aria-describedby="basic-addon2">
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
        <br>
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
                            <h2>تعریف سطوح مشتریان</h2>
                        </div>
                        <!--end::کارت title-->
                    </div>
                    <!--end::کارت header-->
                    <!--begin::کارت body-->
                    <div class="card-body pt-5">
                        <!--begin::Form-->
                        <form id="kt_account_profile_details_form" class="form" method="POST" action="{{ route('store-manager.store-settings.update-levels') }}">
                            @csrf
                            @method('POST')
                            <!--begin::کارت body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                @foreach($store_levels as $store_level)
                                    <div class="input-group mb-5">
                                        <span class="input-group-text" id="basic-addon3">نام سطح {{ $loop->index + 1 }}</span>
                                        <input name="levels[{{ $loop->index }}][level_name]" value="{{ $store_level->level_name }}" placeholder="مثلا برنزی" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                        <span class="input-group-text" id="basic-addon3">حداقل ستاره</span>
                                        <input name="levels[{{ $loop->index }}][min_stars_count]" value="{{ $store_level->min_stars_count }}" placeholder="مثلا 1" type="text" class="form-control price-input" id="basic-url" aria-describedby="basic-addon3">
                                        <span class="input-group-text" id="basic-addon3">حداکثر ستاره</span>
                                        <input name="levels[{{ $loop->index }}][max_stars_count]" value="{{ $store_level->max_stars_count }}" placeholder="مثلا 50" type="text" class="form-control price-input" id="basic-url" aria-describedby="basic-addon3">
                                    </div>
                                @endforeach

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
