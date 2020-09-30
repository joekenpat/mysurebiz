@extends('layouts.userstemplate')
@section('title', "Payment Report")
@section('extraCss')
    <link rel="stylesheet" href="{{ asset('css/users/general.css') }}">
@endsection
@section('extraScript')
    <script src="{{ asset('js/users/finalproject.js') }}"></script>
@endsection
@section('sidebar')
    @include('layouts.sidebarcontents')
@endsection


@section('content')
    @if(Session::has('message'))
        <div class="view-course user-lesson">
            <h3>{{ Session::get('title') }}</h3>
            @if(Session::get('message') !== "Successful")
                <div class="text-center text-danger font-weight-bold">An Error occured while processing your payment request.</div>
                <div class="text-danger text-center m-3">{{ Session::get('message') }}</div>

                <div class="submit text-center mb-2 prev-next my-3">
                    <a href="{{ route('addfunds') }}" class="my-button-green py-1 px-3 mb-2 complete-course">Try again!</a>
                </div>
            @else
                <div class="text-color-green text-center font-weight-bold m-3">Congratulations!!</div>
                <div class="text-color-green text-center m-3">You have successfully kept the sum of &#8358;{{ Session::get('amount')/100 }} in your wallet.</div>

                <div class="submit text-center mb-2 prev-next my-3">
                    <a href="{{ route('addfunds') }}" class="my-button-green py-1 px-3 mb-2 complete-course">Keep another Penny Wise!</a>
                </div>
            @endif

        </div>
    @endif
@endsection