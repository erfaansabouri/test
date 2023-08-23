@extends('store-manager.master')
@section('page-title')
    مناسبت های تقویم
@endsection
@section('content')
    <div class="card">
        <div class="card-body py-4">
            <!--begin::Table-->
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover align-middle table-row-dashed fs-6 gy-5" >
                    <thead>
                    <tr class="text-center  fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-25px">ردیف</th>
                        <th class="min-w-125px">روز</th>
                        <th class="min-w-125px">مناسبت های رسمی</th>
                        <th class="min-w-125px">رویداد های من</th>
                    </tr>
                    </thead>
                    <tbody class=" fw-semibold">
                    @foreach($days as $day)
                        <tr class="text-center">
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ verta($day['date'])->format('Y-m-d') }}</td>
                            <td>{!! $day['official_calendar'] ? nl2br($day['official_calendar']->events) : "-" !!}</td>
                            <td>
                                {!! $day['store_calendar'] ? nl2br($day['store_calendar']->events) : "-" !!}
                                <br>
                                <a href="{{ route('store-manager.calendar.create-event', ['date' => $day['date']->format('Y-m-d')]) }}" class="btn btn-sm btn-light-success"><i class="fa fa-plus"></i> تعریف رویداد</a>
                            </td>

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
