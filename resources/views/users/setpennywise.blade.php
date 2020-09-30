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

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="PaymentForm" method="Post" action="{{ route('setpennywise') }}">
                @csrf
                <div class="form-group row">
                    @include('front-end.partials.Pennywise', [
                    'extraClass' => 'text-color-green font-weight-bold small-text-353',
                    'mainWrapper' => 'col-12'
                    ])
                </div>
                <div class="form-group row">
                    <div class="col-12 text-center">
                        <button class="btn btn-primary submit-addcourse small-text-353 payment-submit" type="submit" value="Pay Now!">
                            Submit <i class="fa fa-arrow-right fa-lg"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection