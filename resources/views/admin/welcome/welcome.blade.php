@extends('admin.master')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">داشبورد فروشگاه</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::آیتم-->
                        <li class="breadcrumb-item text-muted">
                            <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">خانه</a>
                        </li>
                        <!--end::آیتم-->
                        <!--begin::آیتم-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::آیتم-->
                        <!--begin::آیتم-->
                        <li class="breadcrumb-item text-muted">داشبورد ها</li>
                        <!--end::آیتم-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Secondary button-->
                    <a href="../../demo1/dist/apps/ecommerce/sales/listing.html" class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary">مدیریت فروش</a>
                    <!--end::Secondary button-->
                    <!--begin::اصلی button-->
                    <a href="../../demo1/dist/apps/ecommerce/catalog/add-product.html" class="btn btn-sm fw-bold btn-primary">افزودن محصول</a>
                    <!--end::اصلی button-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Row-->
                <div class="row g-5 g-xl-10 mb-xl-10">
                    <!--begin::Col-->
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                        <!--begin::کارت widget 4-->
                        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::واحد پول-->
                                        <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">$</span>
                                        <!--end::واحد پول-->
                                        <!--begin::مقدار-->
                                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">69,700</span>
                                        <!--end::مقدار-->
                                        <!--begin::Badge-->
                                        <span class="badge badge-light-success fs-base">
                                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>2.2%</span>
                                        <!--end::Badge-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Subtitle-->
                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">درآمد مورد انتظار</span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::کارت body-->
                            <div class="card-body pt-2 pb-4 d-flex align-items-center">
                                <!--begin::Chart-->
                                <div class="d-flex flex-center me-5 pt-2">
                                    <div id="kt_card_widget_4_chart" style="min-width: 70px; min-height: 70px" data-kt-size="70" data-kt-line="11"></div>
                                </div>
                                <!--end::Chart-->
                                <!--begin::برچسبs-->
                                <div class="d-flex flex-column content-justify-center w-100">
                                    <!--begin::Tags-->
                                    <div class="d-flex fs-6 fw-semibold align-items-center">
                                        <!--begin::Bullet-->
                                        <div class="bullet w-8px h-6px rounded-2 bg-danger me-3"></div>
                                        <!--end::Bullet-->
                                        <!--begin::Tags-->
                                        <div class="text-gray-500 flex-grow-1 me-4">کفش ها</div>
                                        <!--end::Tags-->
                                        <!--begin::Stats-->
                                        <div class="fw-bolder text-gray-700 text-xxl-end">$7,660</div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Tags-->
                                    <!--begin::Tags-->
                                    <div class="d-flex fs-6 fw-semibold align-items-center my-3">
                                        <!--begin::Bullet-->
                                        <div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
                                        <!--end::Bullet-->
                                        <!--begin::Tags-->
                                        <div class="text-gray-500 flex-grow-1 me-4">بازی</div>
                                        <!--end::Tags-->
                                        <!--begin::Stats-->
                                        <div class="fw-bolder text-gray-700 text-xxl-end">$2,820</div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Tags-->
                                    <!--begin::Tags-->
                                    <div class="d-flex fs-6 fw-semibold align-items-center">
                                        <!--begin::Bullet-->
                                        <div class="bullet w-8px h-6px rounded-2 me-3" style="background-color: #E4E6EF"></div>
                                        <!--end::Bullet-->
                                        <!--begin::Tags-->
                                        <div class="text-gray-500 flex-grow-1 me-4">سایر</div>
                                        <!--end::Tags-->
                                        <!--begin::Stats-->
                                        <div class="fw-bolder text-gray-700 text-xxl-end">$45,257</div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Tags-->
                                </div>
                                <!--end::برچسبs-->
                            </div>
                            <!--end::کارت body-->
                        </div>
                        <!--end::کارت widget 4-->
                        <!--begin::کارت widget 5-->
                        <div class="card card-flush h-md-50 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::مقدار-->
                                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">1,836</span>
                                        <!--end::مقدار-->
                                        <!--begin::Badge-->
                                        <span class="badge badge-light-danger fs-base">
                                            <i class="ki-duotone ki-arrow-down fs-5 text-danger ms-n1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>2.2%</span>
                                        <!--end::Badge-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Subtitle-->
                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">سفارشات این ماه</span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::کارت body-->
                            <div class="card-body d-flex align-items-end pt-0">
                                <!--begin::پردازش-->
                                <div class="d-flex align-items-center flex-column mt-3 w-100">
                                    <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                        <span class="fw-bolder fs-6 text-dark">1048 تا هدف</span>
                                        <span class="fw-bold fs-6 text-gray-400">62%</span>
                                    </div>
                                    <div class="h-8px mx-3 w-100 bg-light-success rounded">
                                        <div class="bg-success rounded h-8px" role="progressbar" style="width: 62%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <!--end::پردازش-->
                            </div>
                            <!--end::کارت body-->
                        </div>
                        <!--end::کارت widget 5-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                        <!--begin::کارت widget 6-->
                        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::واحد پول-->
                                        <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">$</span>
                                        <!--end::واحد پول-->
                                        <!--begin::مقدار-->
                                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">2,420</span>
                                        <!--end::مقدار-->
                                        <!--begin::Badge-->
                                        <span class="badge badge-light-success fs-base">
                                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>2.6%</span>
                                        <!--end::Badge-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Subtitle-->
                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">میانگین فروش روزانه</span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::کارت body-->
                            <div class="card-body d-flex align-items-end px-0 pb-0">
                                <!--begin::Chart-->
                                <div id="kt_card_widget_6_chart" class="w-100" style="height: 80px"></div>
                                <!--end::Chart-->
                            </div>
                            <!--end::کارت body-->
                        </div>
                        <!--end::کارت widget 6-->
                        <!--begin::کارت widget 7-->
                        <div class="card card-flush h-md-50 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::مقدار-->
                                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">6.3k</span>
                                    <!--end::مقدار-->
                                    <!--begin::Subtitle-->
                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">مشتریان جدید این ماه</span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::کارت body-->
                            <div class="card-body d-flex flex-column justify-content-end pe-0">
                                <!--begin::Title-->
                                <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">قهرمانان امروز</span>
                                <!--end::Title-->
                                <!--begin::کاربران group-->
                                <div class="symbol-group symbol-hover flex-nowrap">
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="آرش کمری">
                                        <span class="symbol-label bg-warning text-inverse-warning fw-bold">A</span>
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="میکائیل احمدی">
                                        <img alt="Pic" src="assets/media/avatars/300-11.jpg" />
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="سوسن موسوی">
                                        <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="میلاد مرادی">
                                        <img alt="Pic" src="assets/media/avatars/300-2.jpg" />
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="حسینی">
                                        <span class="symbol-label bg-danger text-inverse-danger fw-bold">P</span>
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="بهروز ازادی">
                                        <img alt="Pic" src="assets/media/avatars/300-12.jpg" />
                                    </div>
                                    <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
                                        <span class="symbol-label bg-light text-gray-400 fs-8 fw-bold">+42</span>
                                    </a>
                                </div>
                                <!--end::کاربران group-->
                            </div>
                            <!--end::کارت body-->
                        </div>
                        <!--end::کارت widget 7-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-lg-12 col-xl-12 col-xxl-6 mb-5 mb-xl-0">
                        <!--begin::Chart widget 3-->
                        <div class="card card-flush overflow-hidden h-md-100">
                            <!--begin::Header-->
                            <div class="card-header py-5">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-dark">فروش این ماه ها</span>
                                    <span class="text-gray-400 mt-1 fw-semibold fs-6">کاربران از تمامی کانال ها</span>
                                </h3>
                                <!--end::Title-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Menu-->
                                    <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                        <i class="ki-duotone ki-dots-square fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </button>
                                    <!--begin::Menu 2-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">عملیات سریع</div>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator mb-3 opacity-75"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">تیکت جدید</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">جدید مشتری</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
                                            <!--begin::Menu item-->
                                            <a href="#" class="menu-link px-3">
                                                <span class="menu-title">گروه جدید</span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <!--end::Menu item-->
                                            <!--begin::Menu sub-->
                                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">گروه مدیر</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">گروه کارکنان</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">گروه عضوها</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu sub-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">مخاطبین جدید</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator mt-3 opacity-75"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content px-3 py-3">
                                                <a class="btn btn-primary btn-sm px-4" href="#">گزارش ایجاد کنید</a>
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu 2-->
                                    <!--end::Menu-->
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->
                            <!--begin::کارت body-->
                            <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                                <!--begin::امار-->
                                <div class="px-9 mb-5">
                                    <!--begin::امار-->
                                    <div class="d-flex mb-2">
                                        <span class="fs-4 fw-semibold text-gray-400 me-1">$</span>
                                        <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">14,094</span>
                                    </div>
                                    <!--end::امار-->
                                    <!--begin::توضیحات-->
                                    <span class="fs-6 fw-semibold text-gray-400">اهداف دیگر</span>
                                    <!--end::توضیحات-->
                                </div>
                                <!--end::امار-->
                                <!--begin::Chart-->
                                <div id="kt_charts_widget_3" class="min-h-auto ps-4 pe-6" style="height: 300px"></div>
                                <!--end::Chart-->
                            </div>
                            <!--end::کارت body-->
                        </div>
                        <!--end::Chart widget 3-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row gy-5 g-xl-10">
                    <!--begin::Col-->
                    <div class="col-xl-6 mb-xl-10">
                        <!--begin::Table widget 2-->
                        <div class="card h-md-100">
                            <!--begin::Header-->
                            <div class="card-header align-items-center border-0">
                                <!--begin::Title-->
                                <h3 class="fw-bold text-gray-900 m-0">سفارشات اخیر</h3>
                                <!--end::Title-->
                                <!--begin::Menu-->
                                <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                    <i class="ki-duotone ki-dots-square fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </button>
                                <!--begin::Menu 2-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">عملیات سریع</div>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator mb-3 opacity-75"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">تیکت جدید</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">جدید مشتری</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
                                        <!--begin::Menu item-->
                                        <a href="#" class="menu-link px-3">
                                            <span class="menu-title">گروه جدید</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <!--end::Menu item-->
                                        <!--begin::Menu sub-->
                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">گروه مدیر</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">گروه کارکنان</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">گروه عضوها</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu sub-->
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">مخاطبین جدید</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator mt-3 opacity-75"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content px-3 py-3">
                                            <a class="btn btn-primary btn-sm px-4" href="#">گزارش ایجاد کنید</a>
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu 2-->
                                <!--end::Menu-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-2">
                                <!--begin::Nav-->
                                <ul class="nav nav-pills nav-pills-custom mb-3">
                                    <!--begin::آیتم-->
                                    <li class="nav-item mb-3 me-3 me-lg-6">
                                        <!--begin::Link-->
                                        <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden active w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_2_tab_1">
                                            <!--begin::Icon-->
                                            <div class="nav-icon">
                                                <img alt="" src="assets/media/svg/products-categories/t-shirt.svg" class="" />
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Subtitle-->
                                            <span class="nav-text text-gray-700 fw-bold fs-6 lh-1">تی شرت</span>
                                            <!--end::Subtitle-->
                                            <!--begin::Bullet-->
                                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                            <!--end::Bullet-->
                                        </a>
                                        <!--end::Link-->
                                    </li>
                                    <!--end::آیتم-->
                                    <!--begin::آیتم-->
                                    <li class="nav-item mb-3 me-3 me-lg-6">
                                        <!--begin::Link-->
                                        <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_2_tab_2">
                                            <!--begin::Icon-->
                                            <div class="nav-icon">
                                                <img alt="" src="assets/media/svg/products-categories/gaming.svg" class="" />
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Subtitle-->
                                            <span class="nav-text text-gray-700 fw-bold fs-6 lh-1">بازی</span>
                                            <!--end::Subtitle-->
                                            <!--begin::Bullet-->
                                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                            <!--end::Bullet-->
                                        </a>
                                        <!--end::Link-->
                                    </li>
                                    <!--end::آیتم-->
                                    <!--begin::آیتم-->
                                    <li class="nav-item mb-3 me-3 me-lg-6">
                                        <!--begin::Link-->
                                        <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_2_tab_3">
                                            <!--begin::Icon-->
                                            <div class="nav-icon">
                                                <img alt="" src="assets/media/svg/products-categories/watch.svg" class="" />
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Subtitle-->
                                            <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">ساعت</span>
                                            <!--end::Subtitle-->
                                            <!--begin::Bullet-->
                                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                            <!--end::Bullet-->
                                        </a>
                                        <!--end::Link-->
                                    </li>
                                    <!--end::آیتم-->
                                    <!--begin::آیتم-->
                                    <li class="nav-item mb-3 me-3 me-lg-6">
                                        <!--begin::Link-->
                                        <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_2_tab_4">
                                            <!--begin::Icon-->
                                            <div class="nav-icon">
                                                <img alt="" src="assets/media/svg/products-categories/gloves.svg" class="nav-icon" />
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Subtitle-->
                                            <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">دستکش</span>
                                            <!--end::Subtitle-->
                                            <!--begin::Bullet-->
                                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                            <!--end::Bullet-->
                                        </a>
                                        <!--end::Link-->
                                    </li>
                                    <!--end::آیتم-->
                                    <!--begin::آیتم-->
                                    <li class="nav-item mb-3">
                                        <!--begin::Link-->
                                        <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_2_tab_5">
                                            <!--begin::Icon-->
                                            <div class="nav-icon">
                                                <img alt="" src="assets/media/svg/products-categories/shoes.svg" class="nav-icon" />
                                            </div>
                                            <!--end::Icon-->
                                            <!--begin::Subtitle-->
                                            <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">کفش ها</span>
                                            <!--end::Subtitle-->
                                            <!--begin::Bullet-->
                                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                            <!--end::Bullet-->
                                        </a>
                                        <!--end::Link-->
                                    </li>
                                    <!--end::آیتم-->
                                </ul>
                                <!--end::Nav-->
                                <!--begin::Tab Content-->
                                <div class="tab-content">
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade show active" id="kt_stats_widget_2_tab_1">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                                <!--begin::Table head-->
                                                <thead>
                                                <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                    <th class="ps-0 w-50px">مورد</th>
                                                    <th class="min-w-125px"></th>
                                                    <th class="text-end min-w-100px">مقدار</th>
                                                    <th class="pe-0 text-end min-w-100px">قیمت</th>
                                                    <th class="pe-0 text-end min-w-100px">قیمت کل</th>
                                                </tr>
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="assets/media/stock/ecommerce/210.gif" class="w-50px ms-n1" alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">فیل 1802</a>
                                                        <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">آیتم: #XDG-2347</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$72.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$126.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="assets/media/stock/ecommerce/215.gif" class="w-50px ms-n1" alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">لباس قرمز</a>
                                                        <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">آیتم: #XDG-1321</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$45.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$76.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="assets/media/stock/ecommerce/209.gif" class="w-50px ms-n1" alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">لباس</a>
                                                        <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">آیتم: #XDG-4312</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$84.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$168.00</span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table container-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade" id="kt_stats_widget_2_tab_2">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                                <!--begin::Table head-->
                                                <thead>
                                                <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                    <th class="ps-0 w-50px">مورد</th>
                                                    <th class="min-w-125px"></th>
                                                    <th class="text-end min-w-100px">مقدار</th>
                                                    <th class="pe-0 text-end min-w-100px">قیمت</th>
                                                    <th class="pe-0 text-end min-w-100px">قیمت کل</th>
                                                </tr>
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="assets/media/stock/ecommerce/197.gif" class="w-50px ms-n1" alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">فیل 1802</a>
                                                        <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">آیتم: #XDG-4312</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$32.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$312.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="assets/media/stock/ecommerce/178.gif" class="w-50px ms-n1" alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">لباس قرمز</a>
                                                        <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">آیتم: #XDG-3122</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$53.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$62.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="assets/media/stock/ecommerce/22.gif" class="w-50px ms-n1" alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">لباس</a>
                                                        <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">آیتم: #XDG-1142</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$74.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$139.00</span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table container-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade" id="kt_stats_widget_2_tab_3">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                                <!--begin::Table head-->
                                                <thead>
                                                <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                    <th class="ps-0 w-50px">مورد</th>
                                                    <th class="min-w-125px"></th>
                                                    <th class="text-end min-w-100px">مقدار</th>
                                                    <th class="pe-0 text-end min-w-100px">قیمت</th>
                                                    <th class="pe-0 text-end min-w-100px">قیمت کل</th>
                                                </tr>
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="assets/media/stock/ecommerce/1.gif" class="w-50px ms-n1" alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant 1324</a>
                                                        <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">آیتم: #XDG-1523</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$43.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$231.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="assets/media/stock/ecommerce/24.gif" class="w-50px ms-n1" alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">لباس قرمز</a>
                                                        <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">آیتم: #XDG-5314</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$71.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$53.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="assets/media/stock/ecommerce/71.gif" class="w-50px ms-n1" alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">لباس</a>
                                                        <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">آیتم: #XDG-4222</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$23.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$213.00</span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table container-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade" id="kt_stats_widget_2_tab_4">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                                <!--begin::Table head-->
                                                <thead>
                                                <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                    <th class="ps-0 w-50px">مورد</th>
                                                    <th class="min-w-125px"></th>
                                                    <th class="text-end min-w-100px">مقدار</th>
                                                    <th class="pe-0 text-end min-w-100px">قیمت</th>
                                                    <th class="pe-0 text-end min-w-100px">قیمت کل</th>
                                                </tr>
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="assets/media/stock/ecommerce/41.gif" class="w-50px ms-n1" alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant 2635</a>
                                                        <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">آیتم: #XDG-1523</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$65.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$163.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="assets/media/stock/ecommerce/63.gif" class="w-50px ms-n1" alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">لباس قرمز</a>
                                                        <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">آیتم: #XDG-2745</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$64.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$73.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="assets/media/stock/ecommerce/59.gif" class="w-50px ms-n1" alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">لباس</a>
                                                        <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">آیتم: #XDG-5173</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$54.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$173.00</span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table container-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade" id="kt_stats_widget_2_tab_5">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                                <!--begin::Table head-->
                                                <thead>
                                                <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                    <th class="ps-0 w-50px">مورد</th>
                                                    <th class="min-w-125px"></th>
                                                    <th class="text-end min-w-100px">مقدار</th>
                                                    <th class="pe-0 text-end min-w-100px">قیمت</th>
                                                    <th class="pe-0 text-end min-w-100px">قیمت کل</th>
                                                </tr>
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="assets/media/stock/ecommerce/10.gif" class="w-50px ms-n1" alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">نایک</a>
                                                        <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">آیتم: #XDG-2163</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$64.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$287.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="assets/media/stock/ecommerce/96.gif" class="w-50px ms-n1" alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">آدیداس</a>
                                                        <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">آیتم: #XDG-2162</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$76.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$51.00</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="assets/media/stock/ecommerce/13.gif" class="w-50px ms-n1" alt="" />
                                                    </td>
                                                    <td class="ps-0">
                                                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">پوما</a>
                                                        <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">آیتم: #XDG-1537</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$27.00</span>
                                                    </td>
                                                    <td class="text-end pe-0">
                                                        <span class="text-gray-800 fw-bold d-block fs-6">$167.00</span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table container-->
                                    </div>
                                    <!--end::Tap pane-->
                                </div>
                                <!--end::Tab Content-->
                            </div>
                            <!--end: کارت Body-->
                        </div>
                        <!--end::Table widget 2-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-6 mb-5 mb-xl-10">
                        <!--begin::Chart widget 4-->
                        <div class="card card-flush overflow-hidden h-md-100">
                            <!--begin::Header-->
                            <div class="card-header py-5">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-dark">فروش محصولات با تخفیف</span>
                                    <span class="text-gray-400 mt-1 fw-semibold fs-6">کاربران از تمامی کانال ها</span>
                                </h3>
                                <!--end::Title-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Menu-->
                                    <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                        <i class="ki-duotone ki-dots-square fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </button>
                                    <!--begin::Menu 2-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">عملیات سریع</div>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator mb-3 opacity-75"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">تیکت جدید</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">جدید مشتری</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
                                            <!--begin::Menu item-->
                                            <a href="#" class="menu-link px-3">
                                                <span class="menu-title">گروه جدید</span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <!--end::Menu item-->
                                            <!--begin::Menu sub-->
                                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">گروه مدیر</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">گروه کارکنان</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">گروه عضوها</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu sub-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">مخاطبین جدید</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator mt-3 opacity-75"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content px-3 py-3">
                                                <a class="btn btn-primary btn-sm px-4" href="#">گزارش ایجاد کنید</a>
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu 2-->
                                    <!--end::Menu-->
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->
                            <!--begin::کارت body-->
                            <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                                <!--begin::Info-->
                                <div class="px-9 mb-5">
                                    <!--begin::امار-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::واحد پول-->
                                        <span class="fs-4 fw-semibold text-gray-400 align-self-start me-1">$</span>
                                        <!--end::واحد پول-->
                                        <!--begin::Value-->
                                        <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">3,706</span>
                                        <!--end::Value-->
                                        <!--begin::Tags-->
                                        <span class="badge badge-light-success fs-base">
                                            <i class="ki-duotone ki-arrow-down fs-5 text-success ms-n1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>4.5%</span>
                                        <!--end::Tags-->
                                    </div>
                                    <!--end::امار-->
                                    <!--begin::توضیحات-->
                                    <span class="fs-6 fw-semibold text-gray-400">کل تخفیف فروش این ماه</span>
                                    <!--end::توضیحات-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Chart-->
                                <div id="kt_charts_widget_4" class="min-h-auto ps-4 pe-6" style="height: 300px"></div>
                                <!--end::Chart-->
                            </div>
                            <!--end::کارت body-->
                        </div>
                        <!--end::Chart widget 4-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row gy-5 g-xl-10">
                    <!--begin::Col-->
                    <div class="col-xl-4 mb-xl-10">
                        <!--begin::Engage widget 1-->
                        <div class="card h-md-100" dir="ltr">
                            <!--begin::Body-->
                            <div class="card-body d-flex flex-column flex-center">
                                <!--begin::Heading-->
                                <div class="mb-2">
                                    <!--begin::Title-->
                                    <h1 class="fw-semibold text-gray-800 text-center lh-lg">آیا سعی کرده ای
                                        <br />new
                                        <span class="fw-bolder">اپلیکیشن تجاری؟</span></h1>
                                    <!--end::Title-->
                                    <!--begin::Illustration-->
                                    <div class="py-10 text-center">
                                        <img src="assets/media/svg/illustrations/easy/2.svg" class="theme-light-show w-200px" alt="" />
                                        <img src="assets/media/svg/illustrations/easy/2-dark.svg" class="theme-dark-show w-200px" alt="" />
                                    </div>
                                    <!--end::Illustration-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Links-->
                                <div class="text-center mb-1">
                                    <!--begin::Link-->
                                    <a class="btn btn-sm btn-primary me-2" href="../../demo1/dist/apps/ecommerce/sales/listing.html">نمایش اپلیکیشن</a>
                                    <!--end::Link-->
                                    <!--begin::Link-->
                                    <a class="btn btn-sm btn-light" href="../../demo1/dist/apps/ecommerce/catalog/add-product.html">جدید محصولات</a>
                                    <!--end::Link-->
                                </div>
                                <!--end::Links-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Engage widget 1-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-8 mb-5 mb-xl-10">
                        <!--begin::Table Widget 4-->
                        <div class="card card-flush h-xl-100">
                            <!--begin::کارت header-->
                            <div class="card-header pt-7">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-800">محصولات سفارشات</span>
                                    <span class="text-gray-400 mt-1 fw-semibold fs-6">میانگین سفارشات روزانه</span>
                                </h3>
                                <!--end::Title-->
                                <!--begin::Actions-->
                                <div class="card-toolbar">
                                    <!--begin::فیلترها-->
                                    <div class="d-flex flex-stack flex-wrap gap-4">
                                        <!--begin::Destination-->
                                        <div class="d-flex align-items-center fw-bold">
                                            <!--begin::Tags-->
                                            <div class="text-gray-400 fs-7 me-2">دسته بندی</div>
                                            <!--end::Tags-->
                                            <!--begin::انتخاب-->
                                            <select class="form-select form-select-transparent text-graY-800 fs-base lh-1 fw-bold py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="انتخاب ">
                                                <option></option>
                                                <option value="مشاهده همه" selected="selected">مشاهده همه</option>
                                                <option value="a">دسته بندی A</option>
                                                <option value="b">دسته بندی A</option>
                                            </select>
                                            <!--end::انتخاب-->
                                        </div>
                                        <!--end::Destination-->
                                        <!--begin::وضعیت-->
                                        <div class="d-flex align-items-center fw-bold">
                                            <!--begin::Tags-->
                                            <div class="text-gray-400 fs-7 me-2">وضعیت</div>
                                            <!--end::Tags-->
                                            <!--begin::انتخاب-->
                                            <select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="انتخاب " data-kt-table-widget-4="filter_status">
                                                <option></option>
                                                <option value="مشاهده همه" selected="selected">مشاهده همه</option>
                                                <option value="ارسال شد">ارسال شد</option>
                                                <option value="تایید شده">تایید شده</option>
                                                <option value="رد شد">رد شد</option>
                                                <option value="در انتظار">در انتظار</option>
                                            </select>
                                            <!--end::انتخاب-->
                                        </div>
                                        <!--end::وضعیت-->
                                        <!--begin::جستجو-->
                                        <div class="position-relative my-1">
                                            <i class="ki-duotone ki-magnifier fs-2 position-absolute top-50 translate-middle-y ms-4">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <input type="text" data-kt-table-widget-4="search" class="form-control w-150px fs-7 ps-12" placeholder="جستجو" />
                                        </div>
                                        <!--end::جستجو-->
                                    </div>
                                    <!--begin::فیلترها-->
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::کارت header-->
                            <!--begin::کارت body-->
                            <div class="card-body pt-2">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_4_table">
                                    <!--begin::Table head-->
                                    <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-100px">شناسه سفارش</th>
                                        <th class="text-end min-w-100px">زمان ایجاد</th>
                                        <th class="text-end min-w-125px">مشتری</th>
                                        <th class="text-end min-w-100px">کل</th>
                                        <th class="text-end min-w-100px">سود</th>
                                        <th class="text-end min-w-50px">وضعیت</th>
                                        <th class="text-end"></th>
                                    </tr>
                                    <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-bold text-gray-600">
                                    <tr data-kt-table-widget-4="subtable_template" class="d-none">
                                        <td colspan="2">
                                            <div class="d-flex align-items-center gap-3">
                                                <a href="#" class="symbol symbol-50px bg-secondary bg-opacity-25 rounded">
                                                    <img src="" data-kt-src-path="assets/media/stock/ecommerce/" alt="" data-kt-table-widget-4="template_image" />
                                                </a>
                                                <div class="d-flex flex-column text-muted">
                                                    <a href="#" class="text-gray-800 text-hover-primary fw-bold" data-kt-table-widget-4="template_name">نام محصول</a>
                                                    <div class="fs-7" data-kt-table-widget-4="template_description">محصولات description</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <div class="text-gray-800 fs-7">Cost</div>
                                            <div class="text-muted fs-7 fw-bold" data-kt-table-widget-4="template_cost">1</div>
                                        </td>
                                        <td class="text-end">
                                            <div class="text-gray-800 fs-7">تعداد</div>
                                            <div class="text-muted fs-7 fw-bold" data-kt-table-widget-4="template_qty">1</div>
                                        </td>
                                        <td class="text-end">
                                            <div class="text-gray-800 fs-7">کل</div>
                                            <div class="text-muted fs-7 fw-bold" data-kt-table-widget-4="template_total">name</div>
                                        </td>
                                        <td class="text-end">
                                            <div class="text-gray-800 fs-7 me-3">On hو</div>
                                            <div class="text-muted fs-7 fw-bold" data-kt-table-widget-4="template_stock">32</div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary">#XGY-346</a>
                                        </td>
                                        <td class="text-end">7 دقیقه قبل</td>
                                        <td class="text-end">
                                            <a href="#" class="text-gray-600 text-hover-primary">آرش موحدی</a>
                                        </td>
                                        <td class="text-end">$630.00</td>
                                        <td class="text-end">
                                            <span class="text-gray-800 fw-bolder">$86.70</span>
                                        </td>
                                        <td class="text-end">
                                            <span class="badge py-3 px-4 fs-7 badge-light-warning">در انتظار</span>
                                        </td>
                                        <td class="text-end">
                                            <button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px" data-kt-table-widget-4="expو_row">
                                                <i class="ki-duotone ki-plus fs-4 m-0 toggle-off"></i>
                                                <i class="ki-duotone ki-minus fs-4 m-0 toggle-on"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary">#YHD-047</a>
                                        </td>
                                        <td class="text-end">52 دقیقه قبل</td>
                                        <td class="text-end">
                                            <a href="#" class="text-gray-600 text-hover-primary">ویلسون</a>
                                        </td>
                                        <td class="text-end">$25.00</td>
                                        <td class="text-end">
                                            <span class="text-gray-800 fw-bolder">$4.20</span>
                                        </td>
                                        <td class="text-end">
                                            <span class="badge py-3 px-4 fs-7 badge-light-primary">تایید شده</span>
                                        </td>
                                        <td class="text-end">
                                            <button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px" data-kt-table-widget-4="expو_row">
                                                <i class="ki-duotone ki-plus fs-4 m-0 toggle-off"></i>
                                                <i class="ki-duotone ki-minus fs-4 m-0 toggle-on"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary">#SRR-678</a>
                                        </td>
                                        <td class="text-end">1 ساعت قبل</td>
                                        <td class="text-end">
                                            <a href="#" class="text-gray-600 text-hover-primary">رابرت فاکس</a>
                                        </td>
                                        <td class="text-end">$1,630.00</td>
                                        <td class="text-end">
                                            <span class="text-gray-800 fw-bolder">$203.90</span>
                                        </td>
                                        <td class="text-end">
                                            <span class="badge py-3 px-4 fs-7 badge-light-warning">در انتظار</span>
                                        </td>
                                        <td class="text-end">
                                            <button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px" data-kt-table-widget-4="expو_row">
                                                <i class="ki-duotone ki-plus fs-4 m-0 toggle-off"></i>
                                                <i class="ki-duotone ki-minus fs-4 m-0 toggle-on"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary">#PXF-534</a>
                                        </td>
                                        <td class="text-end">3 ساعت قبل</td>
                                        <td class="text-end">
                                            <a href="#" class="text-gray-600 text-hover-primary">کامران</a>
                                        </td>
                                        <td class="text-end">$119.00</td>
                                        <td class="text-end">
                                            <span class="text-gray-800 fw-bolder">$12.00</span>
                                        </td>
                                        <td class="text-end">
                                            <span class="badge py-3 px-4 fs-7 badge-light-success">ارسال شد</span>
                                        </td>
                                        <td class="text-end">
                                            <button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px" data-kt-table-widget-4="expو_row">
                                                <i class="ki-duotone ki-plus fs-4 m-0 toggle-off"></i>
                                                <i class="ki-duotone ki-minus fs-4 m-0 toggle-on"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary">#XGD-249</a>
                                        </td>
                                        <td class="text-end">دو روز پیش</td>
                                        <td class="text-end">
                                            <a href="#" class="text-gray-600 text-hover-primary">عارف لرستانی</a>
                                        </td>
                                        <td class="text-end">$660.00</td>
                                        <td class="text-end">
                                            <span class="text-gray-800 fw-bolder">$52.26</span>
                                        </td>
                                        <td class="text-end">
                                            <span class="badge py-3 px-4 fs-7 badge-light-success">ارسال شد</span>
                                        </td>
                                        <td class="text-end">
                                            <button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px" data-kt-table-widget-4="expو_row">
                                                <i class="ki-duotone ki-plus fs-4 m-0 toggle-off"></i>
                                                <i class="ki-duotone ki-minus fs-4 m-0 toggle-on"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary">#SKP-035</a>
                                        </td>
                                        <td class="text-end">دو روز پیش</td>
                                        <td class="text-end">
                                            <a href="#" class="text-gray-600 text-hover-primary">الیاس صبوری</a>
                                        </td>
                                        <td class="text-end">$290.00</td>
                                        <td class="text-end">
                                            <span class="text-gray-800 fw-bolder">$29.00</span>
                                        </td>
                                        <td class="text-end">
                                            <span class="badge py-3 px-4 fs-7 badge-light-danger">رد شد</span>
                                        </td>
                                        <td class="text-end">
                                            <button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px" data-kt-table-widget-4="expو_row">
                                                <i class="ki-duotone ki-plus fs-4 m-0 toggle-off"></i>
                                                <i class="ki-duotone ki-minus fs-4 m-0 toggle-on"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary">#SKP-567</a>
                                        </td>
                                        <td class="text-end">7 دقیقه قبل</td>
                                        <td class="text-end">
                                            <a href="#" class="text-gray-600 text-hover-primary">علی کاربر</a>
                                        </td>
                                        <td class="text-end">$590.00</td>
                                        <td class="text-end">
                                            <span class="text-gray-800 fw-bolder">$50.00</span>
                                        </td>
                                        <td class="text-end">
                                            <span class="badge py-3 px-4 fs-7 badge-light-success">ارسال شد</span>
                                        </td>
                                        <td class="text-end">
                                            <button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px" data-kt-table-widget-4="expو_row">
                                                <i class="ki-duotone ki-plus fs-4 m-0 toggle-off"></i>
                                                <i class="ki-duotone ki-minus fs-4 m-0 toggle-on"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::کارت body-->
                        </div>
                        <!--end::Table Widget 4-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row gy-5 g-xl-10">
                    <!--begin::Col-->
                    <div class="col-xl-4">
                        <!--begin::لیست widget 5-->
                        <div class="card card-flush h-xl-100">
                            <!--begin::Header-->
                            <div class="card-header pt-7">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-dark">محصولات تحویل</span>
                                    <span class="text-gray-400 mt-1 fw-semibold fs-6">1 میلیون محصول تا کنون ارسال شده است</span>
                                </h3>
                                <!--end::Title-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="btn btn-sm btn-light">جزییات سفارش</a>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Scroll-->
                                <div class="hover-scroll-overlay-y pe-6 me-n6" style="height: 415px">
                                    <!--begin::آیتم-->
                                    <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                        <!--begin::Info-->
                                        <div class="d-flex flex-stack mb-3">
                                            <!--begin::Wrapper-->
                                            <div class="me-3">
                                                <!--begin::Icon-->
                                                <img src="assets/media/stock/ecommerce/210.gif" class="w-50px ms-n1 me-1" alt="" />
                                                <!--end::Icon-->
                                                <!--begin::Title-->
                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fw-bold">فیل 1802</a>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Actions-->
                                            <div class="m-0">
                                                <!--begin::Menu-->
                                                <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                                    <i class="ki-duotone ki-dots-square fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </button>
                                                <!--begin::Menu 2-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">عملیات سریع</div>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="separator mb-3 opacity-75"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">تیکت جدید</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">جدید مشتری</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
                                                        <!--begin::Menu item-->
                                                        <a href="#" class="menu-link px-3">
                                                            <span class="menu-title">گروه جدید</span>
                                                            <span class="menu-arrow"></span>
                                                        </a>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu sub-->
                                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">گروه مدیر</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">گروه کارکنان</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">گروه عضوها</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu sub-->
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">مخاطبین جدید</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="separator mt-3 opacity-75"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content px-3 py-3">
                                                            <a class="btn btn-primary btn-sm px-4" href="#">گزارش ایجاد کنید</a>
                                                        </div>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu 2-->
                                                <!--end::Menu-->
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::مشتری-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::نام-->
                                            <span class="text-gray-400 fw-bold">به:
                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bold">جیسون بورن</a></span>
                                            <!--end::نام-->
                                            <!--begin::Tags-->
                                            <span class="badge badge-light-success">سفارش داده شده</span>
                                            <!--end::Tags-->
                                        </div>
                                        <!--end::مشتری-->
                                    </div>
                                    <!--end::آیتم-->
                                    <!--begin::آیتم-->
                                    <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                        <!--begin::Info-->
                                        <div class="d-flex flex-stack mb-3">
                                            <!--begin::Wrapper-->
                                            <div class="me-3">
                                                <!--begin::Icon-->
                                                <img src="assets/media/stock/ecommerce/209.gif" class="w-50px ms-n1 me-1" alt="" />
                                                <!--end::Icon-->
                                                <!--begin::Title-->
                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fw-bold">لباس</a>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Actions-->
                                            <div class="m-0">
                                                <!--begin::Menu-->
                                                <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                                    <i class="ki-duotone ki-dots-square fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </button>
                                                <!--begin::Menu 2-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">عملیات سریع</div>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="separator mb-3 opacity-75"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">تیکت جدید</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">جدید مشتری</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
                                                        <!--begin::Menu item-->
                                                        <a href="#" class="menu-link px-3">
                                                            <span class="menu-title">گروه جدید</span>
                                                            <span class="menu-arrow"></span>
                                                        </a>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu sub-->
                                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">گروه مدیر</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">گروه کارکنان</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">گروه عضوها</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu sub-->
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">مخاطبین جدید</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="separator mt-3 opacity-75"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content px-3 py-3">
                                                            <a class="btn btn-primary btn-sm px-4" href="#">گزارش ایجاد کنید</a>
                                                        </div>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu 2-->
                                                <!--end::Menu-->
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::مشتری-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::نام-->
                                            <span class="text-gray-400 fw-bold">به:
                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bold">دورانت</a></span>
                                            <!--end::نام-->
                                            <!--begin::Tags-->
                                            <span class="badge badge-light-primary">حمل دریایی</span>
                                            <!--end::Tags-->
                                        </div>
                                        <!--end::مشتری-->
                                    </div>
                                    <!--end::آیتم-->
                                    <!--begin::آیتم-->
                                    <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                        <!--begin::Info-->
                                        <div class="d-flex flex-stack mb-3">
                                            <!--begin::Wrapper-->
                                            <div class="me-3">
                                                <!--begin::Icon-->
                                                <img src="assets/media/stock/ecommerce/214.gif" class="w-50px ms-n1 me-1" alt="" />
                                                <!--end::Icon-->
                                                <!--begin::Title-->
                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fw-bold">تی شرت زرد</a>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Actions-->
                                            <div class="m-0">
                                                <!--begin::Menu-->
                                                <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                                    <i class="ki-duotone ki-dots-square fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </button>
                                                <!--begin::Menu 2-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">عملیات سریع</div>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="separator mb-3 opacity-75"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">تیکت جدید</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">جدید مشتری</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
                                                        <!--begin::Menu item-->
                                                        <a href="#" class="menu-link px-3">
                                                            <span class="menu-title">گروه جدید</span>
                                                            <span class="menu-arrow"></span>
                                                        </a>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu sub-->
                                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">گروه مدیر</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">گروه کارکنان</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">گروه عضوها</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu sub-->
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">مخاطبین جدید</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="separator mt-3 opacity-75"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content px-3 py-3">
                                                            <a class="btn btn-primary btn-sm px-4" href="#">گزارش ایجاد کنید</a>
                                                        </div>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu 2-->
                                                <!--end::Menu-->
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::مشتری-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::نام-->
                                            <span class="text-gray-400 fw-bold">به:
                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bold">علی کاربر</a></span>
                                            <!--end::نام-->
                                            <!--begin::Tags-->
                                            <span class="badge badge-light-danger">تایید شده</span>
                                            <!--end::Tags-->
                                        </div>
                                        <!--end::مشتری-->
                                    </div>
                                    <!--end::آیتم-->
                                    <!--begin::آیتم-->
                                    <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                        <!--begin::Info-->
                                        <div class="d-flex flex-stack mb-3">
                                            <!--begin::Wrapper-->
                                            <div class="me-3">
                                                <!--begin::Icon-->
                                                <img src="assets/media/stock/ecommerce/211.gif" class="w-50px ms-n1 me-1" alt="" />
                                                <!--end::Icon-->
                                                <!--begin::Title-->
                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fw-bold">فیل 1802</a>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Actions-->
                                            <div class="m-0">
                                                <!--begin::Menu-->
                                                <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                                    <i class="ki-duotone ki-dots-square fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </button>
                                                <!--begin::Menu 2-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">عملیات سریع</div>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="separator mb-3 opacity-75"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">تیکت جدید</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">جدید مشتری</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
                                                        <!--begin::Menu item-->
                                                        <a href="#" class="menu-link px-3">
                                                            <span class="menu-title">گروه جدید</span>
                                                            <span class="menu-arrow"></span>
                                                        </a>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu sub-->
                                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">گروه مدیر</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">گروه کارکنان</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">گروه عضوها</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu sub-->
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">مخاطبین جدید</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="separator mt-3 opacity-75"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content px-3 py-3">
                                                            <a class="btn btn-primary btn-sm px-4" href="#">گزارش ایجاد کنید</a>
                                                        </div>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu 2-->
                                                <!--end::Menu-->
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::مشتری-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::نام-->
                                            <span class="text-gray-400 fw-bold">به:
                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bold">محمد ابراهیمی</a></span>
                                            <!--end::نام-->
                                            <!--begin::Tags-->
                                            <span class="badge badge-light-success">سفارش داده شده</span>
                                            <!--end::Tags-->
                                        </div>
                                        <!--end::مشتری-->
                                    </div>
                                    <!--end::آیتم-->
                                    <!--begin::آیتم-->
                                    <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                        <!--begin::Info-->
                                        <div class="d-flex flex-stack mb-3">
                                            <!--begin::Wrapper-->
                                            <div class="me-3">
                                                <!--begin::Icon-->
                                                <img src="assets/media/stock/ecommerce/215.gif" class="w-50px ms-n1 me-1" alt="" />
                                                <!--end::Icon-->
                                                <!--begin::Title-->
                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fw-bold">لباس</a>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Actions-->
                                            <div class="m-0">
                                                <!--begin::Menu-->
                                                <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                                    <i class="ki-duotone ki-dots-square fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </button>
                                                <!--begin::Menu 2-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">عملیات سریع</div>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="separator mb-3 opacity-75"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">تیکت جدید</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">جدید مشتری</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
                                                        <!--begin::Menu item-->
                                                        <a href="#" class="menu-link px-3">
                                                            <span class="menu-title">گروه جدید</span>
                                                            <span class="menu-arrow"></span>
                                                        </a>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu sub-->
                                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">گروه مدیر</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">گروه کارکنان</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">گروه عضوها</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu sub-->
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">مخاطبین جدید</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="separator mt-3 opacity-75"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content px-3 py-3">
                                                            <a class="btn btn-primary btn-sm px-4" href="#">گزارش ایجاد کنید</a>
                                                        </div>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu 2-->
                                                <!--end::Menu-->
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::مشتری-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::نام-->
                                            <span class="text-gray-400 fw-bold">به:
                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bold">محمد رضایی</a></span>
                                            <!--end::نام-->
                                            <!--begin::Tags-->
                                            <span class="badge badge-light-primary">حمل دریایی</span>
                                            <!--end::Tags-->
                                        </div>
                                        <!--end::مشتری-->
                                    </div>
                                    <!--end::آیتم-->
                                    <!--begin::آیتم-->
                                    <div class="border border-dashed border-gray-300 rounded px-7 py-3">
                                        <!--begin::Info-->
                                        <div class="d-flex flex-stack mb-3">
                                            <!--begin::Wrapper-->
                                            <div class="me-3">
                                                <!--begin::Icon-->
                                                <img src="assets/media/stock/ecommerce/192.gif" class="w-50px ms-n1 me-1" alt="" />
                                                <!--end::Icon-->
                                                <!--begin::Title-->
                                                <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fw-bold">تی شرت زرد</a>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Actions-->
                                            <div class="m-0">
                                                <!--begin::Menu-->
                                                <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                                    <i class="ki-duotone ki-dots-square fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </button>
                                                <!--begin::Menu 2-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">عملیات سریع</div>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="separator mb-3 opacity-75"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">تیکت جدید</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">جدید مشتری</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
                                                        <!--begin::Menu item-->
                                                        <a href="#" class="menu-link px-3">
                                                            <span class="menu-title">گروه جدید</span>
                                                            <span class="menu-arrow"></span>
                                                        </a>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu sub-->
                                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">گروه مدیر</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">گروه کارکنان</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">گروه عضوها</a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        </div>
                                                        <!--end::Menu sub-->
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">مخاطبین جدید</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="separator mt-3 opacity-75"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content px-3 py-3">
                                                            <a class="btn btn-primary btn-sm px-4" href="#">گزارش ایجاد کنید</a>
                                                        </div>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu 2-->
                                                <!--end::Menu-->
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::مشتری-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::نام-->
                                            <span class="text-gray-400 fw-bold">به:
                                                <a href="../../demo1/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bold">اتنا رضایی</a></span>
                                            <!--end::نام-->
                                            <!--begin::Tags-->
                                            <span class="badge badge-light-danger">تایید شده</span>
                                            <!--end::Tags-->
                                        </div>
                                        <!--end::مشتری-->
                                    </div>
                                    <!--end::آیتم-->
                                </div>
                                <!--end::Scroll-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::لیست widget 5-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-8">
                        <!--begin::Table Widget 5-->
                        <div class="card card-flush h-xl-100">
                            <!--begin::کارت header-->
                            <div class="card-header pt-7">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-dark">گزارش استوک</span>
                                    <span class="text-gray-400 mt-1 fw-semibold fs-6">کل 2,356 قلم موجود در انبار</span>
                                </h3>
                                <!--end::Title-->
                                <!--begin::Actions-->
                                <div class="card-toolbar">
                                    <!--begin::فیلترها-->
                                    <div class="d-flex flex-stack flex-wrap gap-4">
                                        <!--begin::Destination-->
                                        <div class="d-flex align-items-center fw-bold">
                                            <!--begin::Tags-->
                                            <div class="text-muted fs-7 me-2">دسته بندی</div>
                                            <!--end::Tags-->
                                            <!--begin::انتخاب-->
                                            <select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="انتخاب ">
                                                <option></option>
                                                <option value="مشاهده همه" selected="selected">مشاهده همه</option>
                                                <option value="a">دسته بندی A</option>
                                                <option value="b">دسته بندی B</option>
                                            </select>
                                            <!--end::انتخاب-->
                                        </div>
                                        <!--end::Destination-->
                                        <!--begin::وضعیت-->
                                        <div class="d-flex align-items-center fw-bold">
                                            <!--begin::Tags-->
                                            <div class="text-muted fs-7 me-2">وضعیت</div>
                                            <!--end::Tags-->
                                            <!--begin::انتخاب-->
                                            <select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="انتخاب " data-kt-table-widget-5="filter_status">
                                                <option></option>
                                                <option value="مشاهده همه" selected="selected">مشاهده همه</option>
                                                <option value="موجود">موجود</option>
                                                <option value="ناموجود">ناموجود</option>
                                                <option value="موجودی کم">موجودی کم</option>
                                            </select>
                                            <!--end::انتخاب-->
                                        </div>
                                        <!--end::وضعیت-->
                                        <!--begin::جستجو-->
                                        <a href="../../demo1/dist/apps/ecommerce/catalog/products.html" class="btn btn-light btn-sm">نمایش </a>
                                        <!--end::جستجو-->
                                    </div>
                                    <!--begin::فیلترها-->
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::کارت header-->
                            <!--begin::کارت body-->
                            <div class="card-body">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
                                    <!--begin::Table head-->
                                    <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-150px">آیتم</th>
                                        <th class="text-end pe-3 min-w-100px">محصولات شناسه</th>
                                        <th class="text-end pe-3 min-w-150px">تاریخ افزودن</th>
                                        <th class="text-end pe-3 min-w-100px">قیمت</th>
                                        <th class="text-end pe-3 min-w-100px">وضعیت</th>
                                        <th class="text-end pe-0 min-w-75px">تعداد</th>
                                    </tr>
                                    <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-bold text-gray-600">
                                    <tr>
                                        <!--begin::آیتم-->
                                        <td>
                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-dark text-hover-primary">Macbook Air M1</a>
                                        </td>
                                        <!--end::آیتم-->
                                        <!--begin::محصولات شناسه-->
                                        <td class="text-end">#XGY-356</td>
                                        <!--end::محصولات شناسه-->
                                        <!--begin::تاریخ added-->
                                        <td class="text-end">02 فروردین, 2023</td>
                                        <!--end::تاریخ added-->
                                        <!--begin::قیمت-->
                                        <td class="text-end">$1,230</td>
                                        <!--end::قیمت-->
                                        <!--begin::وضعیت-->
                                        <td class="text-end">
                                            <span class="badge py-3 px-4 fs-7 badge-light-primary">موجود</span>
                                        </td>
                                        <!--end::وضعیت-->
                                        <!--begin::تعداد-->
                                        <td class="text-end" data-order="58">
                                            <span class="text-dark fw-bold">58 مورد</span>
                                        </td>
                                        <!--end::تعداد-->
                                    </tr>
                                    <tr>
                                        <!--begin::آیتم-->
                                        <td>
                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-dark text-hover-primary">Surface Laptop 4</a>
                                        </td>
                                        <!--end::آیتم-->
                                        <!--begin::محصولات شناسه-->
                                        <td class="text-end">#YHD-047</td>
                                        <!--end::محصولات شناسه-->
                                        <!--begin::تاریخ added-->
                                        <td class="text-end">01 فروردین, 2023</td>
                                        <!--end::تاریخ added-->
                                        <!--begin::قیمت-->
                                        <td class="text-end">$1,060</td>
                                        <!--end::قیمت-->
                                        <!--begin::وضعیت-->
                                        <td class="text-end">
                                            <span class="badge py-3 px-4 fs-7 badge-light-danger">ناموجود</span>
                                        </td>
                                        <!--end::وضعیت-->
                                        <!--begin::تعداد-->
                                        <td class="text-end" data-order="0">
                                            <span class="text-dark fw-bold">0 مورد</span>
                                        </td>
                                        <!--end::تعداد-->
                                    </tr>
                                    <tr>
                                        <!--begin::آیتم-->
                                        <td>
                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-dark text-hover-primary">Logitech MX 250</a>
                                        </td>
                                        <!--end::آیتم-->
                                        <!--begin::محصولات شناسه-->
                                        <td class="text-end">#SRR-678</td>
                                        <!--end::محصولات شناسه-->
                                        <!--begin::تاریخ added-->
                                        <td class="text-end">24 اسفند, 2023</td>
                                        <!--end::تاریخ added-->
                                        <!--begin::قیمت-->
                                        <td class="text-end">$64</td>
                                        <!--end::قیمت-->
                                        <!--begin::وضعیت-->
                                        <td class="text-end">
                                            <span class="badge py-3 px-4 fs-7 badge-light-primary">موجود</span>
                                        </td>
                                        <!--end::وضعیت-->
                                        <!--begin::تعداد-->
                                        <td class="text-end" data-order="290">
                                            <span class="text-dark fw-bold">290 مورد</span>
                                        </td>
                                        <!--end::تعداد-->
                                    </tr>
                                    <tr>
                                        <!--begin::آیتم-->
                                        <td>
                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-dark text-hover-primary">AudioEngine HD3</a>
                                        </td>
                                        <!--end::آیتم-->
                                        <!--begin::محصولات شناسه-->
                                        <td class="text-end">#PXF-578</td>
                                        <!--end::محصولات شناسه-->
                                        <!--begin::تاریخ added-->
                                        <td class="text-end">24 اسفند, 2023</td>
                                        <!--end::تاریخ added-->
                                        <!--begin::قیمت-->
                                        <td class="text-end">$1,060</td>
                                        <!--end::قیمت-->
                                        <!--begin::وضعیت-->
                                        <td class="text-end">
                                            <span class="badge py-3 px-4 fs-7 badge-light-danger">ناموجود</span>
                                        </td>
                                        <!--end::وضعیت-->
                                        <!--begin::تعداد-->
                                        <td class="text-end" data-order="46">
                                            <span class="text-dark fw-bold">46 مورد</span>
                                        </td>
                                        <!--end::تعداد-->
                                    </tr>
                                    <tr>
                                        <!--begin::آیتم-->
                                        <td>
                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-dark text-hover-primary">HP Hyper LTR</a>
                                        </td>
                                        <!--end::آیتم-->
                                        <!--begin::محصولات شناسه-->
                                        <td class="text-end">#PXF-778</td>
                                        <!--end::محصولات شناسه-->
                                        <!--begin::تاریخ added-->
                                        <td class="text-end">16 دی, 2023</td>
                                        <!--end::تاریخ added-->
                                        <!--begin::قیمت-->
                                        <td class="text-end">$4500</td>
                                        <!--end::قیمت-->
                                        <!--begin::وضعیت-->
                                        <td class="text-end">
                                            <span class="badge py-3 px-4 fs-7 badge-light-primary">موجود</span>
                                        </td>
                                        <!--end::وضعیت-->
                                        <!--begin::تعداد-->
                                        <td class="text-end" data-order="78">
                                            <span class="text-dark fw-bold">78 مورد</span>
                                        </td>
                                        <!--end::تعداد-->
                                    </tr>
                                    <tr>
                                        <!--begin::آیتم-->
                                        <td>
                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-dark text-hover-primary">Dell 32</a>
                                        </td>
                                        <!--end::آیتم-->
                                        <!--begin::محصولات شناسه-->
                                        <td class="text-end">#XGY-356</td>
                                        <!--end::محصولات شناسه-->
                                        <!--begin::تاریخ added-->
                                        <td class="text-end">22 آذر, 2023</td>
                                        <!--end::تاریخ added-->
                                        <!--begin::قیمت-->
                                        <td class="text-end">$1,060</td>
                                        <!--end::قیمت-->
                                        <!--begin::وضعیت-->
                                        <td class="text-end">
                                            <span class="badge py-3 px-4 fs-7 badge-light-warning">موجودی کم</span>
                                        </td>
                                        <!--end::وضعیت-->
                                        <!--begin::تعداد-->
                                        <td class="text-end" data-order="8">
                                            <span class="text-dark fw-bold">8 مورد</span>
                                        </td>
                                        <!--end::تعداد-->
                                    </tr>
                                    <tr>
                                        <!--begin::آیتم-->
                                        <td>
                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="text-dark text-hover-primary"> Pixel 6 </a>
                                        </td>
                                        <!--end::آیتم-->
                                        <!--begin::محصولات شناسه-->
                                        <td class="text-end">#XVR-425</td>
                                        <!--end::محصولات شناسه-->
                                        <!--begin::تاریخ added-->
                                        <td class="text-end">27 آذر, 2023</td>
                                        <!--end::تاریخ added-->
                                        <!--begin::قیمت-->
                                        <td class="text-end">$1,060</td>
                                        <!--end::قیمت-->
                                        <!--begin::وضعیت-->
                                        <td class="text-end">
                                            <span class="badge py-3 px-4 fs-7 badge-light-primary">موجود</span>
                                        </td>
                                        <!--end::وضعیت-->
                                        <!--begin::تعداد-->
                                        <td class="text-end" data-order="124">
                                            <span class="text-dark fw-bold">124 مورد</span>
                                        </td>
                                        <!--end::تعداد-->
                                    </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::کارت body-->
                        </div>
                        <!--end::Table Widget 5-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
@endsection
