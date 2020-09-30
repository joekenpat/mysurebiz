@extends('layouts.userstemplate')
@section('title', $course->title." | Complete")
@section('extraCss')
    <link rel="stylesheet" href="{{ asset('css/users/general.css') }}">
    <style>
        .view-course .prev-next{
            overflow: unset;
        }
    </style>
@endsection
@section('extraScript')
    <script src="{{ asset('js/users/finalproject.js') }}"></script>
@endsection
@section('sidebar')
    @include('layouts.lesson-sidebar')
@endsection


@section('content')
    <div class="view-course user-lesson">
        <h3>{{ $course->title }}</h3>
        @if($incomplete || !$courseAssignmentProgress)
            <div class="text-center text-danger font-weight-bold">This {{ $type }} cannot be completed at the moment!</div>
            <div class="text-danger text-center text-small">The following project/lessons are yet to be completed.</div>
            @if($incomplete)
              @foreach($incomplete as $value)
                  <div class="lesson-list">
                      <a href="{{ route('userslesson', ['id' => $value['id']]) }}">{{ $value['title'] }}</a>
                  </div>
              @endforeach
            @endif
            @if(!$courseAssignmentProgress)
                    <div class="lesson-list">
                        <a href="{{ route('finalproject', ['courseid' => $course->id]) }}">Final Project</a>
                    </div>
            @endif
      @else
          <div class="text-color-green text-center font-weight-bold m-3">Congratulations!!</div>
          <div class="text-color-green text-center m-3">You have completed this training successfully.</div>

          {{--<div class="submit text-center mb-2 prev-next my-3">--}}
              {{--<a href="{{ route('userscourses') }}" class="my-button-green py-1 px-3 mb-2 complete-course">Take Another Training</a>--}}
          {{--</div>--}}
            <div class="submit text-center mb-2 prev-next my-3">
                <a href="{{ route('usersdashboard') }}" class="my-button-green py-1 px-3 mb-2 complete-course">Back to Home</a>
            </div>
      @endif

  </div>
@endsection