@extends('admin.master')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">لیست مشتری ها</h1>
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
                    <!--begin::کارت-->
                    <div class="card">
                        <!--begin::کارت header-->
                        <div class="card-header border-0 pt-6">
                            <!--begin::کارت title-->
                            <div class="card-title">
                                <!--begin::جستجو-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="جستجو" />
                                </div>
                                <!--end::جستجو-->
                            </div>
                            <!--begin::کارت title-->
                            <!--begin::کارت toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                    <!--begin::خروجی-->
                                    <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_کاربران">
                                        <i class="ki-duotone ki-exit-up fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>خروجی</button>
                                    <!--end::خروجی-->
                                    <!--begin::Add user-->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                                        <i class="ki-duotone ki-plus fs-2"></i>افزودن کاربر</button>
                                    <!--end::Add user-->
                                </div>
                                <!--end::Toolbar-->
                                <!--begin::گروه actions-->
                                <!--end::گروه actions-->
                                <!--begin::Modal - Adjust تعادل-->
                                <div class="modal fade" id="kt_modal_export_کاربران" tabindex="-1" aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header">
                                                <!--begin::Modal title-->
                                                <h2 class="fw-bold">خروجی کاربران</h2>
                                                <!--end::Modal title-->
                                                <!--begin::Close-->
                                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                                    <i class="ki-duotone ki-cross fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <!--end::Modal header-->
                                            <!--begin::Modal body-->
                                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                <!--begin::Form-->
                                                <form id="kt_modal_export_users_form" class="form" action="#">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-10">
                                                        <!--begin::Tags-->
                                                        <label class="fs-6 fw-semibold form-label mb-2">انتخاب سطح دسترسی:</label>
                                                        <!--end::Tags-->
                                                        <!--begin::Input-->
                                                        <select name="role" data-control="select2" data-placeholder="انتخاب نقش" data-hide-search="true" class="form-select form-select-solid fw-bold">
                                                            <option></option>
                                                            <option value="مدیریت">مدیریت</option>
                                                            <option value="تحلیلگر">تحلیلگر</option>
                                                            <option value="توسعه دهنده">توسعه دهنده</option>
                                                            <option value="پشتیبانی">پشتیبانی</option>
                                                            <option value="آزمایش">آزمایش</option>
                                                        </select>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-10">
                                                        <!--begin::Tags-->
                                                        <label class="required fs-6 fw-semibold form-label mb-2">انتخاب خروجی فرمت:</label>
                                                        <!--end::Tags-->
                                                        <!--begin::Input-->
                                                        <select name="format" data-control="select2" data-placeholder="انتخاب فرمت" data-hide-search="true" class="form-select form-select-solid fw-bold">
                                                            <option></option>
                                                            <option value="excel">Excel</option>
                                                            <option value="pdf">PDF</option>
                                                            <option value="cvs">CVS</option>
                                                            <option value="zip">ZIP</option>
                                                        </select>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Actions-->
                                                    <div class="text-center">
                                                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">لغو</button>
                                                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                                            <span class="indicator-label">ثبت</span>
                                                            <span class="indicator-progress">لطفا صبر کنید...
                                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                        </button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </form>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Modal body-->
                                        </div>
                                        <!--end::Modal content-->
                                    </div>
                                    <!--end::Modal dialog-->
                                </div>
                                <!--end::Modal - کارت جدید-->
                            </div>
                            <!--end::کارت toolbar-->
                        </div>
                        <!--end::کارت header-->
                        <!--begin::کارت body-->
                        <div class="card-body py-4">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_کاربران">
                                <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">کاربر</th>
                                    <th class="min-w-125px">سطح دسترسی</th>
                                    <th class="min-w-125px">اخرین ورود</th>
                                    <th class="min-w-125px">دو مرحله ای </th>
                                    <th class="min-w-125px">پیوستنed تاریخ</th>
                                    <th class="text-end min-w-100px">عملیات</th>
                                </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-semibold">
                                <tr>
                                    <td class="d-flex align-items-center">
                                        <!--begin:: آواتار -->
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="../../demo1/dist/apps/user-management/users/view.html">
                                                <div class="symbol-label">
                                                    <img src="assets/media/avatars/300-6.jpg" alt="مرادی نیا" class="w-100" />
                                                </div>
                                            </a>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::کاربر details-->
                                        <div class="d-flex flex-column">
                                            <a href="../../demo1/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">مرادی نیا</a>
                                            <span>smith@kpmg.com</span>
                                        </div>
                                        <!--begin::کاربر details-->
                                    </td>
                                    <td>مدیریت</td>
                                    <td>
                                        <div class="badge badge-light fw-bold">دیروز</div>
                                    </td>
                                    <td></td>
                                    <td>22 شهریور 2023, 11:05 am</td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">عملیات
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="../../demo1/dist/apps/user-management/users/view.html" class="menu-link px-3"></a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">حذف</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::کارت body-->
                    </div>
                    <!--end::کارت-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
    </div>
@endsection
