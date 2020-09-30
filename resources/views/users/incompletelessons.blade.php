@extends('layouts.userstemplate')
@section('title', "Incomplete Lessons")
@section('extraCss')
    <link rel="stylesheet" href="{{ asset('css/users/general.css') }}">
@endsection
@section('extraScript')
    <script src="{{ asset('js/users/finalproject.js') }}"></script>
@endsection
@section('sidebar')
    @include('layouts.lesson-sidebar')
@endsection


@section('content')
    <div class="view-course user-lesson">
        @if(Session::has('courseTitle'))
        <h3>{{ Session::get('courseTitle') }}</h3>
            <div class="text-center text-danger font-weight-bold">This Lesson cannot be taken at the moment!</div>
            <div class="text-danger text-center text-small">The following previous lessons are yet to be completed.</div>
                @foreach(Session::get('previousLessons') as $value)
                    <div class="lesson-list">
                        <a href="{{ route('userslesson', ['id' => $value->id]) }}">{{ $value->title }}</a>
                    </div>
                @endforeach
        @endif

    </div>
@endsection