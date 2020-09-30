@extends('layouts.template')
@section('title')
{{ $type }} Trainings
@endsection
@section('extraClass', 'p-0')
@section('extraScript')
    <script src="{{ asset('js/managecourse.js') }}"></script>
    <script src="{{ asset('js/managelesson.js') }}"></script>
@endsection
@section('extraCss')
    <link rel="stylesheet" href="{{ asset('css/manage-course.css') }}">
@endsection
@section('content')
    {{--{{ dd($courses) }}--}}
    <div class="courses w-100 text-center">
    <div class="row p-2">
        <div class="col-12">
            <h4>{{ $type }} Training Report</h4>
        </div>
    </div>

        <div class="row">
            <div class="col-1">
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">#</div>
                </div>
            </div>
            <div class="col-4">
                Title
            </div>
            <div class="col-1 d-none d-md-block">Lessons <small><i class="icon-question" data-toggle="tooltip" data-placement="top" title="No. of lessons contained"></i></small></div>
            <div class="col-1 d-md-none"><i class="icon-book-open" data-toggle="tooltip" data-placement="top" title="No. of lessons contained"></i></div>
            <div class="col-2 duration d-none d-md-block">Category <small><i class="icon-question" data-toggle="tooltip" data-placement="top" title="Business category of training"></i></small></div>
            <div class="col-2 duration d-md-none"><i class="icon-grid" data-toggle="tooltip" data-placement="top" title="Business category of training"></i></div>
            {{--<div class="col-1 d-md-none"><i class="icon-user-following" data-toggle="tooltip" data-placement="top" title="No. of students enrolled to this training"></i></div>--}}
            {{--<div class="col-1 col-lg-2 d-none d-md-block d-xl-none">Enrolled  <small><i class="icon-question" data-toggle="tooltip" data-placement="top" title="No. of students enrolled to this training"></i></small></div>--}}
            <div class="col-1 duration d-xl-none"><i class="icon-user-following" data-toggle="tooltip" data-placement="top" title="No. of students that have completed the training"></i></div>
            <div class="col-1 d-none d-xl-block">Completed <small><i class="icon-question" data-toggle="tooltip" data-placement="top" title="No. of students that have completed the training"></i></small></div>
            <div class="col-1 duration d-xl-none"><i class="icon-clock" data-toggle="tooltip" data-placement="top" title="Date of training start"></i></div>
            <div class="col-1 d-none d-xl-block">Start date <small><i class="icon-question" data-toggle="tooltip" data-placement="top" title="Date of training start"></i></small></div>
            <div class="col-1 d-none d-md-block">Edit</div>
            <div class="col-1 d-none d-md-block">Delete</div>
        </div>

        {{--<div class="invalid-feedback text-center d-block">Delete Action unsuccessful</div>--}}

        @forelse($uniqueCourses as $course)
            <div class="course-wrapper row mt-1" id="{{ $course->id }}">
                <div class="col-1" data-toggle="collapse" href="#courselesson{{ $loop->index + 1 }}" role="button" aria-expanded="false" aria-controls="courses">
                    <div class="row">
                        <div class="col-12 col-md-6 font-weight-bold sign-wrapper">+</div>
                        <div class="col-6 d-none d-md-block">{{ $loop->index + 1 }}</div>
                    </div>
                </div>
                <div class="col-4 my-title">
                    <a href="{{ route('course-page', ['id' => $course->id]) }}" class="text-color-link">{{ $course->title }}</a>
                </div>
                {{--No of Lessons--}}
                <div class="col-1" data-toggle="collapse" href="#courselesson{{ $loop->index + 1 }}" role="button" aria-expanded="false" aria-controls="lessons">
                    {{ $uniqueLessons->where('course_id', $course->id)->count() }}
                </div>
                <div class="col-2 duration">
                    @php
                        $CurrentCategories = $allCategoriesCourse->where('course_id', $course->id)
                    @endphp
                    @foreach($CurrentCategories as $currentCategory)
                        <span class="d-block text-color-green business-category mt-1">{{ $currentCategory->name }}</span>
                    @endforeach
                </div>
                {{--Total Enrolled--}}
                <div class="col-1">
                    @php
                        $completed = $allCourses->where('completed', 1)
                                     ->where('id', $course->id)->count();
                        //$progress = $allCourses->where('completed', null)
                                     //->where('id', $course->id)->count();
                    @endphp
                    {{ $completed}}
                </div>
                {{--Completed--}}
                {{--<div class="col-1">--}}
                    {{--{{$completed}}--}}
                {{--</div>--}}
                {{--Progress--}}
                <div class="col-1 start-date">
                    {{$course->start_date}}
                </div>
                <div class="col-1">
                    <a href="{{ route('course-edit', ['id' => $course->id]) }}">
                    <i class="icon-pencil" data-toggle="tooltip" data-placement="top" title="edit training"></i>
                    </a>
                </div>
                <div class="col-1"><i class="icon-trash" data-toggle="tooltip" data-placement="top" title="delete training"></i></div>
            </div>

            <div class="lessons-wrapper w-100 collapse" id="courselesson{{ $loop->index + 1 }}">
                @php
                    $currentLessons = $uniqueLessons->where('course_id', $course->id);
                @endphp
            @forelse($currentLessons as $lesson)

                    <div class="row p-1" id="{{ $lesson->id }}">
                        <div class="col-1 p-0 lesson-index">
                            <span class="d-none d-sm-inline">Lesson </span>{{ $loop->index + 1 }}
                        </div>
                        <div class="col-4 my-title">
                            <a href="{{ route('lesson-page', ['id' => $lesson->id]) }}" class="text-color-link">{{ $lesson->title }}</a>
                        </div>
                        {{--<div class="col-2 col-sm-5 col-xl-3"></div>--}}
                        {{--Completed--}}
                        <div class="col-1 offset-3">
                            {{ $allLessons->where('id', $lesson->id)
                            ->where('start', 1)->where('video', 1)
                            ->where('assignment', 1)->count()
                             }}
                        </div>
                        {{--Progress--}}
{{--                        {{ dd($allLessons) }}--}}
                        {{--<div class="col-1 d-none d-xl-block">--}}
                            {{--{{ $allLessons->where('id' , $lesson->id)--}}
                            {{--->where('start', 1)->filter(function ($value, $key){--}}
                                    {{--return $value->video == null || $value->assignment == null;--}}
                                {{--})->count()--}}
                             {{--}}--}}
                        {{--</div>--}}
                        <div class="col-1 offset-1">
                            <a href="{{ route('lesson-edit', ['id' => $lesson->id]) }}">
                                <i class="icon-pencil" data-toggle="tooltip" data-placement="top" title="edit lesson"></i>
                            </a>
                        </div>
                        <div class="col-1"><i class="icon-trash" data-toggle="tooltip" data-placement="top" title="delete training"></i></div>
                    </div>

            @empty
                <div class="text-center mt-2">No lessons found!</div>
            @endforelse
            </div>
        @empty
            <div class="text-center mt-2">No training found!</div>
        @endforelse

    </div>
@endsection