<ul class="nav nav-tabs">
  <h1 class="h2 px-2">Встречи</h1>
  <li class="nav-item">
    <a class="nav-link {{ Route::currentRouteName()=='vstrecha_add' ? 'active' : null }}" href="{{ route('vstrecha_add') }}">Добавить встречу</a>
  </li>
  <li>
    <a class="nav-link {{ Route::currentRouteName()=='vstrecha_all' ? 'active' : null }}" href="{{ route('vstrecha_all') }}">Все встречи</a>
  </li>
  <!-- todo -->
  <li>
    <a class="nav-link {{ Route::currentRouteName()=='visits_table' ? 'active' : null }}" href="{{ route('visits_table') }}">Таблица посещений</a>
  </li>
</ul>