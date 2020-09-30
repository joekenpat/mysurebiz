@extends('layouts.template')
@section('title', 'Dashboard')
@section('extraScript')
    <script>
        var students = "{{ $status->where('role', "Student")->count() }}";
        var artisans = "{{ $status->where('role', "Artisan")->count() }}";
        var employees = "{{ $status->where('role', "Employee")->count() }}";
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="{{ asset('js/charts.js') }}"></script>
@endsection
@section('extraCss')
    <style>
        .content-wrapper {
            background: #f3f4f7;
        }
    </style>
@endsection
@section('content')
    {{--{{ dd($allCourses) }}--}}
    <div class="dashboard">
    <div class="row">
        <div class="piecharts col-12 col-md-6" id="userspiechart"></div>
        <div class="piecharts col-12 col-md-6 mt-3 mt-md-0">
            <div class="m-1 my-display-cards w-100 p-3">
                <h3 class="text-color-green">Total Users
                    <span class="float-right my-button-green">
                        {{ $status->count() }}
                    </span>
                </h3>
                <div class="w-100 mt-4">Active
                    <span class="float-right access-student">
                        {{ $status->where('status', 1)->count() }}
                    </span>
                </div>
                <div class="w-100 mt-3">Unverified
                    <span class="float-right access-artisan">
                        {{ $status->where('status', 0)->count() }}
                    </span>
                </div>
                <div class="w-100 mt-3">Disabled
                    <span class="float-right access-employee">
                        {{ $status->where('status', 2)->count() }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-4 mt-4">
            <div class="m-1 my-display-cards w-100 p-3">
                <h3 class="text-color-green">Total Trainings
                    <span class="float-right my-button-green">
                        {{ $allCourses->unique('course_id')->count() }}
                    </span>
                </h3>
                @foreach($businessCategories as $businessCategory)
                    <div class="w-100 mt-4">{{ ucfirst($businessCategory->name) }}
                        <span class="float-right {{ array_random(['access-student','access-artisan', 'access-employee']) }}">
                        {{ $allCourses->where('business_category_id', $businessCategory->id)->count() }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-4 mt-4">
            <div class="m-1 my-display-cards w-100 p-3 height-97">
                @php
                    $paymentSum = $payments->sum('amount');
                @endphp

            <h3 class="text-color-green">Total Keep <span class="float-right my-button-gray {{ (strlen($paymentSum) > 3)?"reduce-font":"" }}">
                    &#8358;{{ number_format($paymentSum) }}
                </span></h3>
            <div class="w-100 mt-4">Students <span class="float-right access-student">
                    &#8358;{{ number_format($payments->where('role', 1)->sum('amount')) }}
                </span></div>
            <div class="w-100 mt-3">Artisans <span class="float-right access-artisan">
                    &#8358;{{ number_format($payments->where('role', 2)->sum('amount')) }}
                </span></div>
            <div class="w-100 mt-3">Employees <span class="float-right access-employee">
                    &#8358;{{ number_format($payments->where('role', 3)->sum('amount')) }}
                </span></div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-4 mt-4">
            <div class="m-1 my-display-cards w-100 p-3">
                <h3 class="text-color-green">Library
                    <span class="float-right my-button-red">
                        {{ $allLibraries->unique('id')->count() }}
                    </span>
                </h3>
                @foreach($businessCategories as $businessCategory)
                    <div class="w-100 mt-4">{{ ucfirst($businessCategory->name) }}
                        <span class="float-right {{ array_random(['access-student','access-artisan', 'access-employee']) }}">
                            {{ $allLibraries->filter(function ($value) use ($businessCategory){
                            return $value->business_category_id == $businessCategory->id
                                    || $value->library_business_category_id == $businessCategory->id;
                        })->count() }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-4"></div>
    </div>
    </div>
@endsection