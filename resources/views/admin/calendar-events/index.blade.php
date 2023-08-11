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
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">مناسبت های تقویم</h1>
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
                        <div class="card-body py-4">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover align-middle table-row-dashed fs-6 gy-5" >
                                    <thead>
                                    <tr class="text-center  fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-25px">ردیف</th>
                                        <th class="min-w-125px">روز</th>
                                        <th class="min-w-125px">مناسبت ها</th>
                                        <th class="min-w-125px">تعطیل رسمی</th>
                                    </tr>
                                    </thead>
                                    <tbody class=" fw-semibold">
                                    @foreach($days as $day)
                                        <tr>
                                            <td>{{ $loop->index }}</td>
                                            <td>{{ $day['day'] }}</td>
                                            <td>
                                                @foreach($day['calendar']->events as $event)
                                                    {{ $event->description }}
                                                    <br>
                                                    <br>
                                                @endforeach
                                            </td>
                                            <td>
                                                @if($day['calendar']->is_holiday)
                                                    <span class="text-success">بله</span>
                                                @else
                                                    <span class="text-secondary">خیر</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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
