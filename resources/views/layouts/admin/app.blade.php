<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Creative Tim">
    <title>@yield('title') | EDE Laboratory</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/brand/favicon.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
    <!-- Page plugins -->
    @stack('css')    
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/argon.css?v=1.1.0')}}" type="text/css">
</head>

<body>
    <!-- Sidenav -->
    @include('layouts.admin.sidebar')
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        @include('layouts.admin.navbar')
        <!-- Header -->        
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    @yield('header')                    
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            @yield('content')
            <!-- Footer -->
            @include('layouts.admin.footer')
        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
    <!-- Optional JS -->
    @stack('js')
    <script src="{{asset('assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
    <!-- Argon JS -->
    <script src="{{asset('assets/js/argon.js?v=1.1.0')}}"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="{{asset('assets/js/demo.min.js')}}"></script>
</body>

</html>