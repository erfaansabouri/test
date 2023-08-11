@extends('admin.master')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid py-3 py-lg-6">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::پایه info-->
                <div class="card mb-5 mb-xl-10">
                    <!--begin::کارت header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expوed="true" aria-controls="kt_account_profile_details">
                        <!--begin::کارت title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">
                                افزودن امتیاز (رویداد پرداختی)
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
                        <form id="kt_account_profile_details_form" class="form" method="POST" action="{{ route('admin.points.store-purchase') }}">
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
                                                <select id="store-select2"  name="store_id" class="form-select  " data-placeholder="انتخاب فروشگاه">
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">نام مشتری</label>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6 fv-row">
                                                <select id="customer-select2"  name="customer_id" class="form-select  " data-placeholder="انتخاب مشتری">
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">مبلغ خرید</label>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6 fv-row">
                                                <div class="input-group  mb-5">
                                                    <input id="price" type="text" name="price" class="form-control" placeholder="مبلغ خرید" aria-label="مبلغ خرید" aria-describedby="basic-addon3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="overflow-auto pb-5">
                                            <!--begin::Notice-->
                                            <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed min-w-lg-600px flex-shrink-0 p-6">
                                                <!--begin::Icon-->
                                                <i class="fa fa-star fs-2tx text-primary me-4">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                                <!--end::Icon-->
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                                    <!--begin::Content-->
                                                    <div class="mb-3 mb-md-0 fw-semibold">
                                                        <h4 id="points" class="text-gray-900 fw-bold">امتیاز: 0</h4>
                                                        <div class="fs-6 text-gray-700 pe-7">پس از پر کردن تمام مقادیر با زدن دکمه روبرو امتیاز دریافتی را محاسبه کنید.</div>
                                                        <div class="fs-6 text-danger pe-7" id="calculate-points-error"></div>
                                                    </div>
                                                    <!--end::Content-->
                                                    <!--begin::Actions-->
                                                    <button type="button" id="calculate-points" class="btn btn-light-dark px-6 align-self-center text-nowrap">پردازش</button>
                                                    <!--end::Actions-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Notice-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::کارت body-->
                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <a href="{{ route('admin.points.index') }}" type="reset" class="btn btn-light btn-active-light-primary me-2">لغو</a>
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

@push('scripts')
    <script>

        $(document).ready(function () {
           $('#calculate-points').click(function () {
               $('#calculate-points-error').html("در حال محاسبه...")

               var store_id = $('#store-select2').val()
               var customer_id = $('#customer-select2').val()
               var price = $('#price').val()

               $.ajax({
                   type: 'POST', // Change to 'GET' if appropriate
                   url: "{{ route('admin.points.calculate-points') }}", // Replace with the URL of your server endpoint
                   data: {
                       store_id: store_id,
                       customer_id: customer_id,
                       price: price,
                       _token: "{{ csrf_token() }}"
                   },
                   success: function (response) {
                       if(response.price){
                           $('#points').html("امتیاز: " + response.price)
                           $('#calculate-points-error').html("")

                       }else{
                           $('#calculate-points-error').html("خطا در محاسبه! لطفا تمام مقادیر رو پر کنید.")
                       }
                       console.log(response); // For example, log the response to the console
                   },
                   error: function (xhr, status, error) {
                       // Handle any errors that occurred during the AJAX call
                       $('#calculate-points-error').html("خطا در ارسال فرم!.")
                   }
               });
           })
        });
    </script>
@endpush
