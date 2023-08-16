@extends('store-manager.master')
@section('page-title')
    ستاره ها
@endsection
@section('content')
    <div class="card">
        <!--begin::کارت header-->
        <div class="card-header border-0 pt-6">
            <form  method="GET" action="{{ route('store-manager.stars.index') }}">
                <div class="d-flex align-items-center position-relative my-2 row">
                    <div class="col my-2">
                        <div class="input-group ">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                            <input value="{{ request('search') }}" name="search" type="text" class="form-control" placeholder="جستجو" aria-label="جستجو" aria-describedby="basic-addon1">
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
                        <th class="min-w-125px">تعداد ستاره</th>
                        <th class="min-w-125px">رویداد</th>
                        <th class="min-w-125px">تاریخ</th>
                    </tr>
                    </thead>
                    <tbody class=" fw-semibold">
                    @foreach($stars as $star)
                        <tr class="text-center">
                            <td>{{ $star->id }}</td>
                            <td>
                                {{ $star->customer->first_name }} {{ $star->customer->last_name }}
                                <br>
                                <span class="badge badge-secondary">{{ $star->customer->phone_number }}</span>
                            </td>
                            <td>{{ number_format($star->stars) }}</td>
                            <td>{{ $star->type }}</td>
                            <td>{{ verta($star->created_at)->format('Y/m/d H:i') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!--end::Table-->
            {{ $stars->withQueryString()->links("pagination::bootstrap-4") }}
        </div>
        <!--end::کارت body-->
    </div>
@endsection
