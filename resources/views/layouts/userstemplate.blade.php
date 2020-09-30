<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Mysurebiz - @yield('title') </title>
    <link rel="stylesheet" href="{{ asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/iconfonts/simple-line-icon/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.addons.css') }}">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/appstyle.css') }}">
    @yield('extraCss')
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />

</head>

<body>
<div class="alert-wrapper w-100 d-none"></div>

<div class="container-scroller">
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
            <a class="navbar-brand brand-logo" href="{{ route('usersdashboard') }}">
                <img src="{{ asset('images/mysurebizlogo.png') }}" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="{{ route('usersdashboard') }}">
                <img src="{{ asset('images/favicon.png') }}" alt="logo" />
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav d-none d-md-block">
                <li class="nav-item btn btn-success add-courses">
                    <a class="nav-link " href="{{ route('userscourses') }}">
                        <i class="icon-book-open"></i> Trainings
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav d-none d-md-block">
                <li class="nav-item btn btn-success add-courses">
                    <a class="nav-link " href="{{ route('userslibrary') }}">
                        <i class="icon-docs"></i> Library
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav d-none d-md-block">
                <li class="nav-item btn btn-success add-courses">
                    <a class="nav-link " href="{{ route('ebooks') }}">
                        <i class="icon-list"></i> Ebooks
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav navbar-nav-right">
                @if(Auth::check())
                    <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <div class="dropdown-toggle-wrapper">
                                <div class="inner">
                                    @if(Auth::user()->image)
                                        <img class="img-xs rounded-circle" src="{{ asset('storage/'.Auth::user()->image) }}" alt="Profile image">
                                    @else
                                        <img class="img-xs rounded-circle" src="{{ asset('images/blank-profile-photo.png') }}" alt="Profile image">
                                    @endif
                                </div>
                                <div class="inner">
                                    <div class="inner">
                                        <span class="profile-text font-weight-bold">{{ Auth::user()->full_name }}</span>
                                        <small class="profile-text small">{{ Auth::user()->role }}</small>
                                    </div>
                                    <div class="inner">
                                        <div class="icon-wrapper">
                                            <i class="mdi mdi-chevron-down"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">

                            <a href="{{ route('welcome_note') }}" class="dropdown-item">
                                Welcome Note
                            </a>
                            <a href="{{ route('userspayment') }}" class="dropdown-item">
                                Penny Wise Report
                            </a>
                            <a href="{{ route('userschangepassword') }}" class="dropdown-item">
                                Change Password
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                Sign Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                            <i class="mdi mdi-bell-outline"></i>

                            @if(!($uniqueCourses->isEmpty() && $uniqueLessons->isEmpty()))
                                <span class="count">{{ $totalNotifications }}</span>
                            @endif
                        </a>


                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">

                            @if(!($uniqueCourses->isEmpty() && $uniqueLessons->isEmpty()))
                            <a href="{{ route('usersnotifications') }}" class="dropdown-item">
                                <p class="mb-0 font-weight-normal float-left">You have {{ $totalNotifications }} notifications
                                </p>
                                <span class="badge badge-pill badge-warning float-right">View all</span>
                            </a>
                            @if(!$uniqueCourses->isEmpty())
                                @foreach($uniqueCourses as $uniqueCourse)
                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('finalproject', ['id' => $uniqueCourse->course_id]) }}#Course-score-wrapper" class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-success">
                                                {{$allCourseScores->where('course_id', $uniqueCourse->course_id)
                                                ->count()}}
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject font-weight-medium text-dark">{{ $uniqueCourse->course_title }}</h6>
                                            <p class="font-weight-light small-text">
                                                Training
                                            </p>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                @endforeach
                            @endif

                            {{--Lesson Notifications--}}
                            @if(!$uniqueLessons->isEmpty())
                                @foreach($uniqueLessons as $uniqueLesson)
                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('userslesson', ['id' => $uniqueLesson->lesson_id]) }}#lesson-wrapper" class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-success">
                                                {{$allLessonScores->where('lesson_id', $uniqueLesson->lesson_id)
                                                ->count()}}
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject font-weight-medium text-dark">{{ $uniqueLesson->lesson_title }}</h6>
                                            <p class="font-weight-light small-text">
                                                Lesson
                                            </p>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                @endforeach
                            @endif
                        @else
                            <a class="dropdown-item preview-item">No notifications</a>
                        @endif
                        </div>

                    </li>
                    {{--Message Starts here--}}
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle count-indicator" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-email-outline"></i>
                        @if($unreadCount)
                            <span class="count">{{ $unreadCount }}</span>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                        <div class="dropdown-item">
                            <p class="mb-0 font-weight-normal float-left">You have {{$unreadCount}} unread messages
                            </p>
                            <a href="{{route('usersmessages')}}" class="badge badge-info badge-pill float-right">View all</a>
                        </div>
                    @forelse($messages->take(4) as $message)
                        <div class="dropdown-divider"></div>
                        <a href="{{route('usersmessage', ['id' => $message->id])}}"
                           class="dropdown-item preview-item {{($message->readmails === null) ? "unread" : ""}}">
                            <div class="preview-thumbnail">
                                <img src="{{ $message->image ? asset('storage/'.$message->image) : asset('images/blank-profile-photo.png') }}"
                                     alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                                <h6 class="preview-subject ellipsis font-weight-medium text-dark"> {{$message->subject}}
                                    <span class="float-right font-weight-light small-text">
                                        {{date('dS M, Y', strtotime($message->schedule))}}
                                    </span>
                                </h6>
                                <p class="font-weight-light small-text">
                                    {{$message->first_name}}
                                </p>
                            </div>
                        </a>
                    @empty
                        <a class="dropdown-item preview-item">No Message</a>
                    @endforelse
                    </div>
                </li>
                @endif
                {{--Message ends here--}}
                @if(Auth::check())
                    <li class="nav-item dropdown color-setting m-0 pt-1 pl-1 hide-353">
                        <div class="w-100 text-center mb-1 text-color-green"><span class="d-none d-sm-inline-block">Penny Wise</span> balance</div>

                        <a href="{{ route('addfunds') }}" class="my-button-green d-none d-sm-inline-block"><i class="icon-plus"></i>Pay Penny Wise</a>

                        <span class="my-button-gray d-inline-block balance-small-screen">&#8358;{{ number_format(Auth::user()->balance) }}</span>
                    </li>
                @else
                    <li class="nav-item dropdown color-setting m-0 pt-3 pl-1 hide-353">
                        {{--<div class="w-100 text-center mb-1 text-color-green"><span class="d-none d-sm-inline-block">Penny Wise</span> balance</div>--}}

                        <a href="{{ trim(env("APP_HOME_URL"),"/")."/register" }}" class="my-button-green d-none d-sm-inline-block"><i class="icon-arrow-right-circle"></i>Register</a>

                        <a href="{{ route('login') }}" class="my-button-gray d-inline-block balance-small-screen"><i class="icon-login"></i>Login</a>
                    </li>
                @endif
            </ul>
            {{--Here--}}
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper users-main">

        <!-- partial -->

        <nav class="sidebar sidebar-offcanvas sidebar-dark" id="sidebar">
            <div id="sidebarcontent">
                <ul class="nav">

                    <li class="nav-item mt-2 text-center d-md-none">
                        <a class="btn btn-success py-2 px-3" href="{{ route('userscourses') }}">
                            <i class="icon-book-open"></i> Trainings
                        </a>
                        <span class="d-block my-1">
                                <a class="btn btn-success py-2 px-3" href="{{ route('userslibrary') }}">
                                     <i class="icon-docs"></i> Library
                                </a>
                        </span>
                        <span class="d-block my-1">
                                <a class="btn btn-success py-2 px-3" href="{{ route('ebooks') }}">
                                     <i class="icon-list"></i> Ebooks
                                </a>
                        </span>

                        {{--<a class="btn btn-success py-2 px-3 d-sm-none" href="{{ route('addlesson') }}">--}}
                        {{--<i class="icon-plus"></i> Add funds--}}
                        {{--</a>--}}
                        @if(Auth::check())
                            <div class="w-100 text-center mb-1 text-color-green show-353-block d-none"><span class="d-inline-block">Penny Wise</span> balance</div>

                            <a href="{{ route('addfunds') }}" class="my-button-green d-inline-block d-sm-none w-75 addfund-sidebar mt-1"><i class="icon-plus"></i> Pay Penny Wise</a>

                            <span class="my-button-gray d-none show-353">&#8358;{{ number_format(Auth::user()->balance) }}</span>
                        @else
                            <a href="{{ trim(env("APP_HOME_URL"),"/")."/register" }}" class="my-button-green d-inline-block d-sm-none w-75 addfund-sidebar mt-1"><i class="icon-arrow-right-circle"></i> Register</a>

                            <a href="{{ route('login') }}" class="my-button-green d-inline-block d-sm-none w-75 addfund-sidebar mt-1 mb-3"><i class="icon-login"></i> Login</a>
                        @endif
                    </li>

                    <li class="nav-item nav-profile d-xl-none text-center">
                        @if(Auth::check())
                            @if(Auth::user()->image)
                                <img class="img-xs rounded-circle" src="{{ asset('storage/'.Auth::user()->image) }}" alt="Profile image">
                            @else
                                <img class="img-xs rounded-circle" src="{{ asset('images/blank-profile-photo.png') }}" alt="Profile image">
                            @endif
                            <p class="text-center font-weight-medium">{{ Auth::user()->full_name }}</p>
                        @endif
                    </li>

                    @yield('sidebar')

                    @if(Auth::check())
                        <li class="nav-item nav-profile d-xl-none text-center mt-1 pt-1">
                        {{--<a class="text-color-link" href="#">Manage account</a>--}}
                        <span class="d-block py-1">
                            <a href="{{ route('welcome_note') }}" class="text-color-link">
                                Welcome Note
                            </a>
                        </span>
                        <span class="d-block py-1">
                            <a class="text-color-link" href="{{ route('userspayment') }}">
                                Penny Wise Report
                            </a>
                        </span>
                        <span class="d-block py-1 pt-1">
                        <a class="text-color-link" href="{{ route('userschangepassword') }}">Change password</a>
                        </span>
                        <span class="d-block pb-2 pt-1 signout-span">
                            <a class="text-color-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">sign out
                            </a>
                        </span>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper @yield('extraClass')">

                @yield('content')

            </div>
            <!-- content-wrapper ends -->

            <footer class="footer">
                <div class="container-fluid clearfix text-center">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © <span class="year"></span>
              <a href="/" target="_blank">MYSUREBIZ</a>. All rights reserved.</span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/off-canvas.js') }}"></script>
<script src="{{ asset('js/misc.js') }}"></script>
<script src="{{ asset('js/appjs.js') }}"></script>
@yield('extraScript')
</body>

</html>