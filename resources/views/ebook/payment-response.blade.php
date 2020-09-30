@extends('layouts.userstemplate')
@section('title', "Payment Response")
@section('extraCss')
    <link rel="stylesheet" href="{{ asset('css/users/general.css') }}">
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
                    <a href="{{ route('ebook-checkout', ["ebook_id" => Session::get('ebookId')]) }}" class="my-button-green py-1 px-3 mb-2 complete-course">Try again!</a>
                </div>
            @else
                <div class="text-color-green text-center font-weight-bold m-3">Congratulations!!</div>
                <div class="text-color-green text-center m-3">Your payment was successful. The ebook will be sent to your email address shortly.</div>

                <div class="submit text-center mb-2 prev-next my-3">
                    <a href="{{ route('ebooks') }}" class="my-button-green py-1 px-3 mb-2 complete-course">Buy another Ebook!</a>
                </div>
            @endif

        </div>
    @endif
@endsection