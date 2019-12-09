<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/app.css">

    <title>@yield('title')</title>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="/">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item @yield('navhomeactive')">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item @yield('navaboutactive')">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item @yield('navservicesactive')">
                        <a class="nav-link" href="/service">Services</a>
                    </li>
                    <li class="nav-item @yield('navdataactive')">
                        <a class="nav-link" href="/data">Data</a>
                    </li>
                    <li class="nav-item @yield('navstudentactive')">
                        <a class="nav-link" href="/student">Student</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    @yield('content')
    <!-- End Page Content -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/app.js"></script>
</body>

</html>