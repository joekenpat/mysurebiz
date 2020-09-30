@extends('layouts.userstemplate')
@section('title', $course->title." | Final Project")
@section('extraCss')
    <link rel="stylesheet" href="{{ asset('css/users/general.css') }}">
@endsection
@section('extraScript')
    <script>
        var courseId = "{{ $course->id }}";
    </script>
    <script src="{{ asset('js/users/finalproject.js') }}"></script>
    <script src="{{ asset('js/users/notification-tracker.js') }}"></script>
    {{--    {{ dd($lessonProgress) }}--}}
@endsection
@section('sidebar')
    @include('layouts.lesson-sidebar')
@endsection


@section('content')
    <div class="view-course user-lesson">
        <h3>Final Action Step</h3>
        <div class="course-info mt-1 mt-sm-3">
                <span>Training:</span> <a href="{{ route('userscourse', ['name' => $course->url]) }}">{{ $course->title }}</a>
        </div>
        {{--<hr>--}}

        @if($course->assignment_note || $course->assignment_doc)
            <div class="assignment text-center mb-3 mt-3">
                {{--<h4>Final Project</h4>--}}
                <div class="text-left">
                    {!! nl2br(e($course->assignment_note)) !!}
                </div>
                @if($course->assignment_doc)
                    <div class="course-material mt-2 d-inline-block p-1 mx-auto">
                        <a href="{{ route('libraryfile', ['any' => $course->assignment_doc]) }}" download>
                            <i class="icon-doc"></i>
                            {{ explode('/', $course->assignment_doc)[1]  }} <small class="text-muted">{{ $course->assignment_doc_size }}</small></a>
                    </div>
                @endif
            </div>

            {{--<hr>--}}
            {{--Submit assignment--}}
            <div class="assignment text-center">
                <h4 class="mb-4">Submit Action Step</h4>
            </div>
            @if(!$assignmentReport)
                <form id="submitassignment" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12 text-center">
                            <input type="file" name="project" onchange="UserAddLessonAssignmentChange($(this))" class="d-none">
                            <button class="btn btn-success upload-lesson-assignment"><i class="icon-cloud-upload"></i> Upload Project</button>

                            <div class="mt-2">
                                <button type="submit" class="my-button-gray">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            @else
                {{--Assignment Submitted--}}
                <div class="assignment-submitted text-center" id="Course-score-wrapper">
                    <div class="d-inline-block p-1 text-color-green"><i class="icon-check"></i> Action Step Submitted Successfully
                        @if($assignmentReport->score)
                            @if($assignmentReport->score > 49)
                                <span class="score d-inline-block access-student">{{ $assignmentReport->score }}%</span>
                            @else
                                <span class="score d-inline-block access-employee">{{ $assignmentReport->score }}%</span>
                             @endif
                        @endif
                    </div>
                </div>
            @endif
        @endif



        <div class="submit text-right mb-2 prev-next">
            @if($previous)
                <a href="{{ route('userslesson', ['id' => $previous]) }}" class="my-button-gray py-1 pl-2 pr-3 mb-2 float-left"> <i class="icon-arrow-left"></i>Prev</a>
            @endif
            @if($courseCompleteProgress)
                    <p class="my-button-green py-1 pl-3 pr-2 mb-2 float-right complete-course"><i class="icon-check"></i> Training Completed</p>
            @else
                <a href="{{ route('completecourse', ['courseid' => $course->id]) }}" class="my-button-green py-1 pl-3 pr-2 mb-2 float-right complete-course">Complete Training</a>
            @endif
        </div>

    </div>
@endsection