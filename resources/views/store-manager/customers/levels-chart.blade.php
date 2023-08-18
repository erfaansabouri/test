@extends('store-manager.master')
@section('page-title')
    نمودار سطوح مشتریان
@endsection
@section('content')
    <div class="card">
        <!--begin::کارت header-->
        <div class="card-header border-0 pt-6">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">نمودار سطوح مشتریان</span>
                <span class=" fw-semibold fs-7"></span>
            </h3>
        </div>

        <!--end::کارت header-->
        <!--begin::کارت body-->
        <div class="card-body py-4">
            <canvas id="chart" height="50"></canvas>
        </div>
        <!--end::کارت body-->
    </div>
@endsection

@push('scripts')
    <script>
        var ctx = document.getElementById('chart');

        // Define colors
        var primaryColor = KTUtil.getCssVariableValue('--kt-primary');
        var dangerColor = KTUtil.getCssVariableValue('--kt-danger');
        var successColor = KTUtil.getCssVariableValue('--kt-success');

        // Define fonts
        var fontFamily = KTUtil.getCssVariableValue('--bs-font-sans-serif');

        // Chart labels
        const labels = @json((clone $levels)->pluck('level_name')->all());

        // Chart data
        const data = {
            labels: labels,
            datasets: [
                {
                    label: 'تعداد مشتریان',
                    data: @json((clone $levels)->pluck('customers_count')->all()),
                    borderColor: '#36A2EB',
                    backgroundColor: '#9BD0F5',
                    fill: false,
                    borderWidth: 1,
                    axis: 'x',
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
                indexAxis: 'x',
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
