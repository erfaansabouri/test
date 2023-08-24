@extends('store-manager.master')
@section('page-title')
    تنظیمات کوپن های تخفیف اتوماتیک
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
                            <h2>تعریف کوپن هر رویداد</h2>
                        </div>
                        <!--end::کارت title-->
                    </div>
                    <!--end::کارت header-->
                    <!--begin::کارت body-->
                    <div class="card-body pt-5">
                        <!--begin::Form-->
                        <form id="kt_account_profile_details_form" class="form" method="POST" action="{{ route('store-manager.coupon-generators.update') }}">
                            @csrf
                            @method('POST')
                            <!--begin::کارت body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="input-group mb-5">
                                    <span class="input-group-text" id="basic-addon3">اگر از آخرین خرید مشتری بیش از</span>
                                    <input name="types[{{ \App\Models\Enums\CouponGeneratorTypeEnums::Forgetfulness }}][forgetfulness_days_count]" value="" placeholder="مثلا 1" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                    <span class="input-group-text" id="basic-addon3">روز گذشت آنگاه؛ کد تخفیف به میزان</span>
                                    <input name="types[{{ \App\Models\Enums\CouponGeneratorTypeEnums::Forgetfulness }}][discount_percent]" value="" placeholder="مثلا 20" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                    <span class="input-group-text" id="basic-addon3">درصد و سقف خرید</span>
                                    <input name="types[{{ \App\Models\Enums\CouponGeneratorTypeEnums::Forgetfulness }}][discount_ceiling]" value="" placeholder="مثلا 250000" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                    <span class="input-group-text" id="basic-addon3">تومان و با مدت اعتبار</span>
                                    <input name="types[{{ \App\Models\Enums\CouponGeneratorTypeEnums::Forgetfulness }}][days_count]" value="" placeholder="مثلا 10" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                    <span class="input-group-text" id="basic-addon3">ایجاد شود.</span>

                                </div>
                                <div class="input-group mb-5">
                                    <span class="input-group-text" id="basic-addon3">اگر مشتری بیش از</span>
                                    <input name="types[{{ \App\Models\Enums\CouponGeneratorTypeEnums::PurchasesCount }}][purchases_count]" value="سطح 1" placeholder="مثلا برنزی" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                    <span class="input-group-text" id="basic-addon3">بار خرید انجام داد آنگاه؛ کد تخفیف به میزان</span>
                                    <input name="types[{{ \App\Models\Enums\CouponGeneratorTypeEnums::PurchasesCount }}][discount_percent]" value="0" placeholder="مثلا 1" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                    <span class="input-group-text" id="basic-addon3">درصد و سقف خرید</span>
                                    <input name="types[{{ \App\Models\Enums\CouponGeneratorTypeEnums::PurchasesCount }}][discount_ceiling]" value="0" placeholder="مثلا 50" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                    <span class="input-group-text" id="basic-addon3">تومان و با مدت اعتبار</span>
                                    <input name="types[{{ \App\Models\Enums\CouponGeneratorTypeEnums::PurchasesCount }}][days_count]" value="0" placeholder="مثلا 50" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                    <span class="input-group-text" id="basic-addon3">ایجاد شود.</span>

                                </div>
                                <div class="input-group mb-5">
                                    <span class="input-group-text" id="basic-addon3">اگر مشتری بیش از</span>
                                    <input name="types[{{ \App\Models\Enums\CouponGeneratorTypeEnums::PurchaseAmount }}][purchase_amount]" value="سطح 1" placeholder="مثلا برنزی" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                    <span class="input-group-text" id="basic-addon3">تومان خرید انجام داد آنگاه؛ کد تخفیف به میزان</span>
                                    <input name="types[{{ \App\Models\Enums\CouponGeneratorTypeEnums::PurchaseAmount }}][discount_percent]" value="0" placeholder="مثلا 1" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                    <span class="input-group-text" id="basic-addon3">درصد و سقف خرید</span>
                                    <input name="types[{{ \App\Models\Enums\CouponGeneratorTypeEnums::PurchaseAmount }}][discount_ceiling]" value="0" placeholder="مثلا 50" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                    <span class="input-group-text" id="basic-addon3">تومان و با مدت اعتبار</span>
                                    <input name="types[{{ \App\Models\Enums\CouponGeneratorTypeEnums::PurchaseAmount }}][days_count]" value="0" placeholder="مثلا 50" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                    <span class="input-group-text" id="basic-addon3">ایجاد شود.</span>

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
