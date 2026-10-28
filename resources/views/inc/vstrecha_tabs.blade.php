<ul class="nav nav-tabs">
  <h1 class="h2 px-2">Встречи</h1>
  <li>
    <a class="nav-link {{ Route::currentRouteName()=='vstrecha_all' ? 'active' : null }}" href="{{ route('vstrecha_all') }}">Список</a>
  </li>
  <li>
    <a class="nav-link {{ Route::currentRouteName()=='visits_table' ? 'active' : null }}" href="{{ route('visits_table') }}">Таблица</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ Route::currentRouteName()=='vstrecha_add' ? 'active' : null }}" href="{{ route('vstrecha_add') }}">Добавить</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ Route::currentRouteName()=='vstrecha_edit' ? 'active' : null }}" href="#">Изменить</a>
  </li>
</ul>