@if($isLoggedIn)
<li class="sidebar-title p-2 text-center">Trainings</li>
@forelse($subscribedCourses as $subscribedCourse)
    <li class="nav-item {{ !$subscribedCourse->isCourseStarted ? "no-hover" : "" }}">
        <style>
            .no-hover a.nav-link{
                background: unset !important;
                cursor: auto !important;
            }
        </style>
        <a class="nav-link"
           href="{{ $subscribedCourse->isCourseStarted ?
           route('userscourse', ['name' => $subscribedCourse->url]) :
           '#' }}"
        >
            @if($subscribedCourse->completed)
                <span class="d-inline-block mr-2"><i class="menu-icon icon-check" data-toggle="tooltip" data-placement="top" title="Training Completed"></i></span>
            @elseif($subscribedCourse->isCourseStarted)
                <span class="d-inline-block mr-2"><i class="menu-icon-progress icon-star" data-toggle="tooltip" data-placement="top" title="Training in progress"></i></span>
            @else
                <span class="d-inline-block mr-2"><i class="text-muted not-started icon-ban" data-toggle="tooltip" data-placement="top" title="Training not due"></i></span>
            @endif
            <div class="menu-title">{{ $subscribedCourse->title }}</div>
        </a>
        <div class="training-progress-wrapper" data-toggle="tooltip" data-placement="top" title="Training progress report">
            <div class="training-progress"
                 style="width: {{$subscribedCourse->percentage}}%;
                         background-color: {{$subscribedCourse->color}}">
                {{$subscribedCourse->percentage}}%
            </div>
        </div>
    </li>
@empty
    <div class="text-center text-color-wheat">You are not enrolled into any training</div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('userscourses') }}">
            <span class="d-inline-block mr-2"><i class="menu-icon icon-arrow-right"></i></span>
            <div class="menu-title">Start a Training</div>
        </a>
    </li>
@endforelse
@else
<li class="sidebar-title p-2 text-center">Trainings</li>
<div class="text-center text-color-wheat">You are not enrolled into any training</div>
<li class="nav-item">
    <a class="nav-link" href="{{ route('userscourses') }}">
        <span class="d-inline-block mr-2"><i class="menu-icon icon-arrow-right"></i></span>
        <div class="menu-title">Start a Training</div>
    </a>
</li>
@endif