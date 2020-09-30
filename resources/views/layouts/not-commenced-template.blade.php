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
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown d-xl-inline-block user-dropdown"
                    style="border-left: unset; border-right: unset;"
                >
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
            </ul>
        </div>

    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper users-main">

        <!-- partial -->


        <!-- partial -->
        <div class="main-panel" style="width: 100%;">
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