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
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">نمودار مشتری - امتیاز</h1>
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
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">آمار امتیاز های کسب شده بر حسب مشتری ها</span>
                                <span class="text-muted fw-semibold fs-7"></span>
                            </h3>
                        </div>
                        <div class="card-header border-0 pt-6">
                            <form method="GET" action="{{ route('admin.charts.customer-point') }}">
                                <div class="d-flex align-items-center position-relative my-2 row">
                                    <div class="col">
                                        <div class="input-group input-group-solid">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                            <input value="{{ request('from_date') }}" name="from_date" class="form-control form-control-solid persian-datepicker" placeholder="از تاریخ"/>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group input-group-solid">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                            <input value="{{ request('to_date') }}" name="to_date" class="form-control form-control-solid persian-datepicker" placeholder="تا تاریخ"/>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">اعمال</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!--end::کارت header-->
                        <!--begin::کارت body-->
                        <div class="card-body py-4">
                            <canvas id="stores-chart" height="800"></canvas>
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

@push('scripts')
    <script>
        var ctx = document.getElementById('stores-chart');

        // Define colors
        var primaryColor = KTUtil.getCssVariableValue('--kt-primary');
        var dangerColor = KTUtil.getCssVariableValue('--kt-danger');
        var successColor = KTUtil.getCssVariableValue('--kt-success');

        // Define fonts
        var fontFamily = KTUtil.getCssVariableValue('--bs-font-sans-serif');

        // Chart labels
        const labels = @json((clone $customer_sums)->pluck('customer_full_name')->all());

        // Chart data
        const data = {
            labels: labels,
            datasets: [
                {
                    label: 'امتیاز',
                    data: @json((clone $customer_sums)->pluck('total_points')->all()),
                    borderColor: '#36A2EB',
                    backgroundColor: '#9BD0F5',
                    fill: false,
                    borderWidth: 1,
                    axis: 'y',
                }
            ]
        };





        // Chart config
        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        ticks: {
                            font: {
                                family: 'IRANSansWeb', // Set the IRANSansWeb font for the x-axis ticks
                            },
                        },
                    },
                },
                plugins: {
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            font: {
                                family: 'IRANSansWeb', // Set the IRANSansWeb font for the x-axis ticks
                            },
                        }
                    }
                },
                tooltip: {
                    titleFont: {
                        family: 'IRANSansWeb', // Set the IRANSansWeb font for the tooltip title
                    },
                    bodyFont: {
                        family: 'IRANSansWeb', // Set the IRANSansWeb font for the tooltip body
                    },
                },
                legend: {
                    labels: {
                        font: {
                            family: 'IRANSansWeb', // Set the Tahoma font for the legend
                        },
                    },
                },
                indexAxis: 'y',
                responsive: true,
                interaction: {
                    intersect: false,
                },
            },
            defaults:{
                global: {
                    defaultFont: 'IRANSansWeb'
                }
            }
        };

        // Init ChartJS -- for more info, please visit: https://www.chartjs.org/docs/latest/
        var myChart = new Chart(ctx, config);


    </script>
@endpush
