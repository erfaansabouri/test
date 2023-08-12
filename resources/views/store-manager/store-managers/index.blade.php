@extends('store-manager.master')
@section('page-title')
    کارمندان
@endsection
@section('content')
    <div class="card">
        <!--begin::کارت header-->
        <div class="card-header border-0 pt-6">
            <form  method="GET" action="{{ route('store-manager.store-managers.index') }}">
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
        <div class="card-header border-0 pt-6">
            <!--begin::کارت title-->
            <div class="card-title">
                <!--begin::جستجو-->

                <!--end::جستجو-->
            </div>
            <!--begin::کارت title-->
            <!--begin::کارت toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--begin::Add user-->
                    <a href="{{ route('store-manager.store-managers.create') }}" class="btn btn-light-success">
                        <i class="ki-duotone ki-plus fs-2"></i>افزودن کارمند</a>
                    <!--end::Add user-->
                </div>

            </div>
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
                        <th class="min-w-25px">آواتار</th>
                        <th class="min-w-125px">نام</th>
                        <th class="min-w-125px">کسب و کار</th>
                        <th class="min-w-125px">شماره تماس</th>
                        <th class="min-w-125px">دسترسی</th>
                        <th class="min-w-125px">عملیات</th>
                    </tr>
                    </thead>
                    <tbody class=" fw-semibold">
                    @foreach($store_managers as $store_manager)
                        <tr class="text-center">
                            <td>{{ $store_manager->id }}</td>
                            <td>
                                <div class="symbol symbol-40px symbol-50px">
                                    <img alt="Pic" src="{{ $store_manager->getFirstMediaUrl('avatar', 'thumb') }}">
                                </div>
                            </td>
                            <td>
                                {{ $store_manager->first_name }} {{ $store_manager->last_name }}
                                <br>
                                @if($store_manager->is_disable)
                                    <span class="badge badge-danger">حساب غیر فعال</span>
                                @else
                                    <span class="badge badge-success">حساب فعال</span>
                                @endif
                            </td>
                            <td>{{ $store_manager->store->title }}</td>
                            <td>{{ $store_manager->phone_number }}</td>
                            <td>
                                @if($store_manager->is_super_manager)
                                    <span class="badge badge-success">مدیر کل</span>
                                @else
                                    @foreach($store_manager->permissions()->get() as $permission)
                                        <span class="badge badge-info">{{ $permission->name }}</span>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('store-manager.store-managers.edit', $store_manager->id) }}" class="btn btn-light-primary">ویرایش</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!--end::Table-->
            {{ $store_managers->withQueryString()->links("pagination::bootstrap-4") }}
        </div>
        <!--end::کارت body-->
    </div>
@endsection
