@extends('customer.master')
@section('page-title')
    امتیاز ها
@endsection
@section('content')
    <div class="card">
        <div class="card-body py-4">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle table-row-dashed fs-6 gy-5" >
                    <tbody class=" fw-semibold">
                       <tr>
                           <th class="min-w-25px">جمع کل امتیاز های دریافتی</th>
                           <td class="min-w-25px">{{ number_format(Auth::guard('customer')->user()->totalReceivedPoints()) }}</td>
                       </tr>
                       <tr>
                           <th class="min-w-25px">جمع کل امتیاز های خرج شده</th>
                           <td class="min-w-25px">{{ number_format(Auth::guard('customer')->user()->totalConsumedPoints()) }}</td>
                       </tr>
                       <tr>
                           <th class="min-w-25px">جمع کل امتیاز های باقی مانده</th>
                           <td class="min-w-25px">{{ number_format(Auth::guard('customer')->user()->balance) }}</td>
                       </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>

    <div class="card">
        <!--begin::کارت header-->
        <div class="card-header border-0 pt-6">
            <form  method="GET" action="{{ route('customer.points.index') }}">
                <div class="d-flex align-items-center position-relative my-2 row">
                    <div class="col my-2">
                        <div class="input-group ">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                            <input value="{{ request('search') }}" name="search" type="text" class="form-control" placeholder="جستجو" aria-label="جستجو" aria-describedby="basic-addon1">
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center position-relative my-2 row">
                    <div class="col my-2">
                        <div class="input-group ">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                            <input value="{{ request('from_date') }}" name="from_date" class="form-control  persian-datepicker" placeholder="از تاریخ"/>
                        </div>
                    </div>
                    <div class="col my-2">
                        <div class="input-group ">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                            <input value="{{ request('to_date') }}" name="to_date" class="form-control  persian-datepicker" placeholder="تا تاریخ"/>
                        </div>
                    </div>
                    <div class="col my-2">
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
                        <th class="min-w-25px">شناسه</th>
                        <th class="min-w-125px">مشتری</th>
                        <th class="min-w-125px">نوع امتیاز</th>
                        <th class="min-w-125px">فروشگاه مربوطه</th>
                        <th class="min-w-125px">مبلغ</th>
                        <th class="min-w-125px">امتیاز</th>
                        <th class="min-w-125px">تاریخ</th>
                    </tr>
                    </thead>
                    <tbody class=" fw-semibold">
                    @foreach($points as $point)
                        <tr class="text-center">
                            <td>{{ $point->id }}</td>
                            <td>
                                {{ $point->customer->first_name }} {{ $point->customer->last_name }}
                                <br>
                                <span class="badge badge-secondary">{{ $point->customer->phone_number }}</span>
                            </td>
                            <td>
                                {{ $point->pointType->type_fa }}
                                @if($point->reason)
                                    <br>
                                    <small>({{ $point->reason }})</small>
                                @endif
                            </td>
                            <td>
                                @if($point->store)
                                    {{ $point->store->title }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>@if(is_numeric($point->price)) {{ number_format($point->price) }} @else - @endif</td>
                            <td>{{ number_format($point->point) }}</td>
                            <td>{{ verta($point->created_at)->format('Y/m/d H:i') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!--end::Table-->
            {{ $points->withQueryString()->links("pagination::bootstrap-4") }}
        </div>
        <!--end::کارت body-->
    </div>
@endsection
