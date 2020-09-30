@extends('layouts.userstemplate')
@section('title', 'Dashboard')
@section('extraCss')
    <link rel="stylesheet" href="{{ asset('css/users/general.css') }}">
    <style>
        .content-wrapper {
            background: #f3f4f7;
        }
    </style>
@endsection
@section('extraScript')
    <script>
        var completedCourses = "{{ $completedCoursesCount }}";
        var coursesInProgress = "{{ $progressCoursesCount }}";
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="{{ asset('js/users/charts.js') }}"></script>
    <script src="{{ asset('js/users/general.js') }}"></script>
        <script>
            //Video tracking
            var i;
            var elem;
            var id;
            var monitor = [];
                @if($lesson && $lesson->video && !$lesson->video_progress)
                    i = 0;
                    monitor[i] = setInterval(function(i){
                        id = "lesson_{{ $lesson->id }}";
                        elem = document.activeElement;
                        if(elem && elem.tagName === 'IFRAME' && elem.getAttribute('id') === id)
                        {
                            videoTracker({{ $lesson->id }});
                            clearInterval(monitor[i]);
                        }
                    }, 100, i);
                @endif
        </script>
@endsection

@section('sidebar')
    @include('layouts.sidebarcontents')
@endsection

@section('content')
    <div class="dashboard">
        <div class="row">
            @if($completedCoursesCount || $progressCoursesCount)
                <div class="piecharts col-12 col-md-6" id="userspiechart"></div>
            @else
                <div class="piecharts col-12 col-md-6 mt-3 mt-md-0">
                    <div class="m-1 my-display-cards w-100 h-100 p-3 text-center">
                        <h4 class="text-color-green w-100 mt-4 mb-4">No Training history yet!</h4>
                        <a href="{{ route('userscourses') }}" class="my-button-gray">Start a Training Now!</a>
                    </div>
                </div>
            @endif

            <div class="piecharts col-12 col-md-6 mt-3 mt-md-0">
                <div class="m-1 my-display-cards w-100 p-3">
                    <h3 class="text-color-green">Total Penny Wise <span class="float-right my-button-green reduce-font-pad">&#8358;{{ number_format($totalPayments) }}</span></h3>
                    <div class="w-100 mt-4">
                        Referrals balance <span class="referral-number access-student">{{ $totalReferrals }}</span>
                        <span class="float-right access-student">
                            &#8358;{{ number_format(Auth::user()->ref_bonus) }}
                        </span>
                    </div>
                    <div class="w-100 mt-3">Total Trainings<span class="float-right access-artisan">{{ $userCourses->count() }}</span></div>
                    <div class="w-100 mt-3">Assignments Submitted <span class="float-right access-employee">{{ $assignmentsSubmittedCount }}</span></div>
                </div>
            </div>
        </div>

    </div>

    <div class="dashboard-report w-100 mt-4">

    {{--Display welcome note--}}
    @if($welcome_note)
        <div class="view-course user-lesson pb-2 user-dashboard">
            <h3>WELCOME NOTE</h3>
            <div>
                {!! $welcome_note->content !!}
                <div class="embed-responsive embed-responsive-16by9 course-video mx-auto">
                    <iframe class="embed-responsive-item" src="{{ $welcome_note->video }}" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    @endif

    {{--Display Current training--}}

    @if(!$commenceDate) {{--do not display if training not commenced--}}
        @forelse($dueCourses as $dueCourse)
            <div class="row p-2 text-center">
                <div class="col-12">
                    <span class="text-color-green font-weight-bold today-info">Training</span>
                </div>
            </div>
            <div class="view-course user-lesson pb-2 user-dashboard">
                <h3>{{ $dueCourse->course_title }}</h3>
                    <div>
                        @if($dueCourse->course_video)
                            <div class="embed-responsive embed-responsive-16by9 course-video mx-auto">
                                <iframe class="embed-responsive-item" src="{{ $dueCourse->course_video }}" allowfullscreen></iframe>
                            </div>
                        @else
                            <div class="course-image-cover text-center mt-3 mb-3 course-video mx-auto">
                                <img class="img-fluid" src="/storage/{{ $dueCourse->course_image }}" alt="">
                            </div>
                        @endif
                    </div>
                <div class="pr-2 clearfix mb-2 pt-2 mt-3">
                    <a href="{{ route('userscourse', ['name' => $dueCourse->course_url]) }}" class="float-right my-button-green">Start Training</a>
                </div>
            </div>
        @empty
        @endforelse
    @endif

    {{--Display Current Lesson--}}
    @if($lesson && !$commenceDate)
        @if($isLessonCompleted)
            <div class="user-info">
                <h3 class="text-color-green">Congratulations {{Auth::user()->first_name}}!</h3>
                <p>You have completed your lesson for the
                    {{Auth::user()->lesson_duration < 1 ? "Week" : "Month"}}.
                </p>
                <p>Next lesson will be available on <span class="text-color-green font-weight-bold">{{$nextLessonDate}}</span>. Kindly check back.</p>
                <p>Thanks.</p>
            </div>
        @else
            <div class="row p-2 text-center">
                <div class="col-12">
                    <span class="text-color-green font-weight-bold today-info">Training Lesson</span>
                </div>
            </div>

            <div class="view-course user-lesson pb-2 user-dashboard">
               <h3>{{ $lesson->title }}</h3>
                <div class="course-info mt-1 mt-sm-3">
                    <span>Training:</span>
                    <a href="{{ route('userscourse', ['name' => $lesson->course_url]) }}">{{ $lesson->course_title }}</a>
                </div>
                <div>
                    @if($lesson->video)
                        <div class="embed-responsive embed-responsive-16by9 course-video mx-auto">
                            <iframe class="embed-responsive-item" id="lesson_{{ $lesson->id }}" src="{{ $lesson->video }}" allowfullscreen></iframe>
                        </div>
                    @else
                        <div class="course-image-cover text-center mt-3 mb-3 course-video mx-auto">
                            <img class="img-fluid" src="/storage/{{ $lesson->course_image }}" alt="">
                        </div>
                    @endif
                </div>

                <div class="pr-2 clearfix mb-2 pt-2 mt-3">
                    @if($lesson->start && $lesson->video_progress && $lesson->assignment_progress)
                        <a href="{{ route('userslesson', ['id' => $lesson->id]) }}" class="float-left my-button-gray">View again</a>
                        <span class="float-right completed mt-2"><i class="icon-check"></i> Completed</span>
                    @elseif($lesson->start)
                        <a href="{{ route('userslesson', ['id' => $lesson->id]) }}" class="float-left my-button-gray continue">Continue Lesson</a>
                        <span class="float-right in-progress mt-2"><i class="icon-star"></i> In progress</span>
                    @else
                        <a href="{{ route('userslesson', ['id' => $lesson->id]) }}" class="float-right my-button-green">Take this Lesson</a>
                    @endif
                </div>
            </div>
        @endif
    @else
        {{--Disaplay training not commenced Notice or training completed.--}}
        @if($commenceDate)
            <div class="user-info">
                <h3 class="text-color-green">Hi {{Auth::user()->first_name}}!</h3>
                <p>We welcome you to the Biggest and All Encompass Business Empowerment Program, MYSUREBIZ.</p>
                <p>Your training starts on <span class="text-color-green">{{$commenceDate}}</span>.</p>
                <p>Thanks as we expect you on that day!</p>
            </div>
        @else
            <div class="user-info">
                <h3 class="text-color-green">Hi {{Auth::user()->first_name}}!</h3>
                <p>You currently do not have any pending training. You may have exhausted your training period or no current training is available.</p>
                <p>Ensure that all previous trainings have been completed
                    <span class="text-color-green">100%</span>.</p>
                <p>You will be contacted shortly for next line of action.</p>
                <p>Thanks.</p>
            </div>
        @endif
    @endif

    </div>

    {{--Display Courses--}}
    @if(!$userCourses->isEmpty())
        <div class="dashboard-report w-100 mt-4">
            <div class="row p-2 text-center">
                <div class="col-12">
                    <h3>
                        <span class="text-color-green font-weight-bold">Trainings</span>
                    </h3>
                </div>
            </div>
            <div class="row">
                @each('users.partials.course-card', $userCourses, 'course', 'empty')
                <div class="col-12 text-right my-3">
                    <a href="{{ route('userscourses') }}" class="my-button-gray">See all Trainings</a>
                </div>
            </div>

        </div>
    @endif

    {{--No users and recent course--}}
    @if($userCourses->isEmpty())
        <div class="w-100 mt-sm-4">
            <div class="row dashboard-welcome">
                <div class="col-12 text-center my-3">
                    <div class="d-inline-block">
                        <span class="first-welcome" style="display: none;">
                            We welcome you to the Biggest and All Encompass Business Empowerment Program, MYSUREBIZ.
                        </span>
                            <br>
                        <span class="second-welcome" style="display: none;">
                           Trainings will be available soonest. Just kick back and relax!
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{--Referral url--}}
    <div class="w-100 mt-3">
        <span class="access-student">Referral url</span>
        <span class="referral">
            {{ route('reg', ['type' => strtolower(Auth::user()->role), 'ref_by' => Auth::user()->ref_code]) }}
        </span>
    </div>
@endsection