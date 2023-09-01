<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl" >
@include('customer.partials.head')
<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
@include('customer.partials.theme-mode-scripts')
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        @include('customer.partials.header')
        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
            @include('customer.partials.sidebar')
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <div id="kt_docs_toast_stack_container" class="toast-container position-fixed top-0 start-0 p-3 z-index-9"></div>
                {{--@yield('content')--}}
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                            <!--begin::Toolbar container-->
                            <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                    <!--begin::Title-->
                                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">@yield('page-title')</h1>
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
                            <div id="kt_app_content_container" class="app-container">
                                <!--begin::کارت-->
                               @yield('content')
                                <!--end::کارت-->
                            </div>
                            <!--end::Content container-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Content wrapper-->
                </div>
                {{--END YIELD--}}
                @include('customer.partials.footer')
            </div>
        </div>
    </div>
</div>
@include('customer.partials.scrolltop')
@include('customer.partials.scripts')
@stack('scripts')
</body>
</html>
