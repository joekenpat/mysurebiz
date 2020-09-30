<li class="sidebar-title p-2 text-center">Lessons Progress</li>
@forelse($lessons as $singlelesson)
    <li class="nav-item">
        <a class="nav-link"
           @if($singlelesson->eligible)
                href="{{ route('userslesson', ['id' => $singlelesson->id]) }}"
           @endif
        >
            @if($singlelesson->start && $singlelesson->video_progress && $singlelesson->assignment_progress)
                <span class="d-inline-block mr-2"><i class="menu-icon icon-check" data-toggle="tooltip" data-placement="top" title="Completed"></i></span>
            @elseif($singlelesson->start)
                <span class="d-inline-block mr-2"><i class="menu-icon-progress icon-star" data-toggle="tooltip" data-placement="top" title="In progress"></i></span>
            @else
                <span class="d-inline-block mr-2"><i class="menu-icon-progress menu-icon-not-taken icon-diamond" data-toggle="tooltip" data-placement="top" title="Not taken"></i></span>
            @endif
            <div class="menu-title"
                 @if(!$singlelesson->eligible)
                     title="This lesson is not yet available."
                @endif
            >{{ $singlelesson->title }}</div>
        </a>
    </li>
@empty
    <li class="nav-item text-center text-white py-2">No Lesson In this training yet.</li>
@endforelse
    <li class="nav-item">
        <a class="nav-link"
            @if($isProject)
                href="{{ route('finalproject', ['courseid' => $courseid]) }}"
            @endif
        >
            @if($courseAssignmentProgress)
                <span class="d-inline-block mr-2"><i class="menu-icon icon-check" data-toggle="tooltip" data-placement="top" title="Completed"></i></span>
           @else
                <span class="d-inline-block mr-2"><i class="menu-icon-progress menu-icon-not-taken icon-diamond" data-toggle="tooltip" data-placement="top" title="Not taken"></i></span>
            @endif
            <div class="menu-title"
                 @if(!$isProject)
                  title="Final project is not yet available."
                 @endif
            >Final Project</div>
        </a>
    </li>