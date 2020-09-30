<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="description" content="mysurebiz - A reliable student investment and skill acquisition centre. Startup that dream business of yours as soon as you leave university.">
    {{--<meta name="keywords" content="education,school,university,educational,student investment, investment,teaching,workshop">--}}
    <meta name="author" content="Mysurebiz" />

    <!-- Page Title -->

    <!-- Favicon and Touch Icons -->
    <link href="{{ asset('front-end/images/favicon.png') }}" rel="shortcut icon" type="image/png">
    <link href="http://mysurebiz.com/public/images/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="http://mysurebiz.com/public/images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
    <link href="http://mysurebiz.com/public/images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
    <link href="http://mysurebiz.com/public/images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

    <!-- Stylesheet -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('front-end/css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('front-end/css/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('front-end/css/css-plugin-collections.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('vendors/iconfonts/simple-line-icon/css/simple-line-icons.css') }}">

    <!-- CSS | menuzord megamenu skins -->
    <link href="{{ asset('front-end/css/menuzord-megamenu.css') }}" rel="stylesheet"/>
    <link href="{{ asset('front-end/css/menuzord-skins/menuzord-boxed.css') }}" rel="stylesheet" id="menuzord-menu-skins"/>

    <!-- CSS | Main style file -->
    <link href="{{ asset('front-end/css/style-main.css') }}" rel="stylesheet" type="text/css">

    <!-- CSS | Preloader Styles -->
    <link href="{{ asset('front-end/css/preloader.css') }}" rel="stylesheet" type="text/css">

    <!-- CSS | Custom Margin Padding Collection -->
    <link href="{{ asset('front-end/css/custom-bootstrap-margin-padding.css') }}" rel="stylesheet" type="text/css">

    <!-- CSS | Responsive media queries -->
    <link href="{{ asset('front-end/css/responsive.css') }}" rel="stylesheet" type="text/css">

    <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
    <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->
    <!-- CSS | Theme Color -->
    <link href="{{ asset('front-end/css/colors/theme-skin-color-set1.css') }}" rel="stylesheet" type="text/css">
    @yield('extraCss')
    <!-- Page Title -->
    <title>Mysurebiz - @yield('title')</title>

</head>

<body>
<div id="wrapper" class="container-fluid">

    <div id="preloader">
        <div id="spinner">
            <img alt="" src="{{asset('front-end/images/preloaders/5.gif')}}">
        </div>
        <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
    </div>

    <div class="main-content">
        <div class="text-center w-100">
            <h3 class="mt-4">@yield('title')</h3>
        </div>
        <section>
            @yield('main')
        </section>
    </div>
    <!-- end main-content -->

    <!-- Footer -->
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>		</div>

<script src="{{ asset('js/app.js') }}"></script>

<script src="{{ asset('front-end/js/jquery-plugin-collection.js') }}"></script>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<script src="{{ asset('front-end/js/custom.js') }}"></script>
@yield('extraScript')
</body>

</html>