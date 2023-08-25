@extends('store-manager.master')
@section('page-title')
    شرکت کنندگان قرعه کشی {{ $lottery->title }}
@endsection
@section('content')
    <div class="card">
        <!--begin::کارت header-->

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
                <table class="table table-striped table-bordered table-hover align-middle table-row-dashed fs-6 gy-5" >
                    <thead>
                    <tr class="text-center  fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-25px">شناسه</th>
                        <th class="min-w-25px">نام</th>
                        <th class="min-w-125px">آیا برنده شده است؟</th>
                        <th class="min-w-125px">کد برنده</th>
                    </tr>
                    </thead>
                    <tbody class="text-center fw-semibold">
                    @foreach($lottery_participants as $lottery_participant)
                        <tr>
                            <td>{{ $lottery_participant->id }}</td>
                            <td>{{ $lottery_participant->customer->full_name }}</td>
                            <td>@if($lottery_participant->is_winner) <span class="badge badge-success">بله</span> @else <span class="badge badge-danger">خیر</span> @endif</td>
                            <td>{{ $lottery_participant->winner_code }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!--end::Table-->
            {{ $lottery_participants->withQueryString()->links("pagination::bootstrap-4") }}
        </div>
        <!--end::کارت body-->
    </div>
@endsection
