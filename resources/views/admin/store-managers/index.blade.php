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
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">لیست صاحبان کسب و کار ها</h1>
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
                            <form  method="GET" action="{{ route('admin.store-managers.index') }}">
                                <div class="d-flex align-items-center position-relative my-2 row">
                                    <div class="col-8">
                                        <div class="input-group ">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                                            <input value="{{ request('search') }}" name="search" type="text" class="form-control" placeholder="جستجو" aria-label="جستجو" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-primary">اعمال</button>
                                    </div>
                                </div>
                            </form>
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
                                    <a href="{{ route('admin.store-managers.create') }}" class="btn btn-light-success">
                                        <i class="ki-duotone ki-plus fs-2"></i>افزودن صاحب کسب و کار</a>
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
                                        <th class="min-w-125px">نام</th>
                                        <th class="min-w-125px">کسب و کار</th>
                                        <th class="min-w-125px">شماره تماس</th>
                                        <th class="min-w-125px">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody class=" fw-semibold">
                                    @foreach($store_managers as $store_manager)
                                        <tr class="text-center">
                                            <td>{{ $store_manager->id }}</td>
                                            <td>
                                                {{ $store_manager->first_name }} {{ $store_manager->last_name }}
                                                <br>
                                                @if($store_manager->is_disable)
                                                    <span class="badge badge-danger">حساب غیر فعال</span>
                                                @else
                                                    <span class="badge badge-success">حساب فعال</span>
                                                @endif
                                            </td>
                                            <td>{{ $store_manager->store->title }}</td>
                                            <td>{{ $store_manager->phone_number }}</td>
                                            <td>
                                                <a href="{{ route('admin.store-managers.edit', $store_manager->id) }}" class="btn btn-light-primary">ویرایش</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                            {{ $store_managers->withQueryString()->links("pagination::bootstrap-4") }}
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
