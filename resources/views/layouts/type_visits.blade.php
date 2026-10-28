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

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        
        @include('inc.type_visits')

        @include('inc.messages')

        @yield('content')

      </main>


    </div>
  </div>
  <!-- footer -->
  @include('inc.footer')

  <livewire:scripts />
  
  @vite('resources/js/person_list.js')

<script>
  const dropdownElementList = document.querySelectorAll('.dropdown-toggle')
  const dropdownList = [...dropdownElementList].map(dropdownToggleEl => new bootstrap.Dropdown(dropdownToggleEl))
</script>
</body>
</html>