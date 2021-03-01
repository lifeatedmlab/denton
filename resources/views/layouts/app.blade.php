<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>@yield('title', 'EDE Laboratory') - EDE Laboratory</title>
    <!--    Bootstrap CSS-->
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" rel="stylesheet">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ asset('css/ede-custom.css')}}" rel="stylesheet">
</head>

<body>

    <div class="bg-image d-none d-sm-block">
        <img data-aos="fade-right" data-aos-duration="2000" id="img-left" src="{{ asset('images/img-left.png') }}">
        <img data-aos="fade-left" data-aos-duration="2000" id="img-right" src="{{ asset('images/img-right.png') }}">
    </div>

    <!--navbar-->
    @include('layouts.navbar')

    @yield('content')

    <!--footer-->
    @include('layouts.footer')



    <!-- Bootstrap JS-->
    <script crossorigin="anonymous" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

    </script>
</body>

</html>
