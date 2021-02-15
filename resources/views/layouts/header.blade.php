<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo')</title>


    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Chau+Philomene+One&display=swap" rel="stylesheet">

    <!-- CSS BOOTSTRAP-->
    <link href="{{ asset('layout/bootstrap/css/bootstrap4.min.css') }}" rel="stylesheet">
    <!-- CSS FONT-AWESOME-->
    <link href="{{ asset('layout/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    
    <!-- CSS-->
    <link href="{{ asset('layout/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">


</head>

<body>

    <!-- Top menu -->
    @include('layouts.nav')

    <!-- Top content -->
    <div class="top-content">
        <div class="container">

            @yield('contenido')

        </div>
    </div>


    <!-- Javascript -->
    <script src="{{ asset('layout/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('layout/bootstrap/js/bootstrap4.min.js') }}"></script>
    <script src="{{ asset('layout/js/jquery.backstretch.min.js') }}"></script>
    <script src="{{ asset('layout/js/retina-1.1.0.min.js') }}"></script>
    <script src="{{ asset('layout/js/scripts.js') }}"></script>
    {{-- ({{request()->is('/TuMenu') ? '': '' }}) --}}
    <script src="{{ asset('js/menu.js') }}"></script>
    
    

    <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

</body>

</html>
