@extends('customer.master')
@section('page-title')
قرعه کشی
@endsection
@section('content')
    <div class="card">
        <!--begin::کارت header-->
        <div class="card-header border-0 pt-6">
            <form  method="GET" action="{{ route('customer.lotteries.index') }}">
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
        <!--end::کارت header-->
        <!--begin::کارت body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover align-middle table-row-dashed fs-6 gy-5" >
                    <thead>
                    <tr class="text-center  fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-25px">شناسه</th>
                        <th class="min-w-25px">عنوان</th>
                        <th class="min-w-125px">توضیحات</th>
                        <th class="min-w-125px">ظرفیت ورود</th>
                        <th class="min-w-125px">امتیاز ورود</th>
                        <th class="min-w-125px">سطح مشتری هدف</th>
                        <th class="min-w-125px">بازه</th>
                        <th class="min-w-125px">تاریخ انجام</th>
                        <th class="min-w-125px">عملیات</th>
                    </tr>
                    </thead>
                    <tbody class="text-center fw-semibold">
                    @foreach($lotteries as $lottery)
                        <tr>
                            <td>{{ $lottery->id }}</td>
                            <td>{{ $lottery->title }}</td>
                            <td>{{ $lottery->description }}</td>
                            <td>{{ number_format($lottery->capacity) }}</td>
                            <td>{{ number_format($lottery->points) }}</td>
                            <td>{{ $lottery->storeLevel->level_name }}</td>
                            <td><span class="badge badge-success">{{ verta($lottery->started_at)->formatJalaliDate() }}</span> -> <span class="badge badge-danger">{{ verta($lottery->ended_at)->formatJalaliDate() }}</span></td>
                            <td>@if($lottery->winners_announced_at) <span class="badge badge-success">{{ verta($lottery->winners_announced_at)->formatJalaliDate() }}</span> @else --- @endif</td>
                            <td>
                                @if($lottery->winners_announced_at)
                                    <a href="{{ route('customer.lotteries.winners', $lottery->id) }}" class="btn btn-info">لیست برندگان</a>
                                @else
                                    <a href="{{ route('customer.lotteries.participate', $lottery->id) }}" class="btn btn-info">شرکت کردن</a>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!--end::Table-->
            {{ $lotteries->withQueryString()->links("pagination::bootstrap-4") }}
        </div>
        <!--end::کارت body-->
    </div>
@endsection
