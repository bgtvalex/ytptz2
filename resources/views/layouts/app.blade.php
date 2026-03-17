<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>YTPTZ :: @yield('page-title')</title>

  @include('inc.headlinks')

</head>

<body>

  <!-- header -->
  @include('inc.header')


  <div class="container-fluid">
    <div class="row">

      <!-- aside -->
      @include('inc.aside')

      <main class="col-lg-10 ms-sm-auto col-xl-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">@yield('page-title')</h1>
        </div>


        @include('inc.person_tabs')
        
        @include('inc.messages')

        @yield('content')

      </main>


    </div>
  </div>

  @include('inc.svg_person')
  <!-- footer -->
  @include('inc.footer')

  <livewire:scripts />
</body>
</html>