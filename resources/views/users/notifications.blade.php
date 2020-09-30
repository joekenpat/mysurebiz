@extends('layouts.userstemplate')
@section('title', 'Notifications')
@section('extraCss')
    <link rel="stylesheet" href="{{ asset('css/users/general.css') }}">
@endsection
@section('extraScript')

@endsection

@section('sidebar')
    @include('layouts.sidebarcontents')
@endsection

@section('content')
    {{--{{ dd($unscoredAssignments) }}--}}
    <div class="notifications preview-list">
        <h3 class="text-center font-weight-bold text-color-green mt-2">Notifications <span class="access-artisan d-inline-block">{{ $totalNotifications }}</span></h3>
        @if(!$uniqueCourses->isEmpty())
            @foreach($uniqueCourses as $uniqueCourse)
                <div class="dropdown-divider"></div>
                <a href="{{ route('finalproject', ['id' => $uniqueCourse->course_id]) }}#Course-score-wrapper" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-success">
                            {{$allCourseScores->where('course_id', $uniqueCourse->course_id)
                            ->count()}}
                        </div>
                    </div>
                    <div class="preview-item-content">
                        <h6 class="preview-subject font-weight-medium text-dark">{{ $uniqueCourse->course_title }}</h6>
                        <p class="font-weight-light small-text">
                            Training
                        </p>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
            @endforeach
        @endif

        {{--Lesson Notifications--}}
        @if(!$uniqueLessons->isEmpty())
            @foreach($uniqueLessons as $uniqueLesson)
                <div class="dropdown-divider"></div>
                <a href="{{ route('userslesson', ['id' => $uniqueLesson->lesson_id]) }}#lesson-wrapper" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-success">
                            {{$allLessonScores->where('lesson_id', $uniqueLesson->lesson_id)
                            ->count()}}
                        </div>
                    </div>
                    <div class="preview-item-content">
                        <h6 class="preview-subject font-weight-medium text-dark">{{ $uniqueLesson->lesson_title }}</h6>
                        <p class="font-weight-light small-text">
                            Lesson
                        </p>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
            @endforeach
        @endif
        {{ $links }}
    </div>
@endsection