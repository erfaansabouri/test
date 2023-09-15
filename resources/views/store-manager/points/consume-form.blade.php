@extends('store-manager.master')
@section('page-title')
    خرج امتیاز
@endsection
@section('content')
    <div class="card mb-5 mb-xl-10">
        <!--begin::کارت header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
             data-bs-target="#kt_account_profile_details" aria-controls="kt_account_profile_details">
            <!--begin::کارت title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">
                    خرج امتیاز
                </h3>
            </div>
            <!--end::کارت title-->
        </div>
        <!--begin::کارت header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">

            <!--begin::Form-->
            <form id="kt_account_profile_details_form" class="form" method="POST"
                  action="{{ route('store-manager.points.store-consume') }}">
                @csrf
                @method('POST')
                <!--begin::کارت body-->
                <div class="card-body border-top p-9">

                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">شماره تماس</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6 fv-row">
                                    <div class="input-group  mb-5">
                                        <input dir="ltr" autocomplete="off" id="phone_number" type="text" name="phone_number" value="{{ old('phone_number') }}"
                                               class="form-control" placeholder="09..." aria-label="شماره تماس"
                                               aria-describedby="basic-addon3">
                                    </div>
                                    <div class="form-text" id="search-result"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label id="value_label" class="col-lg-4 col-form-label required fw-semibold fs-6">مقدار امتیاز</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6 fv-row">
                                    <div class="input-group  mb-5">
                                        <input autocomplete="off"  id="value" type="text" name="points" value="{{ old('points') }}"
                                               class="form-control price-input" placeholder="مقدار امتیاز" aria-label=""
                                               aria-describedby="basic-addon3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label id="value_label" class="col-lg-4 col-form-label required fw-semibold fs-6">شماره فاکتور</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6 fv-row">
                                    <div class="input-group  mb-5">
                                        <input autocomplete="off"  id="value" type="text" name="invoice_code" value="{{ old('invoice_code') }}"
                                               class="form-control" placeholder="شماره فاکتور" aria-label=""
                                               aria-describedby="basic-addon3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label id="value_label" class="col-lg-4 col-form-label required fw-semibold fs-6">رمز عبور کاربر</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6 fv-row">
                                    <div class="input-group  mb-5">
                                        <input autocomplete="off"  id="value" type="password" name="password"
                                                class="form-control" placeholder="رمز عبور" aria-label=""
                                                aria-describedby="basic-addon3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::کارت body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a href="{{ route('store-manager.points.index') }}" type="reset"
                       class="btn btn-light btn-active-light-primary me-2">لغو</a>
                    <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">ذخیره تغییرات
                    </button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Get references to the radio button and input element
            const purchase_option = $("#purchase");
            const non_purchase_option = $("#non-purchase");
            const value = $("#value");

            // Add a click event listener to the radio button
            purchase_option.on("click", function() {
                if (purchase_option.prop("checked")) {
                    value.prop("disabled", false);
                    $('#value_label').html('مبلغ را به تومان وارد کنید:')
                    value.attr("placeholder", "مبلغ را به تومان وارد کنید:"); // Change placeholder text
                }
            });
            non_purchase_option.on("click", function() {

                if (non_purchase_option.prop("checked")) {
                    value.prop("disabled", false);
                    $('#value_label').html('مقدار امتیاز را وارد کنید:')
                    value.attr("placeholder", "مقدار امتیاز را وارد کنید:"); // Change placeholder text
                }
            });
            $('#phone_number').on("keyup", function() {
                const phone_number = $('#phone_number').val();

                // Make an AJAX call
                $.ajax({
                    url: '{{ route('store-manager.customers.ajax-find-by-phone-number') }}', // Replace with your actual API URL
                    method: "GET",
                    data: { search: phone_number },
                    success: function(response) {
                        // Update the output div with the AJAX response
                        if(response.status){
                            $('#search-result').html("<span class='text-success'>"+response.customer+"</span>");
                        }else{
                            $('#search-result').html("<span class='text-danger'>"+response.customer+"</span>");
                        }
                    },
                    error: function(error) {
                        $('#search-result').html('کاربری یافت نشد!');
                    }
                });
            });
        });

    </script>
@endpush
