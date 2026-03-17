<!doctype html>
<html class="h-100 d-flex align-content-center flex-wrap" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>YTPTZ :: @yield('page-title')</title>

        @include('inc.headlinks')
        
    </head>

    <body class="w-100">

        <div class="container-fluid mt-6">
        <div class="row">

        <main class="col-12 ms-sm-auto px-md-4">

        @yield('content')

        </main>


        </div>
        </div>
    </body>
</html>