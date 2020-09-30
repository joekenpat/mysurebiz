@extends('layouts.userstemplate')
@section('title')
    @if(Session::has('courseTitle'))
        {{ "Previous Lessons Not Incomplete" }}
    @else
        {{ $lesson->title }}
    @endif
@endsection
@section('extraCss')
    <link rel="stylesheet" href="{{ asset('css/users/general.css') }}">
@endsection
@section('extraScript')
    @if(!Session::has('courseTitle'))
        <script>
            var lessonId = "{{ $lesson->id }}";
        </script>
        <script src="{{ asset('js/users/lesson.js') }}"></script>
        <script src="{{ asset('js/users/notification-tracker.js') }}"></script>
        <script src="{{ asset('js/users/general.js') }}"></script>
        @if(!$lessonProgress->video)
            <script>
                //Video tracking
                var monitor = setInterval(function(){
                    var elem = document.activeElement;
                    if(elem && elem.tagName === 'IFRAME'){
                        videoTracker({{ $lesson->id }});
                        clearInterval(monitor);
                    }
                }, 100);
            </script>
        @endif
    @endif
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
            @php
                Session::forget('courseTitle');
            @endphp
        @else
            {{--Start Normal Lesson Display--}}
        <h3>{{ $lesson->title }}</h3>
        <div class="course-info mt-1 mt-sm-3">
            {{--<div class="col-12 col-sm-6 text-small">--}}
                {{--By <a href="{{ route('user-page', ['id' => $lesson->users_id]) }}">{{ $lesson->first_name }} {{ $lesson->last_name }}</a> <label class="text-muted float-right float-sm-none time">{{ Carbon\Carbon::parse($lesson->created_at)->format('g:i A Y-m-d') }}</label>--}}
            {{--</div>--}}

            {{--<div class="col-12">--}}
                    <span>Training:</span>
                    <a href="{{ route('userscourse', ['name' => $course->url]) }}">{{ $course->title }}</a>

            {{--</div>--}}
        </div>
        {{--<hr>--}}
        @if($lesson->note)
            <div class="course-note mt-3 mb-3">
                {{--<h4>Lesson  Note</h4>--}}
                {!! nl2br(e($lesson->note)) !!}
            </div>
        @endif

        @if($lesson->video)
            <div>
                <div class="embed-responsive embed-responsive-16by9 course-video mx-auto">
                    <iframe class="embed-responsive-item" id="lesson_{{ $lesson->id }}" src="{{ $lesson->video }}" allowfullscreen></iframe>
                </div>
            </div>
        @endif

        @if(!$libraries->isEmpty())
            <div class="documents text-center">
                <h4>Lesson Material(s)</h4>
                @forelse($libraries as $library)
                    <div class="course-material mt-2 d-inline-block p-1">
                        <a href="{{ route('libraryfile', ['any' => $library->file]) }}" download>
                            <i class="icon-doc"></i>
                            {{ explode('/', $library->file)[1]  }} <small class="text-muted">{{ $library->file_size }}</small></a>
                    </div>
                    <br>
                @empty
                @endforelse
            </div>
        @endif

        @if($lesson->assignment_note || $lesson->assignment_doc)
            <div class="assignment text-center">
                <h4>Action step</h4>
                <div class="text-left">
                    {!! nl2br(e($lesson->assignment_note)) !!}
                </div>
                @if($lesson->assignment_doc)
                    <div class="course-material mt-2 d-inline-block p-1 mx-auto">
                        <a href="{{ route('libraryfile', ['any' => $lesson->assignment_doc]) }}" download>
                            <i class="icon-doc"></i>
                            {{ explode('/', $lesson->assignment_doc)[1]  }} <small class="text-muted">{{ $lesson->assignment_doc_size }}</small></a>
                    </div>
                @endif
            </div>

            <hr>
            {{--Submit assignment--}}
            <div class="assignment text-center">
                <h4 class="mb-4">Submit Action step</h4>
            </div>
            @if(!$assignmentReport)
                <form id="submitassignment" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="form-group row">
                    <div class="col-sm-12 text-center">
                        <input type="file" name="assignment" onchange="UserAddLessonAssignmentChange($(this))" class="d-none">
                        <button class="btn btn-success upload-lesson-assignment"><i class="icon-cloud-upload"></i> Upload Action step</button>

                        <div class="mt-2">
                            <button type="submit" class="my-button-gray">Submit</button>
                        </div>
                    </div>
                </div>
                </form>
            @else
                {{--Action step Submitted--}}
                <div class="assignment-submitted text-center" id="lesson-wrapper">
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
            @else
                <a href="{{ route('userscourse', ['name' => $course->url]) }}" class="my-button-gray py-1 pl-2 pr-3 mb-2 float-left"> <i class="icon-arrow-left"></i>Prev</a>
            @endif
            @if($next)
                <a href="{{ route('userslesson', ['id' => $next]) }}" class="my-button-gray py-1 pl-3 pr-2 mb-2 float-right">Next<i class="icon-arrow-right"></i></a>
            @elseif($next === null)
                <a href="{{ route('finalproject', ['courseid' => $course->id]) }}" class="my-button-gray py-1 pl-3 pr-2 mb-2 float-right">Final Project <i class="icon-arrow-right"></i></a>
            @else
                <span class="btn-secondary py-1 pl-3 pr-2 mb-2 float-right" title="Not yet available. Check back later.">Next<i class="icon-arrow-right"></i></span>
            @endif
        </div>
        @endif
    </div>
@endsection