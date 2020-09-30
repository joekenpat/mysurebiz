@extends('layouts.template')
@section('title')
    action steps
@endsection
@section('extraClass', 'p-0')
@section('extraScript')

@endsection
@section('content')
    <div class="courses w-100 text-center assignments">
        <div class="row p-2">
            <div class="col-12">
                <h4>{{ $type }} Action Steps Report</h4>
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
            <div class="col-2">
                <i class="icon-check" data-toggle="tooltip" data-placement="top" title="Total number of action steps scored"></i>
                <span class="d-none d-sm-inline-block">Scored</span>
            </div>
            <div class="col-2">
                <i class="icon-clock" data-toggle="tooltip" data-placement="top" title="Total number of action steps yet to be scored"></i>
                <span class="d-none d-sm-inline-block">Not Scored</span>
            </div>
            <div class="col-2">
                <i class="icon-size-actual" data-toggle="tooltip" data-placement="top" title="Total number of action steps"></i>
                <span class="d-none d-sm-inline-block">Total</span>
            </div>
        </div>

        @forelse($onlyCourses as $course)
            <div class="course-wrapper row mt-1">
                <div class="col-1" data-toggle="collapse" href="#assignment{{ $loop->index + 1 }}" role="button" aria-expanded="false" aria-controls="courses">
                    <div class="row">
                        <div class="col-12 col-md-6 font-weight-bold sign-wrapper">+</div>
                        <div class="col-6 d-none d-md-block">{{ $loop->index + 1 }}</div>
                    </div>
                </div>
                <div class="col-5 my-title">
                    <a href="{{ route('course-page', ['id' => $course->id]) }}" class="text-color-link">{{ $course->title }}</a>
                </div>
                {{--Scored projects--}}
                <div class="col-2">
                    <a href="{{ route('assignments-page', ['category' => 'course', 'id' => $course->id]) }}?scored=1" class="text-color-link" data-toggle="tooltip" data-placement="top" title="Number of final projects scored">
                        {{ $courses->where('id', $course->id)
                            ->where('lesson_id', null)
                            ->filter(function ($value, $key) {
                                        return $value->score != null;
                                    })->count()
                         }}
                    </a>
                </div>
                {{--Not Scored projects--}}
                <div class="col-2">
                    <a href="{{ route('assignments-page', ['category' => 'course', 'id' => $course->id]) }}?scored=0" class="text-color-link" data-toggle="tooltip" data-placement="top" title="Number of final projects not scored">
                        {{ $courses->where('id', $course->id)
                            ->where('lesson_id', null)
                            ->filter(function ($value, $key) {
                                        return $value->score == null;
                                    })->count()
                         }}
                    </a>
                </div>
                {{--Total Course project--}}
                <div class="col-2">
                    <a href="{{ route('assignments-page', ['category' => 'course', 'id' => $course->id]) }}" class="text-color-link" data-toggle="tooltip" data-placement="top" title="Total number of final projects">
                        {{ $courses->where('id', $course->id)
                            ->where('lesson_id', null)
                            ->count()}}
                    </a>
                </div>
            </div>

            <div class="lessons-wrapper w-100 collapse" id="assignment{{ $loop->index + 1 }}">
                @php
                    $lessons = $courses->where('id', $course->id)
                            ->filter(function ($value, $key) {
                                        return $value->lesson_id != null;
                                    })
                            ->unique('lesson_id');
                @endphp
                @forelse($lessons as $lesson)
                    <div class="row p-1">
                        <div class="col-1 p-0"><span class="d-none d-sm-inline-block">
                                Lesson </span>{{ $loop->index + 1 }}
                        </div>
                        <div class="col-5 my-title">
                            <a href="{{ route('lesson-page', ['id' => $lesson->lesson_id]) }}" class="text-color-link">{{ $lesson->lesson_title }}</a>
                        </div>
                        {{--Scored lesson assignments--}}
                        <div class="col-2">
                            <a href="{{ route('assignments-page', ['category' => 'lesson', 'id' => $lesson->lesson_id]) }}?scored=1" class="text-color-link" data-toggle="tooltip" data-placement="top" title="Number of lesson action steps scored">
                                {{ $courses->where('id', $course->id)
                                ->where('lesson_id', $lesson->lesson_id)
                                ->filter(function ($value, $key) {
                                                return $value->score != null;
                                            })->count()
                                 }}
                            </a>
                        </div>
                        {{--Not Scored lesson assignments--}}
                        <div class="col-2">
                            <a href="{{ route('assignments-page', ['category' => 'lesson', 'id' => $lesson->lesson_id]) }}?scored=0" class="text-color-link" data-toggle="tooltip" data-placement="top" title="Number of lesson action steps not scored">
                                {{ $courses->where('id', $course->id)
                                ->where('lesson_id', $lesson->lesson_id)
                                ->filter(function ($value, $key) {
                                                return $value->score == null;
                                            })->count()
                                 }}
                            </a>
                        </div>
                        {{--Total lesson assignments--}}
                        <div class="col-2">
                            <a href="{{ route('assignments-page', ['category' => 'lesson', 'id' => $lesson->lesson_id]) }}" class="text-color-link" data-toggle="tooltip" data-placement="top" title="Total number of lesson action steps">
                                {{ $courses->where('id', $course->id)
                                ->where('lesson_id', $lesson->lesson_id)
                                ->count() }}
                            </a>
                        </div>
                    </div>

                @empty
                    <div class="text-center mt-2">No action steps found!</div>
                @endforelse
            </div>
        @empty
            <div class="text-center mt-2">No action steps found!</div>
        @endforelse

    </div>
@endsection