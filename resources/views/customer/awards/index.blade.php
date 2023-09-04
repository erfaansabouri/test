@extends('customer.master')
@section('page-title')
    جایزه ها
@endsection
@section('content')
    <div class="card">
        <!--begin::کارت header-->
        <div class="card-header border-0 pt-6">
            <form method="GET" action="{{ route('customer.awards.index') }}">
                <div class="d-flex align-items-center position-relative my-2 row">
                    <div class="col-8">
                        <div class="input-group ">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa fa-search"></i>
                            </span>
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

            <!--end::کارت toolbar-->
        </div>
        <!--end::کارت header-->
        <!--begin::کارت body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover align-middle table-row-dashed fs-6 gy-5">
                    <thead>
                    <tr class="text-center  fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-25px">شناسه</th>
                        <th class="min-w-25px">نوع</th>
                        <th class="min-w-125px">کد</th>
                        <th class="min-w-125px">فروشگاه</th>
                        <th class="min-w-125px">عنوان</th>
                        <th class="min-w-125px">توضیحات</th>
                        <th class="min-w-125px">امتیاز مورد نیاز</th>
                        <th class="min-w-125px">وضعیت</th>
                        <th class="min-w-125px">عملیات</th>
                    </tr>
                    </thead>
                    <tbody class="text-center fw-semibold">
                    @foreach($awards as $award)
                        <tr>
                            <td>{{ $award->id }}</td>
                            <td>{{ __($award->type) }}</td>
                            <td>{{ $award->code }}</td>
                            <td>{{ $award->store->title }}</td>
                            <td>{{ $award->title }}</td>
                            <td>{{ $award->description }}</td>
                            <td>{{ number_format($award->points) }}</td>
                            <td>
                                @if($award->customer && $award->customer->id == Auth::guard('customer')->id())
                                    خریداری شده توسط من
                                @endif
                                @if($award->customer && $award->customer->id != Auth::guard('customer')->id())
                                    غیر قابل خرید
                                @endif
                                @if(!$award->customer)
                                    قابل خرید
                                @endif
                            </td>
                            <td>
                                @if(!$award->customer)
                                    <a href="{{ route('customer.awards.buy', $award->id) }}" class="btn btn-primary">خرید</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!--end::Table-->
            {{ $awards->withQueryString()->links("pagination::bootstrap-4") }}
        </div>
        <!--end::کارت body-->
    </div>
@endsection
