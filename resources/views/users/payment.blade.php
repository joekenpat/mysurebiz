@extends('layouts.userstemplate')
@section('title', 'Keep Penny Wise')
@section('extraCss')
    <link rel="stylesheet" href="{{ asset('css/users/general.css') }}">
@endsection
@section('extraScript')

@endsection

@section('sidebar')
    @include('layouts.sidebarcontents')
@endsection

@section('content')
    <div class="row pt-5">
        <div class="add-course-wrapper offset-md-2 col-12 col-md-8 pt-5 pl-4 pl-md-5 pr-4 pr-md-5 pb-2">
            <h3 class="text-color-wheat add-funds"><i class="icon-lock"></i> Keep Penny Wise</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="PaymentForm" method="Post" action="{{ route('pay') }}">
                @csrf
                {{--@if($isEmployeeFirst)--}}
                    {{--<div class="text-center text-color-link mb-1">--}}
                        {{--<small>Please specify {{ Auth::user()->employees()->first()->pennywise_percentage }}% of your salary</small>--}}
                    {{--</div>--}}
                {{--@endif--}}
                <div class="form-group row">
                    {{--<label for="inputPassword3" class="col-4 col-sm-5 col-form-label text-color-green font-weight-bold small-text-353">--}}
                        {{--Am<span class="d-none d-sm-inline">oun</span>t/{{ (Auth::user()->isEmployee())?"month":"day" }}--}}
                    {{--</label>--}}
                    <label for="inputPassword3" class="col-4 col-sm-5 col-form-label text-color-green font-weight-bold small-text-353">
                        Am<span class="d-none d-sm-inline">oun</span>t/day
                    </label>
                    <div class="col-8 col-sm-7">
                        <div class="text-color-green col-form-label">&#8358;{{ number_format($amount) }}</div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-4 col-sm-5 col-form-label text-color-green font-weight-bold small-text-353">Period</label>
                    <div class="col-8 col-sm-7 text-color-green">
                        <div class="row">
                            <div class="col-9 col-sm-8">
                                <input type="text" class="form-control d-inline-block" name="period" placeholder="e.g 30">
                            </div>
                            <div class="col-3 col-sm-4 pt-2">
                                <span class="smaller-text-353">days</span>
                            </div>
                        </div>
                        {{--<div class="d-inline-block text-color-green naira">&#8358;</div> <input type="text" class="form-control w-75 d-inline-block" name="amount" placeholder="e.g 5000">--}}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12 text-center text-color-link">
                        <input type="checkbox" name="isBonus" value="true"> Pay Penny Wise from referral bonus
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12 text-center">
                        <button class="btn btn-primary submit-addcourse small-text-353 payment-submit" type="submit" value="Pay Now!">
                            <i class="fa fa-plus-circle fa-lg"></i> Pay Penny wise!
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection