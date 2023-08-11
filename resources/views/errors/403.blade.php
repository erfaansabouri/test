@if(Auth::guard('admin')->check())
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
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">

                        </h1>
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
                    <!--begin::Hero card-->

                    <!--end::Hero card-->
                    <!--begin::درباره ی ما card-->
                    <div class="card mb-12">
                        <!--begin::Body-->
                        <div class="card-body ">
                            <!--begin::Content main-->
                            <div class="">
                                <!--begin::Heading-->
                                <div class="">
                                    <!--begin::Title-->
                                    <h1 class="fs-2x text-danger ">خطای دسترسی 403</h1>
                                    <!--end::Title-->
                                    <!--begin::Text-->
                                    <div class="fs-5  fw-semibold">
                                        متاسفیم! شما به محتوای این صفحه دسترسی ندارید :(
                                    </div>
                                    <!--end::Text-->
                                </div>
                            </div>
                            <!--end::Content main-->
                            <!--begin::کارت-->
                            <!--end::کارت-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::درباره ی ما card-->

                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
    @endsection
@endif
