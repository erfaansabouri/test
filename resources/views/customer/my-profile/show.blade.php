@extends('customer.master')
@section('page-title')
    حساب کاربری من
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
                <h2>اطلاعات حساب کاربری من</h2>
            </div>
            <!--end::کارت title-->
        </div>
        <!--end::کارت header-->
        <!--begin::کارت body-->
        <div class="card-body pt-5">
            <!--begin::Form-->
            <form enctype="multipart/form-data" id="kt_ecommerce_settings_general_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('customer.my-profile.update') }}" method="POST">
                @csrf
                @method('POST')
                <!--begin::Input group-->
                <div class="mb-7">
                    <!--begin::Tags-->
                    <label class="fs-6 fw-semibold mb-3">
                        <span>آواتار</span>
                        <span class="ms-1" data-bs-toggle="tooltip">
																	<i class="ki-duotone ki-information fs-7">
																		<span class="path1"></span>
																		<span class="path2"></span>
																		<span class="path3"></span>
																	</i>
																</span>
                    </label>
                    <!--end::Tags-->
                    <!--begin::Image input wrapper-->
                    <div class="mt-1">
                        <!--begin::Image placeholder-->
                        <!--end::Image placeholder-->
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline image-input-placeholder image-input-empty image-input-empty" data-kt-image-input="true">
                            <!--begin::نمایش existing avatar-->
                            <div class="image-input-wrapper w-100px h-100px" style="background-image: url('{{ asset($customer->getFirstMediaUrl('avatar', 'thumb')) }}')"></div>
                            <!--end::نمایش existing avatar-->
                            <!--begin::-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="تعویض آواتار" data-bs-original-title="تعویض آواتار" data-kt-initialized="1">
                                <i class="ki-duotone ki-pencil fs-7">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <!--begin::Inputs-->
                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                <!--end::Inputs-->
                            </label>
                            <!--end::-->
                            <!--begin::انصراف-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="انصراف avatar" data-bs-original-title="انصراف avatar" data-kt-initialized="1">
																		<i class="ki-duotone ki-cross fs-2">
																			<span class="path1"></span>
																			<span class="path2"></span>
																		</i>
																	</span>
                            <!--end::انصراف-->
                            <!--begin::حذف-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="حذف آواتار" data-bs-original-title="حذف آواتار" data-kt-initialized="1">
																		<i class="ki-duotone ki-cross fs-2">
																			<span class="path1"></span>
																			<span class="path2"></span>
																		</i>
																	</span>
                            <!--end::حذف-->
                        </div>
                        <!--end::Image input-->
                    </div>
                    <!--end::Image input wrapper-->
                </div>
                <!--end::Input group-->
                <!--begin::Row-->
                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <!--begin::Tags-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>نام</span>
                            </label>
                            <!--end::Tags-->
                            <!--begin::Input-->
                            <input type="text" class="form-control " name="first_name" value="{{ $customer->first_name }}">
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Tags-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>نام خانوادگی</span>
                            </label>
                            <!--end::Tags-->
                            <!--begin::Input-->
                            <input type="text" class="form-control " name="last_name" value="{{ $customer->last_name }}">
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <!--begin::Tags-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>شماره</span>
                            </label>
                            <!--end::Tags-->
                            <!--begin::Input-->
                            <input type="text" class="form-control " name="phone_number" value="{{ $customer->phone_number }}">
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Tags-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>ایمیل</span>
                            </label>
                            <!--end::Tags-->
                            <!--begin::Input-->
                            <input type="text" class="form-control " name="email" value="{{ $customer->email }}">
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <!--begin::Tags-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>کد ملی</span>
                            </label>
                            <!--end::Tags-->
                            <!--begin::Input-->
                            <input type="text" class="form-control " name="national_code" value="{{ $customer->national_code }}">
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Tags-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span>تاریخ تولد</span>
                            </label>
                            <!--end::Tags-->
                            <!--begin::Input-->
                            <input value="@if(isset($customer) && $customer->birthdate) {{ Verta::instance($customer->birthdate)->format('Y/m/d') }} @endif" name="birthdate" class="form-control  persian-datepicker" placeholder="تاریخ"/>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="separator mb-6"></div>
                <h3>تغییر رمز عبور</h3><small class="text-danger">تنها در صورتی که قصد تغییر رمز عبور را دارید، این قسمت را پر نمایید.</small>
                <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <!--begin::Tags-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">رمز عبور کنونی</span>
                            </label>
                            <!--end::Tags-->
                            <!--begin::Input-->
                            <input type="password" autocomplete="off" class="form-control " name="current_password" value="">
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Tags-->
                            <label class="fs-6 fw-semibold form-label mt-3">
                                <span class="required">رمز عبور جدید</span>
                            </label>
                            <!--end::Tags-->
                            <!--begin::Input-->
                            <input type="password" autocomplete="off" class="form-control " name="new_password" value="">
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Col-->
                </div>

                <div class="separator mb-6"></div>
                <div class="d-flex justify-content-end">
                    <!--begin::Button-->
                    <a href="{{ route('customer.welcome') }}" class="btn btn-light me-3">انصراف</a>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                        <span class="indicator-label">ذخیره</span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::عملیات buttons-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::کارت body-->
    </div>
@endsection
