@extends('customer.master')
@section('page-title')
    سطح ها
@endsection
@section('content')
    <div class="card">
        <div class="card-header border-0 pt-6">
            <!--begin::کارت title-->
            <div class="card-title">
                <!--begin::جستجو-->

                <!--end::جستجو-->
            </div>
            <!--begin::کارت title-->
            <!--begin::کارت toolbar-->

            <!--end::کارت toolbar-->
        </div>
        <!--end::کارت header-->
        <!--begin::کارت body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle table-row-dashed fs-6 gy-5" >
                    <thead>
                    <tr class="text-center fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-125px">فروشگاه مربوطه</th>
                        <th class="min-w-125px">سطح من</th>
                    </tr>
                    </thead>
                    <tbody class=" fw-semibold">
                    @foreach($stores as $store)
                        <tr class="text-center">
                            <td>{{ $store->title }}</td>
                            <td>{{ $customer->getLevel($store) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!--end::Table-->
        </div>
        <!--end::کارت body-->
    </div>
@endsection
