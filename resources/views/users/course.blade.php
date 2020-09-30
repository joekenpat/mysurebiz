@extends('layouts.userstemplate')
@section('title', $course->title)
@section('extraCss')
    <link rel="stylesheet" href="{{ asset('css/users/general.css') }}">
    <style>
        a:not([href]):not([tabindex]):hover{
            color: green;
        }
    </style>
@endsection
@section('extraScript')
@endsection

@section('sidebar')
    @if($userAlreadyTakingCourse || $start)
        @include('layouts.lesson-sidebar')
    @else
        @include('layouts.sidebarcontents')
    @endif
@endsection

@section('content')
    @if(Session::has('message'))
        <div class="alert {{ Session::get('alert-class', 'alert-success') }}">
            <ul>
                <li>{{ Session::get('message') }}</li>
            </ul>
        </div>
    @endif

{{--{{dd($subscribedCourses)}}--}}
    <div class="view-course">
        <h3>{{ $course->title }}</h3>
        <div class="course-info row mt-1 mt-sm-3">
            <div class="col-12 col-sm-4">
                <span>Category:</span>
                <label class="text-color-green">{{ $course->category }}</label>
            </div>
            <div class="col-12 col-sm-4 text-sm-center">
            </div>
            <div class="col-12 col-sm-4 text-sm-right mt-2 mt-sm-0"><span>Duration:</span>
                <label class="text-color-green">{{ $course->duration != "" ? $course->duration : "N/A" }}</label>
            </div>
        </div>
        <div class="course-image-cover text-center mt-3 mb-3 course-video mx-auto">
            <img class="img-fluid" src="/storage/{{ $course->cover_image }}" alt="">
        </div>

        @if($course->note)
            <div class="course-note">
                <h4 class="text-center">Introductory  Note</h4>
                {!! nl2br(e($course->note)) !!}
            </div>
        @endif

        @if($course->video)
            <div class="mt-4">
                <div class="embed-responsive embed-responsive-16by9 course-video mx-auto">
                    <iframe class="embed-responsive-item" src="{{ $course->video }}" allowfullscreen></iframe>
                </div>
            </div>
        @endif

        @if(!$lessons->isEmpty() && !$start)
            <div class="lessons">
                <h4>Lessons</h4>
                    @forelse($lessons as $lesson)
                    <div class="lesson-list">
                        @if($userAlreadyTakingCourse)
                            <a
                                @if($lesson->eligible)
                                    href="{{ route('userslesson', ['id' => $lesson->id]) }}"
                                @else
                                    title="This lesson is not yet available."
                                @endif
                            >{{ $lesson->title }}</a>
                        @else
                            <p class="text-center text-color-green mb-0">{{ $lesson->title }}</p>
                        @endif
                    </div>
                    @empty
                        <div class="text-center">No Lessons yet!</div>
                    @endforelse
            </div>
        @endif

        @if(!$libraries->isEmpty() && ($userAlreadyTakingCourse || $start))
            <div class="documents text-center">
                <h4>Training Materials</h4>
                @forelse($libraries as $library)
                    <div class="course-material mt-2 d-inline-block p-1">
                        <a href="{{ route('libraryfile', ['any' => $library->file]) }}" download>
                            <i class="icon-doc" data-toggle="tooltip" data-placement="top" title="delete file"></i>
                            {{ explode('/', $library->file)[1]  }} <small class="text-muted">{{ $library->file_size }}</small></a>
                    </div>
                    <br>
                @empty
                @endforelse
            </div>
        @endif
        <div class="submit text-center text-sm-right my-4">
            @if($userAlreadyTakingCourse || $start)
                @if(!$lessons->isEmpty())
                    <a href="{{ route('userslesson', ['id' => $lessons[0]->id]) }}" class="my-button-gray py-1 pl-3 pr-2 mb-2 float-right">Next<i class="icon-arrow-right"></i></a>
                @elseif($course->assignment_note || $course->assignment_doc)
                    <a href="{{ route('finalproject', ['courseid' => $course->id]) }}" class="my-button-gray py-1 pl-3 pr-2 mb-2 float-right">Final Project <i class="icon-arrow-right"></i></a>
                @endif
            @else
                <a href="{{ route('userscourse', ['name' => $course->url]) }}?start=1" class="my-button-gray">Take this Training</a>
            @endif
        </div>

    </div>

@endsection