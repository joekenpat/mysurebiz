@php
    $progressCheck = false;
@endphp
<div class="col-6 col-md-4 col-xl-3 col-small-12 pb-3">
    <div class="course-cards position-relative"
         style="{{$course->eligible ? "" : "opacity: 0.6;"}}">
        <div class="card-head mb-1">
            <div class="float-left">Lessons: {{ $course->lessonCount }}</div>
            <div class="float-right">Duration: {{ $course->duration != "" ? $course->duration : "N/A" }}</div>
        </div>
        <div class="img-wrapper text-center position-relative">
            <img class="img-fluid" src="/storage/{{ $course->cover_image }}" alt="{{ $course->title }}">
        </div>
        <div class="title text-center my-1">
            <a
                @if($course->eligible)
                    href="{{ route('userscourse', ['name' => $course->url]) }}"
                @endif
            >
                {{ str_limit($course->title, 35)}}
            </a></div>
        <div class="actions">
            @if($subscribedCourses)
                @foreach($subscribedCourses as $subscribedCourse)
                    @if($subscribedCourse->url == $course->url && $subscribedCourse->isCourseStarted)
                        @php
                            $progressCheck = true;
                        @endphp
                        @if($subscribedCourse->completed)
                            <a
                                @if($course->eligible)
                                    href="{{ route('userscourse', ['name' => $course->url]) }}"
                                @endif
                                class="float-left my-button-gray">View
                            </a>
                            <span class="float-right completed"><i class="icon-check"></i> Completed</span>
                        @else
                            <a
                                @if($course->eligible)
                                    href="{{ route('userscourse', ['name' => $course->url]) }}"
                                @endif
                                class="float-left my-button-gray px-2 continue">Continue
                            </a>
                            <span class="float-right in-progress"><i class="icon-star"></i> In progress</span>
                        @endif

                    @endif
                @endforeach
            @else

            @endif

            @if(!$progressCheck)
                <a
                    @if($course->eligible)
                        href="{{ route('userscourse', ['name' => $course->url]) }}"
                    @endif
                    class="float-left my-button-gray">View</a>
                <span class="float-right text-muted not-started"><i class="icon-ban"></i> Not Started</span>
            @endif
        </div>
    </div>
</div>