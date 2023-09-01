<!DOCTYPE html>
<html lang="en">
<head>
    <title>ورود مشتری</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />


    <link rel="shortcut icon" href="{{ asset('global-assets/media/logos/favicon.jpg') }}" />

    <link href="{{ asset('global-assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('global-assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="app-blank">
<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>

<div class="d-flex flex-column flex-root" id="kt_app_root">
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <a href="#" class="d-block d-lg-none mx-auto py-20">
            <img alt="Logo" src="{{ asset('global-assets/media/logos/favicon.jpg') }}" class="theme-light-show h-25px" />
            <img alt="Logo" src="{{ asset('global-assets/media/logos/favicon.jpg') }}" class="theme-dark-show h-25px" />
        </a>

        <div class="d-flex flex-column flex-column-fluid flex-center w-lg-50 p-10">
            <!--begin::Wrapper-->
            <div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">
                <!--begin::Header-->
                <!--end::Header-->
                <!--begin::Body-->
                <div class="py-20">
                    <!--begin::Form-->
                    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="POST"  action="{{ route('customer.auth.login') }}">
                        @csrf
                        @method('POST')
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
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Heading-->
                            <div class="text-start mb-10">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3 fs-3x" data-kt-translate="ورود-title">ورود</h1>
                                <!--end::Title-->
                                <!--begin::Text-->
                                <div class="text-gray-400 fw-semibold fs-6" data-kt-translate="general-desc">
                                    ورود به پنل مشتری - باشگاه مشتریان
                                </div>
                                <!--end::Link-->
                            </div>
                            <!--begin::Heading-->
                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input value="{{ old('phone_number') }}" type="text" placeholder="شماره تماس" name="phone_number" autocomplete="off" class="form-control " />
                                <!--end::Email-->
                            </div>
                            <!--end::Input group=-->
                            <div class="fv-row mb-7">
                                <!--begin::کلمه عبور-->
                                <input type="password" placeholder="رمز عبور" name="password" autocomplete="off" class="form-control " />
                                <!--end::کلمه عبور-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-10">
                                <div></div>
                                <!--begin::Link-->
                                <a href="" class="link-primary">فراموشی رمز عبور</a>
                                <!--end::Link-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Actions-->
                            <div class="d-flex flex-stack">
                                <!--begin::ارسال-->
                                <button id="kt_sign_in_submit" class="btn btn-primary me-2 flex-shrink-0">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">ورود</span>
                                    <!--end::Indicator label-->
                                </button>
                                <!--end::ارسال-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--begin::Body-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Wrapper-->
        </div>

        <div class="d-none d-lg-flex flex-lg-row-fluid w-50 bgi-size-cover bgi-position-y-center bgi-position-x-start bgi-no-repeat" style="background-image: url({{ asset('global-assets/media/auth/bg11.png') }})"></div>
    </div>
</div>
</body>
</html>
