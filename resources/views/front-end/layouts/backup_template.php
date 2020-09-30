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

<body class="">
<div id="wrapper" class="clearfix">
    <!-- preloader -->
    <div id="preloader">
        <div id="spinner">
            <img alt="" src="{{ asset('front-end/images/preloaders/5.gif') }}">
        </div>
        <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
    </div>
    <!-- Header -->
    <header id="header" class="header">
        <div class="header-nav">
            <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
                <div class="container">
                    <nav id="menuzord-right" class="menuzord default">
                        <a class="menuzord-brand pull-left flip mt-sm-10 mb-sm-20" href="../home.html">
                            <img src="{{ asset('front-end/images/mysurebizlogo.png') }}" style="position: absolute; width: 100px;height: 100px;">
                        </a>
                        <ul class="menuzord-menu">
                            <li class="active"><a href="../home.html">Home</a></li>
                            <li><a href="../mysurebiz-features.html">Features</a></li>
                            <li><a href="../faq.html">Faq</a></li>
                            <li><a href="../mysurebiz-gallery.html">Gallery</a></li>
                            <li><a href="../blog.html">Blog</a></li>
                            <li><a href="../jobs.html">Career</a></li>
                            <li><a href="../contact-us.html">Contact</a></li>
                            <li>
                                <a>Our Company</a>
                                <ul class="dropdown">
                                    <li><a href="../about-mysurebiz.html">About Us</a></li>
                                    <li><a href="../objectives.html">Our Manifesto</a></li>
                                </ul>
                            </li>
                            <li>
                                <a>Account</a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('registration') }}">Register</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>		<!-- Start main-content -->
    <div class="main-content">
        <!-- Section: inner-header -->
        <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="http://mysurebiz.com/public/images/bg/bg1.jpg">
            <div class="container pt-120 pb-60">
                <!-- Section Content -->
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="text-theme-colored2 font-36">
                                @yield('jumbotron-title')
                            </h2>
                            <ol class="breadcrumb text-left mt-10 white">
                                <li>
                                    <a href="/">Home</a>
                                </li>
                                <li class="active">
                                    @yield('action')
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            @yield('main')
        </section>
    </div>
    <!-- end main-content -->

    <!-- Footer -->
    <footer id="footer" class="footer" data-bg-color="#212331">
        <div class="container pt-70 pb-40 col-md-offset-2">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark">
                        <img class="mt-5 mb-20" alt="Logo will appear here " src="{{ asset('front-end/images/mysurebizlogo.png') }}">
                        <p>Lagos, Nigeria.</p>
                        <ul class="list-inline mt-5">
                            <li class="m-0 pl-10 pr-10">
                                <i class="fa fa-phone text-theme-color-2 mr-5"></i>
                                <a class="text-gray" href="register.blade.php#">08030813841</a>
                            </li>
                            <li class="m-0 pl-10 pr-10">
                                <i class="fa fa-envelope-o text-theme-color-2 mr-5"></i>
                                <a class="text-gray" href="register.blade.php#">info@mysurebiz.com</a>
                            </li>
                            <li class="m-0 pl-10 pr-10">
                                <i class="fa fa-globe text-theme-color-2 mr-5"></i>
                                <a class="text-gray" href="register.blade.php#">www.mysurebiz.com</a>
                            </li>
                        </ul>
                        <ul class="styled-icons icon-sm icon-bordered icon-circled clearfix mt-10">
                            <li><a href="register.blade.php#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="register.blade.php#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="register.blade.php#"><i class="fa fa-vk"></i></a></li>
                            <li><a href="register.blade.php#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="register.blade.php#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark">
                        <h4 class="widget-title line-bottom-theme-colored-2">Useful Links</h4>
                        <ul class="angle-double-right list-border">
                            <li><a href="../home.html">Home Page</a></li>
                            <li><a href="../about-mysurebiz.html">About Us</a></li>
                            <li><a href="../objectives.html">Our Manifesto</a></li>
                            <li><a href="../about-mysurebiz.html">Terms and Conditions</a></li>
                            <li><a href="../faq.html">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark">
                        <h4 class="widget-title line-bottom-theme-colored-2">Blog</h4>
                        <div class="latest-posts">
                            <article class="post media-post clearfix pb-0 mb-10">
                                <a class="post-thumb" href="register.blade.php#"><img src="https://placehold.it/80x55" alt=""></a>
                                <div class="post-right">
                                    <h5 class="post-title mt-0 mb-5"><a href="register.blade.php#">5 Ways to Raise Capital That You Need</a></h5>
                                    <p class="post-date mb-0 font-12">Apr 09, 2018</p>
                                </div>
                            </article>
                            <article class="post media-post clearfix pb-0 mb-10">
                                <a class="post-thumb" href="register.blade.php#"><img src="https://placehold.it/80x55" alt=""></a>
                                <div class="post-right">
                                    <h5 class="post-title mt-0 mb-5"><a href="register.blade.php#">How To Carry Out Start-Up Financial Management</a></h5>
                                    <p class="post-date mb-0 font-12">May 08, 2018</p>
                                </div>
                            </article>
                            <article class="post media-post clearfix pb-0 mb-10">
                                <a class="post-thumb" href="register.blade.php#"><img src="https://placehold.it/80x55" alt=""></a>
                                <div class="post-right">
                                    <h5 class="post-title mt-0 mb-5"><a href="register.blade.php#">Entrepreneurship Myths Debunked</a></h5>
                                    <p class="post-date mb-0 font-12">May 15, 2018</p>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="footer-bottom" data-bg-color="#2b2d3b">
    <div class="container pt-20 pb-20">
        <div class="row">
            <div class="col-md-6">
                <p class="font-12 text-black-777 m-0 sm-text-center">Copyright &copy;2017 Mysurebiz. All Rights Reserved</p>
            </div>
            <div class="col-md-6 text-right">
                <div class="widget no-border m-0">
                    <ul class="list-inline sm-text-center mt-5 font-12">
                        <li ><a class="text-theme-colored2" href="http://mysurebiz.com/student/mysurebiz-faq.html">FAQ</a></li>
                        <li>|</li>
                        <li><a class="text-theme-colored2" href="../contact-us.html">Contact us</a></li>
                        <li>|</li>
                        <li><a class="text-theme-colored2" href="register.blade.php#">Support</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</footer>
<a class="scrollToTop" href="register.blade.php#"><i class="fa fa-angle-up"></i></a>		</div>
<!-- end wrapper -->


<!-- external javascripts -->
{{--<script src="{{ asset('front-end/js/bootstrap.min.js') }}"></script>--}}
<script src="{{ asset('js/app.js') }}"></script>
{{--<script src="{{ asset('front-end/js/jquery-2.2.4.min.js') }}"></script>--}}
{{--<script src="{{ asset('front-end/js/jquery-ui.min.js') }}"></script>--}}


<!-- JS | jquery plugin collection for this theme -->
<script src="{{ asset('front-end/js/jquery-plugin-collection.js') }}"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="{{ asset('front-end/js/custom.js') }}"></script>
@yield('extraScript')
</body>

</html>