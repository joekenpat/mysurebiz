@extends('layouts.template')
@section('title', $lesson->title)
@section('extraCss')
    <link rel="stylesheet" href="{{ asset('css/single-course-page.css') }}"/>
@endsection

@section('content')
    <div class="view-course">
        <h3>{{ $lesson->title }}</h3>
        <div class="Training-info row mt-2 mb-2">
            <div class="col-12 col-sm-6 text-small">
                By <a href="{{ route('user-page', ['id' => $lesson->users_id]) }}">{{ $lesson->first_name }} {{ $lesson->last_name }}</a> <label class="text-muted">{{ Carbon\Carbon::parse($lesson->created_at)->format('g:i A Y-m-d') }}</label>
            </div>

            <div class="col-12 col-sm-6 text-sm-right">
                <div class="row">
                    <div class="col-3">
                        <span>Training:</span>
                    </div>
                    <div class="col-9 text-left">
                        <a href="{{ route('course-page', ['id' => $course->id]) }}">{{ $course->title }}</a>
                    </div>
                </div>
            </div>
        </div>
        @if($lesson->video)
        <div>
            <div class="embed-responsive embed-responsive-16by9 w-75 mx-auto">
                <iframe class="embed-responsive-item" src="{{ $lesson->video }}" allowfullscreen></iframe>
            </div>
        </div>
        @endif

        @if($lesson->note)
        <div class="course-note">
            <h4>Lesson  Note</h4>
            {!! nl2br(e($lesson->note)) !!}
        </div>
        @endif

        @if($lesson->assignment_note)
        <div class="assignment text-center">
            <h4>Assignment</h4>
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
        @endif

        @if(!$libraries->isEmpty())
        <div class="documents text-center">
            <h4>Training Materials</h4>
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

        @if(!$otherLessons->isEmpty())
        <div class="lessons">
            <h4>Other Lessons in this training</h4>
            <ul>
                @foreach($otherLessons as $otherLesson)
                <li><a href="{{ route('lesson-page', ['id' => $otherLesson->id]) }}">{{ $otherLesson->title }}</a></li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="submit text-right mb-4">
            <a href="{{ route('lesson-edit', ['id' => $lesson->id]) }}" class="my-button-gray">Edit</a>
        </div>

    </div>
@endsection