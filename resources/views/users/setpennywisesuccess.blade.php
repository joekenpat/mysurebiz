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
            <h3 class="text-color-wheat add-funds"><i class="icon-lock"></i> Set Penny Wise</h3>
            <div class="form-group row">
                <div class="col-12 text-color-green text-center" style="line-height: 2em;">
                    <i class="fa fa-check-circle fa-lg font-weight-bold" style="font-size: 3em;"></i>
                    <p class="mt-3">Congratulations! You have set your daily Penny Wise.</p>
                    <p class="mt-3">You can now proceed to
                        <a style="white-space: nowrap;" class="my-button-green d-sm-inline-block" href={{route('addfunds')}}>
                            Pay Penny wise
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection