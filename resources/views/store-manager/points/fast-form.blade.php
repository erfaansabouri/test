@extends('store-manager.master')
@section('page-title')
    افزودن امتیاز سریع
@endsection
@section('content')
    <div class="card mb-5 mb-xl-10">
        <!--begin::کارت header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
             data-bs-target="#kt_account_profile_details" aria-controls="kt_account_profile_details">
            <!--begin::کارت title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">
                    افزودن امتیاز سریع
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
            <form id="kt_account_profile_details_form" class="form" method="POST"
                  action="{{ route('store-manager.points.store-fast') }}">
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
                                        <input dir="ltr" id="phone_number" type="text" name="phone_number"
                                               class="form-control" placeholder="09..." aria-label="شماره تماس"
                                               aria-describedby="basic-addon3">
                                    </div>
                                    <div class="form-text" id="search-result"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">انتخاب نوع رویداد</label>
                        <div class="col-lg-8">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="purchase" id="purchase" name="type" />
                                <label class="form-check-label" for="flexCheckDefault1">
                                     رویداد پرداختی
                                </label>
                            </div>
                       {{--     <br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="non_purchase" id="non-purchase" name="type" />
                                <label class="form-check-label" for="flexCheckDefault1">
                                     رویداد غیر پرداختی
                                </label>
                            </div>--}}

                        </div>
                    </div>
                    <div class="row mb-6">
                        <label id="value_label" class="col-lg-4 col-form-label required fw-semibold fs-6">مقدار</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6 fv-row">
                                    <div class="input-group  mb-5">
                                        <input disabled id="value" type="text" name="value"
                                               class="form-control price-input" placeholder="ابتدا نوع رویداد را انتخاب کنید" aria-label=""
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
