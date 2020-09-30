@extends('layouts.template')
@section('title', 'Library')
@section('extraClass', 'p-0')
@section('extraScript')
    <script src="{{ asset('js/library.js') }}"></script>
@endsection
@section('content')
    <div class="library courses w-100 text-center">
        <div class="row p-2">
            <div class="col-4 col-xl-2 d-none d-sm-block">
                <a href="{{ route('addlibrary') }}" class="my-button-green d-inline-block">Add library</a>
            </div>
            <div class="col-12 col-sm-4 col-xl-6 ">
                <h4>{{ $title }}</h4>
            </div>
            <div class="col-12 d-sm-none text-left mb-1">
                <a href="{{ route('addlibrary') }}" class="my-button-green d-inline-block add-library">Add library</a>
            </div>
            <div class="col-12 col-sm-4 col-xl-4">
                <form action="{{ route('library') }}" method="post">
                    @csrf
                <div class="input-group">
                    <input type="text" name="searchQuery" required class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text" id="library-search"><i class="icon-arrow-right"></i></button>
                    </div>
                </div>
                </form>
            </div>
        </div>

        <div class="row font-none">
            <div class="col-1">#</div>
            <div class="col-5">File Name</div>
            <div class="col-4"><span class="d-none d-sm-inline-block">Associated </span> Training</div>
            {{--<div class="col-sm-3 d-none d-sm-block d-md-none"><i class="icon-envelope"></i></div>--}}
            <div class="col-2">Category</div>
            {{--<div class="col-1 d-none d-sm-block">Delete</div>--}}
        </div>


        @forelse($uniqueLibrary as $library)
            @php
                //Check if library is general
                $isGeneralLibrary = $library->course_id == null && $library->lesson_id == null
            @endphp
            <div class="course-wrapper no-hover-effect row mt-1 my-library" id="{{ $library->library_id }}">
                <div class="col-1" data-toggle="collapse" href="#library_{{ $loop->index }}" role="button" aria-expanded="false" aria-controls="Trainings">
                    <div class="row">
                        <div class="col-12 col-md-6 font-weight-bold sign-wrapper">
                            @if(!$isGeneralLibrary)
                                +
                            @endif
                        </div>
                        <div class="col-6 d-none d-md-block"><span class="number">{{ $loop->index + 1 }}</span></div>
                    </div>
                </div>
                <div class="col-5 my-title">
                    @php
                        if($isGeneralLibrary){
                            $courseFiles = [$library];
                        }else{
                         $courseFiles = $libraries->where('course_id', $library->course_id)
                            ->where('lesson_id', null);
                        }
                    @endphp

                    @forelse($courseFiles as $courseFile)
                        <div class="course-material course0 course mt-2 position-relative" id="{{ $courseFile->library_id }}">
                            <i class="icon-close position-absolute" data-toggle="tooltip" data-placement="top" title="" data-original-title="delete library"></i>
                            <a href="{{ route('libraryfile', ['any' => $courseFile->file]) }}" class="text-color-link">
                                {{ explode('/', $courseFile->file)[1] }}
                            </a>
                        </div>
                    @empty
                    @endforelse
                </div>
                @if($library->course_id)
                    <div class="col-4"><a href="{{ route('course-page', ['id' => $library->course_id]) }}" class="text-color-link">{{ $library->title }}</a></div>
                    {{--<div class="col-sm-3 d-none d-sm-block d-md-none"><i class="icon-envelope"></i></div>--}}
                    <div class="col-2 duration">
                        @php
                            $CurrentCategories = $allCategoriesCourse->where('course_id', $library->course_id)
                        @endphp
                        @foreach($CurrentCategories as $currentCategory)
                            <span class="d-block text-color-green business-category mt-1">{{ $currentCategory->name }}</span>
                        @endforeach
                    </div>

                @else
                    <div class="col-4"><span class="text-color-green">General</span></div>
                    <div class="col-2 duration">
                        @php
                            $CurrentCategories = $allCategoriesLibrary->where('library_id', $library->library_id)
                        @endphp
                        @foreach($CurrentCategories as $currentCategory)
                            <span class="d-block text-color-green business-category mt-1">{{ $currentCategory->name }}</span>
                        @endforeach
                    </div>
                @endif
                {{--<div class="col-1"><i class="icon-trash" data-toggle="tooltip" data-placement="top" title="delete"></i></div>--}}
            </div>

            {{--Lesson Starts here--}}
        @php
            $currentUniqueLessons = $uniqueLessons->where('course_id', $library->course_id)
        @endphp

            @if(!$isGeneralLibrary)
            <div class="lessons-wrapper w-100 collapse" id="library_{{ $loop->index }}">
                @forelse($currentUniqueLessons as $lesson)
                    <div class="row p-1">
                        <div class="col-1"><span class="d-none d-sm-inline-block">Lesson</span>{{ $loop->index + 1 }}</div>
                        <div class="col-5">
                            @php
                                $LessonFiles = $libraries->where('lesson_id', $lesson->lesson_id);
                            @endphp
                            @foreach($LessonFiles as $lessonFile)
                                <div class="library-page course-material course0 course mt-2 position-relative" id="{{ $lessonFile->library_id }}">
                                    <i class="icon-close position-absolute" data-toggle="tooltip" data-placement="top" title="" data-original-title="delete file"></i>
                                    <a href="{{ route('libraryfile', ['any' => $lessonFile->file]) }}" class="text-color-link">
                                        {{ explode('/', $lessonFile->file)[1] }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-4">
                            <a href="{{ route('lesson-page', ['id' => $lesson->lesson_id]) }}" class="text-color-link">
                                {{ $lesson->lesson_title }}
                            </a>
                        </div>
                        <div class="col-2"></div>
                    </div>

                @empty
                    <div class="text-center mt-2">No Lesson library found!</div>
                @endforelse
            </div>
            @endif

        @empty
            <div class="text-center">No Library Found!</div>
        @endforelse

    </div>
@endsection