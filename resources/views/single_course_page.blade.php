@extends('layouts.template')
@section('title', $uniqueCourse->title)
@section('extraCss')
    <link rel="stylesheet" href="{{ asset('css/single-course-page.css') }}"/>
@endsection
@section('content')
    {{--{{ dd($course) }}--}}
    <div class="view-course">
        <h3>{{ $uniqueCourse->title }}</h3>
        <div class="course-info row">
            <div class="col-12 col-sm-4 text-small">
                @if($uniqueCourse->first_name)
                    By <a href="{{ route('user-page', ['id' => $uniqueCourse->users_id]) }}">{{ $uniqueCourse->first_name }} {{ $uniqueCourse->last_name }}</a>
                @endif
                 <label class="text-muted">{{ Carbon\Carbon::parse($uniqueCourse->created_at)->format('g:i A Y-m-d') }}</label>
            </div>
            <div class="col-12 col-sm-5 text-sm-center">
                <div class="row">
                    <div class="col-3">
                        <span>Category:</span>
                    </div>
                    <div class="col-9 text-left">
                        @foreach($course as $courseCategory)
                            <div class="d-inline-block text-color-green business-category mt-1">
                                {{ $courseCategory->category_name }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-3 text-sm-right text-small">
                <span>Start date:</span> {{ $uniqueCourse->start_date }}
            </div>
        </div>

        <div class="course-image-cover text-center mt-3 mb-3 w-75 mx-auto">
            <img class="img-fluid" src="/storage/{{ $uniqueCourse->cover_image }}" alt="">
        </div>

        @if($uniqueCourse->video)
        <h4 class="mx-4 mx-sm-5">Introductory  Video</h4>
        <div>
            <div class="embed-responsive embed-responsive-16by9 w-75 mx-auto">
                <iframe class="embed-responsive-item" src="{{ $uniqueCourse->video }}" allowfullscreen></iframe>
            </div>
        </div>
        @endif

        @if($uniqueCourse->note)
            <div class="course-note">
                <h4>Training Introductory  Note</h4>
             {!! nl2br(e($uniqueCourse->note)) !!}
            </div>
        @endif

        @if($uniqueCourse->assignment_note)
        <div class="assignment text-center">
            <h4>Assignment</h4>
            <div class="text-left">
                {!! nl2br(e($uniqueCourse->assignment_note)) !!}
            </div>
            @if($uniqueCourse->assignment_doc)
                <div class="course-material mt-2 d-inline-block p-1 mx-auto">
                    <a href="{{ route('libraryfile', ['any' => $uniqueCourse->assignment_doc]) }}" download>
                        <i class="icon-doc"></i>
                        {{ explode('/', $uniqueCourse->assignment_doc)[1]  }} <small class="text-muted">{{ $uniqueCourse->assignment_doc_size }}</small></a>
                </div>
                <br>
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

        @if(!$lessons->isEmpty())
        <div class="lessons">
            <h4>Lessons</h4>
            <ul>
                @forelse($lessons as $lesson)
                <li><a href="{{ route('lesson-page', ['id' => $lesson->id]) }}">{{ $lesson->title }}</a></li>
                @empty
                @endforelse
            </ul>
        </div>
        @endif

        <div class="submit text-right mb-4 mt-2">
            <a href="{{ route('course-edit', ['id' => $uniqueCourse->id]) }}" class="my-button-gray">Edit</a>
        </div>

    </div>
@endsection