<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> Mysurebiz - @yield('title') </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/iconfonts/simple-line-icon/css/simple-line-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.addons.css') }}">
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/appstyle.css') }}">
  @yield('extraCss')
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />

</head>

<body>
<div class="alert-wrapper w-100 d-none"></div>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}">
          <img src="{{ asset('images/mysurebizlogo.png') }}" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}">
          <img src="{{ asset('images/favicon.png') }}" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav d-none d-md-block">
          <li class="nav-item btn btn-success add-courses">
            <a class="nav-link " href="{{ route('addcourse') }}">
                  <i class="icon-plus"></i> Add Training
            </a>
          </li>
        </ul>
          <ul class="navbar-nav d-none d-md-block">
              <li class="nav-item btn btn-success add-courses">
                  <a class="nav-link " href="{{ route('addlesson') }}">
                      <i class="icon-plus"></i> Add Lesson
                  </a>
              </li>
          </ul>
          <ul class="navbar-nav d-none d-md-block">
              <li class="nav-item btn btn-success add-courses">
                  <a class="nav-link " href="{{route('sendemail')}}">
                      <i class="icon-envelope"></i> Send Message
                  </a>
              </li>
          </ul>
        <ul class="navbar-nav navbar-nav-right">
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
              <a href="{{ route('userschangepassword') }}" class="dropdown-item">
                Change Password
              </a>
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
              <a href="{{ route('notifications') }}" class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have {{ $totalNotifications }} notifications
                </p>
                <span class="badge badge-pill badge-warning float-right">View all</span>
              </a>
                @if(!$uniqueCourses->isEmpty())
                  @foreach($uniqueCourses as $uniqueCourse)
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('assignments-page', ['category' => 'course', 'id' => $uniqueCourse->course_id]) }}" class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-success">
                          {{$allCourseProjects->where('course_id', $uniqueCourse->course_id)
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
                <a href="{{ route('assignments-page', ['category' => 'lesson', 'id' => $uniqueLesson->lesson_id]) }}" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      {{$allLessonAssignments->where('lesson_id', $uniqueLesson->lesson_id)
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
          <li class="nav-item dropdown color-setting d-none d-lg-block">
            <a class="nav-link count-indicator" href="{{ route('logout') }}"
            onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">

              <i class="mdi mdi-logout"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
     
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      
      <nav class="sidebar sidebar-offcanvas sidebar-dark" id="sidebar">
          <div id="sidebarcontent">
        <ul class="nav">
            <li class="nav-item nav-profile d-xl-none">
              @if(Auth::user()->image)
                <img class="img-xs rounded-circle" src="{{ asset('storage/'.Auth::user()->image) }}" alt="Profile image">
              @else
                <img class="img-xs rounded-circle" src="{{ asset('images/blank-profile-photo.png') }}" alt="Profile image">
              @endif
                <p class="text-center font-weight-medium">{{ $user->first_name }} {{ $user->last_name }}</p>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="menu-icon icon-diamond"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link" href="{{ route('addcourse') }}">
              <i class="menu-icon icon-plus"></i>
              <span class="menu-title">Add Training</span>
            </a>
          </li>
            <li class="nav-item d-md-none">
                <a class="nav-link" href="{{ route('addlesson') }}">
                    <i class="menu-icon icon-plus"></i>
                    <span class="menu-title">Add Lesson</span>
                </a>
            </li>
            <li class="nav-item d-md-none">
                <a class="nav-link " href="{{route('sendemail')}}">
                    <i class="menu-icon icon-pencil"></i>
                    <span class="menu-title">Send Message</span>
                </a>
            </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#account-dropdown" aria-expanded="false" aria-controls="apps-dropdown">
              <i class="menu-icon icon-wrench"></i>
              <span class="menu-title">Manage Accounts</span>
            </a>
            <div class="collapse" id="account-dropdown">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('manage-account') }}">All</a>
                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('manage-account', ['type' => 'students']) }}">Students</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('manage-account', ['type' => 'artisans']) }}">Artisans</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('manage-account', ['type' => 'employees']) }}">Employees</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('manage-account', ['type' => 'admins']) }}">Admins</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#course-dropdown" aria-expanded="false" aria-controls="apps-dropdown">
              <i class="menu-icon icon-book-open"></i>
              <span class="menu-title">Trainings</span>
            </a>
            <div class="collapse" id="course-dropdown">
              <ul class="nav flex-column sub-menu">
                @foreach($businessCategories as $businessCategory)
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('courses', ['business_category_id' => $businessCategory->id]) }}">
                      {{ $businessCategory->name }}
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#assignment-dropdown" aria-expanded="false" aria-controls="apps-dropdown">
              <i class="menu-icon icon-doc"></i>
              <span class="menu-title">Assignments</span>
            </a>
            <div class="collapse" id="assignment-dropdown">
              <ul class="nav flex-column sub-menu">
                  @foreach($businessCategories as $businessCategory)
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('assignments', ['business_category_id' => $businessCategory->id]) }}">
                              {{ $businessCategory->name }}
                          </a>
                      </li>
                  @endforeach
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ebook-dropdown" aria-expanded="false" aria-controls="apps-dropdown">
              <i class="menu-icon icon-doc"></i>
              <span class="menu-title">Ebooks</span>
            </a>
            <div class="collapse" id="ebook-dropdown">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('admin-ebooks') }}">
                    Manage
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('ebook-sales') }}">
                    Sales
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('library') }}" aria-expanded="false" aria-controls="apps-dropdown">
              <i class="menu-icon icon-docs"></i>
              <span class="menu-title">Library</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('adminmessages') }}" aria-expanded="false" aria-controls="apps-dropdown">
              <i class="menu-icon icon-envelope"></i>
              <span class="menu-title">Messages</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('payments') }}" aria-expanded="false" aria-controls="apps-dropdown">
              <i class="menu-icon icon-calculator"></i>
              <span class="menu-title">Keep Report</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('edit-welcome-note') }}" aria-expanded="false" aria-controls="apps-dropdown">
              <i class="menu-icon icon-pencil"></i>
              <span class="menu-title">Edit Welcome Note</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('batches') }}" aria-expanded="false" aria-controls="apps-dropdown">
              <i class="menu-icon icon-list"></i>
              <span class="menu-title">Batches</span>
            </a>
          </li>

          <li class="nav-item d-lg-none">
              <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                <i class="menu-icon icon-logout"></i>
                <span class="menu-title">Logout</span>
              </a>
            </li>
            
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
            {{--<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center footer-socials">Connect with CeePost --}}
              {{--<!-- <i class="mdi mdi-heart-outline text-danger"></i> -->--}}
              {{--<i class="icon-social-facebook"></i>--}}
              {{--<i class="icon-social-google"></i>--}}
              {{--<i class="icon-social-twitter"></i>--}}
              {{--<i class="icon-social-instagram"></i>--}}
            {{--</span>--}}
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  {{--<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>--}}
  {{--<script src="{{ asset('vendors/js/vendor.bundle.addons.js') }}"></script>--}}
  {{--<script src="{{ asset('js/off-canvas.js') }}"></script>--}}
<script src="{{ asset('js/app.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->

  {{--<script src="js/hoverable-collapse.js"></script>--}}
<script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/misc.js') }}"></script>
<script src="{{ asset('js/appjs.js') }}"></script>
@yield('extraScript')
  {{--<script src="js/settings.js"></script>--}}
  {{--<script src="js/todolist.js"></script>--}}
{{--<script src="js/dashboard.js"></script>--}}
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
  <!-- Custom js-->
  <!-- <script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/datePicker.js"></script> -->
<!-- <script type="text/javascript" src="js/jqDatePicker.js"></script> -->
  <!-- <script type="text/javascript" src="js/datePicker.min.js"></script> -->
  
  <!-- <script type="text/javascript" src="js/year.js"></script>
<script type="text/javascript" src="js/month.js"></script>
<script type="text/javascript" src="js/week.js"></script> -->
  <!-- End custom js->
</body>

</html>