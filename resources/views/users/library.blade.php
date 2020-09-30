@extends('layouts.userstemplate')
@section('title', 'Library')
@section('extraCss')
    <link rel="stylesheet" href="{{ asset('css/users/general.css') }}">
@endsection
@section('extraClass', 'p-0')

@section('sidebar')
    @include('layouts.sidebarcontents')
@endsection

@section('content')
    <div class="courses w-100 text-center assignments library">
        <div class="row p-2">
            <div class="col-12">
                <h4>Library</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-1">
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">#</div>
                </div>
            </div>
            <div class="col-5">
                <i class="icon-book-open"></i> Trainings
            </div>
            <div class="col-6">
                <i class="icon-folder-alt" data-toggle="tooltip" data-placement="top" title="Total number of assignments scored"></i>
                <span class="">Files</span>
            </div>
        </div>

        @forelse($uniqueCourseGeneralLibrary as $course)
            <div class="course-wrapper row mt-1">
                <div class="col-1" data-toggle="collapse" href="#assignment{{ $loop->index }}" role="button" aria-expanded="false" aria-controls="Trainings">
                    <div class="row {{ (!$course->title)?'no-hover':'' }}">
                        <div class="col-12 col-md-6 font-weight-bold sign-wrapper">
                            @if($course->title)
                                +
                            @endif
                        </div>
                        <div class="col-6 d-none d-md-block"><span class="number">{{ $loop->index + 1 }}</span></div>
                    </div>
                </div>
                <div class="col-5 my-title">
                    @if($course->title)
                        <a href="{{ route('userscourse', ['name' => $course->url]) }}" class="text-color-link">{{ $course->title }}</a>
                    @else
                        <span class="text-color-green">General</span>
                    @endif
                </div>

                <div class="col-6">
                    @php
                        if($course->title){
                            if($course->showCourseLibrary)
                                $courseLibraryFiles = $courseLibrary->where('url', $course->url);
                            else
                                $courseLibraryFiles = [];
                        }else{
                            $courseLibraryFiles = $generalLibrary;
                        }
                    @endphp

                    @foreach($courseLibraryFiles as $courseLibraryFile)
                        <a href="{{ route('libraryfile', ['any' => $courseLibraryFile->file]) }}" class="text-color-link" data-toggle="tooltip" data-placement="top" title="Total number of final projects">
                            <i class="icon-cloud-download"></i> {{ explode('/', $courseLibraryFile->file)[1] }}
                        </a>
                        @if(!$loop->last)
                            <hr>
                        @endif
                    @endforeach
                </div>
            </div>

        @if($course->title)
            <div class="lessons-wrapper w-100 collapse" id="assignment{{ $loop->index }}">
                @php
                    $currentLessonLibraries = $lessonLibrary->where('course_id', $course->id)
                                                ->unique('id')->take($course->noEligibleLessons);
                @endphp
                @forelse($currentLessonLibraries as $lesson)
                    <div class="row p-1">
                        <div class="col-1 p-0"><span class="d-none d-sm-inline-block">
                                Lesson </span>{{ $loop->index + 1 }}
                        </div>
                        <div class="col-5 my-title">
                            <a href="{{ route('userslesson', ['id' => $lesson->id]) }}" class="text-color-link">
                                {{ $lesson->title }}
                            </a>
                        </div>

                        @php
                            $lessonLibraryFiles = $lessonLibrary->where('id', $lesson->id);
                        @endphp

                        <div class="col-6">
                            @foreach($lessonLibraryFiles as $lessonLibraryFile)
                                <a href="{{ route('libraryfile', ['any' => $lessonLibraryFile->file]) }}" class="text-color-link" data-toggle="tooltip" data-placement="top" title="Total number of final projects">
                                    <i class="icon-cloud-download"></i> {{ explode('/', $lessonLibraryFile->file)[1] }}
                                </a>
                                @if(!$loop->last)
                                    <hr>
                                @endif
                            @endforeach
                        </div>
                    </div>

                @empty
                    <div class="text-center mt-2">No Lesson library found!</div>
                @endforelse
            </div>
            @endif
        @empty
            <div class="text-center mt-2">
                You do not have access to any library yet.!
                <br>
                <br>
                <a href="{{ route('userscourses') }}" class="my-button-gray">Start a Training Now!</a>
            </div>
        @endforelse

    </div>
@endsection