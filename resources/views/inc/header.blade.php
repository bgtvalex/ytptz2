@section('header')
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap space-between p-0 shadow">

  <button class="navbar-toggler d-lg-none collapsed" type="button"
    data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <a class="navbar-brand" href="{{ route('home') }}">
    <img src="/img/logo.png" alt="" width="36" height="36">
    YTPTZ
  </a>
   
<div class="navbar-nav">
  <div class="nav-item text-nowrap">
    <a class="nav-link px-3" href="{{ route('logout') }}">Выйти</a>
  </div>
</div>
</header>