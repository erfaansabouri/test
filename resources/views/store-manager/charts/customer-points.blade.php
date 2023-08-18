@extends('store-manager.master')
@section('page-title')
    نمودار امتیاز های مشتریان
@endsection
@section('content')
    <div class="card">
        <!--begin::کارت header-->
        <div class="card-header border-0 pt-6">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1"> نمودار امتیاز های مشتریان</span>
                <span class=" fw-semibold fs-7"></span>
            </h3>
        </div>
        <div class="card-header border-0 pt-6">
            <form method="GET" action="{{ route('store-manager.charts.customer-points') }}">
                <div class="d-flex align-items-center position-relative my-2 row">
                    <div class="col">
                        <div class="input-group ">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                            <input value="{{ request('from_date') }}" name="from_date" class="form-control  persian-datepicker" placeholder="از تاریخ"/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group ">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                            <input value="{{ request('to_date') }}" name="to_date" class="form-control  persian-datepicker" placeholder="تا تاریخ"/>
                        </div>
                    </div>
                    <div class="col my-2">
                        <select id="customer-select2" name="customer_id" class="form-select " data-placeholder="فیلتر مشتری">
                            <option></option>
                            @if(request('customer_id') && $customer = \App\Models\Customer::find(request('customer_id')))
                                <option value="{{ request('customer_id') }}" selected>{{ $customer->id }}- {{ $customer->full_name }}</option>
                            @endif
                        </select>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">اعمال</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body py-4">
            <canvas id="chart" height="100"></canvas>
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
        const labels = @json((clone $result)->pluck('persian_date')->all());

        // Chart data
        const data = {
            labels: labels,
            datasets: [
                {
                    label: 'امتیاز',
                    data: @json((clone $result)->pluck('total_points')->all()),
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
