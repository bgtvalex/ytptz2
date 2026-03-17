<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ Route::currentRouteName()=='vstrecha_add' ? 'active' : null }}" href="{{ route('vstrecha_add') }}">Добавить встречу</a>
  </li>
  <li>
    <a class="nav-link {{ Route::currentRouteName()=='vstrecha_all' ? 'active' : null }}" href="{{ route('vstrecha_all') }}">Все встречи</a>
  </li>
</ul>