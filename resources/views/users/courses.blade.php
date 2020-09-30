@extends('layouts.userstemplate')
@section('title', 'Courses')
@section('extraCss')
    <link rel="stylesheet" href="{{ asset('css/users/general.css') }}">
@endsection
@section('extraScript')
@endsection
@section('extraClass', 'p-0 my-background-color')
@section('sidebar')
    @include('layouts.sidebarcontents')
@endsection

@section('content')
    <div class="courses-list w-100">
        <div class="row p-2 text-center">
            <div class="col-12 position-relative">
                <h4 class="mt-1">{{ $title }}</h4>
            </div>
        </div>

        <div class="row">
            {{--Course card--}}
            @each('users.partials.course-card', $courses, 'course', 'empty')
        </div>

    </div>
@endsection