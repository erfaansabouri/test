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
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">لیست سوزاندن امتیاز ها</h1>
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
                                <form method="GET" action="{{ route('admin.burned-points.index') }}" class="d-flex align-items-center position-relative my-1">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input value="{{ request('search') }}" name="search" type="text"  class="form-control  w-250px ps-13" placeholder="جستجو" />
                                    <button type="submit" class="btn btn-primary">اعمال</button>

                                </form>
                                <!--end::جستجو-->
                            </div>
                        </div>
                        <div class="card-header border-0 pt-6">
                            <!--begin::کارت title-->
                            <div class="card-title">
                                <!--begin::جستجو-->

                                <!--end::جستجو-->
                            </div>
                            <!--begin::کارت title-->
                            <!--begin::کارت toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                    <!--begin::Add user-->
                                    <a href="{{ route('admin.burned-points.create') }}" class="btn btn-light-success">
                                        <i class="ki-duotone ki-plus fs-2"></i>سوزاندن امتیاز</a>
                                    <!--end::Add user-->
                                </div>

                            </div>
                            <!--end::کارت toolbar-->
                        </div>
                        <!--end::کارت header-->
                        <!--begin::کارت body-->
                        <div class="card-body py-4">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover align-middle table-row-dashed fs-6 gy-5" >
                                    <thead>
                                    <tr class="text-center  fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-25px">شناسه</th>
                                        <th class="min-w-125px">نام مشتری</th>
                                        <th class="min-w-125px">امتیاز سوخته</th>
                                        <th class="min-w-125px">تاریخ</th>
                                    </tr>
                                    </thead>
                                    <tbody class=" fw-semibold">
                                    @foreach($burned_points as $burned_point)
                                        <tr class="text-center">
                                            <td>{{ $burned_point->id }}</td>
                                            <td>
                                                {{ $burned_point->customer->full_name }}
                                            </td>
                                            <td>{{ number_format($burned_point->point) }}</td>
                                            <td>{{ verta($burned_point->created_at) }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                            {{ $burned_points->withQueryString()->links("pagination::bootstrap-4") }}
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
