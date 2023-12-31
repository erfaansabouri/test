<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl" >
@include('admin.partials.head')
<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
@include('admin.partials.theme-mode-scripts')
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        @include('admin.partials.header')
        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
            @include('admin.partials.sidebar')
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <div id="kt_docs_toast_stack_container" class="toast-container position-fixed top-0 start-0 p-3 z-index-9"></div>
                @yield('content')
                @include('admin.partials.footer')
            </div>
        </div>
    </div>
</div>
@include('admin.partials.scrolltop')
@include('admin.partials.scripts')
@stack('scripts')
</body>
</html>
