@extends('layouts.userstemplate')
@section('title', "Payment Response")
@section('extraCss')
    <link rel="stylesheet" href="{{ asset('css/users/general.css') }}">
@endsection
@section('sidebar')
    @include('layouts.sidebarcontents')
@endsection

@section('content')
    <div class="view-course user-lesson">
        <h3>{{ Session::get('title') }}</h3>
        <div class="text-color-green text-center font-weight-bold m-3">Request Received</div>
        <div class="text-color-green text-center m-3">Your request has been received and is being processed. Kindly check your email shortly.</div>

        <div class="submit text-center mb-2 prev-next my-3">
            <a href="{{ route('ebooks') }}" class="my-button-green py-1 px-3 mb-2 complete-course">Buy another Ebook!</a>
        </div>
    </div>
@endsection