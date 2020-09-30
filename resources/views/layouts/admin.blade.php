<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="ACC2gbjJTPDkzkD9lHaqBk7eVKM86gaiC8Ui6bWh">

    <title>DatingEvents</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container flex-end">
                <button data-toggle="collapse" data-target="#navbarSidebar" aria-controls="navbarSidebar" aria-expanded="false" class="navbar-toggler admin d-inline-block d-md-none"><span class="navbar-toggler-icon"></span></button>
                <a class="navbar-brand admin" href="index.html">
                    DatingEvents
                </a>
                <button class="navbar-toggler pull-right" type="button" data-toggle="collapse" data-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarMain">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                                                <li class="nav-item">
                            <a class="nav-link" href="login.html">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.html">Register</a>
                        </li>
                                            </ul>
                </div>
            </div>
        </nav>

        <main role="main" class="container-fluid">
            <div class="row">
                <nav class="col-md-3 col-lg-2 col-6 col-sm-4 p-0 d-md-block bg-gray sidebar collapse navbar-collapse" id="navbarSidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link pl-5 active" href="index.html">
                                    <i class="mr-2 fa fa-dashboard"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-5 " href="http://datingevents.dd/cases/all">
                                    <i class="mr-2 fa fa-calendar"></i> Events
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-5 " href="http://datingevents.dd/cases">
                                    <i class="mr-2 fa fa-users"></i> Users
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-5 " href="http://datingevents.dd/registry">
                                    <i class="mr-2 fa fa-book"></i> Bookings
                                </a>
                            </li>
                        </ul>

                        <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted">
                            <span>Saved reports</span>
                            <a class="d-flex align-items-center text-muted" href="#">
                            </a>
                        </h6>
                        <ul class="nav flex-column mb-2">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Current month
                                </a>
                            </li>
                        </ul> -->
                    </div>
                </nav>

                <div class="col-md-9 ml-sm-auto col-lg-10 p-4">
                    <div class="container">
    <div class="row justify-content-center dashboard">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <strong>SEARCH CASES</strong>
                    <span class="case-action">
                        <a class="btn btn-sm btn-success" href="http://datingevents.dd/cases/add">
                            <i class="fa fa-plus"></i> Add
                        </a>
                    </span>
                </div>

                <div class="card-body">

                                    </div>
            </div>
        </div>
    </div>
</div>
                </div>
            </div>
        </main>
        <footer class="bg-dark">
            <div class="container">
                <p class="copy">&copy; 2018, Dating Events</p>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="js/app.js"></script>
    </body>
</html>
