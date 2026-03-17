<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ Route::currentRouteName()=='leaders_all' ? 'active' : null }}"
    href="{{ route('leaders_all') }}">Все лидеры и служители</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ Route::currentRouteName()=='leaders_add' ? 'active' : null }}"
    href="{{ route('leaders_add') }}">Добавить лидера</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ Route::currentRouteName()=='leaders_edit' ? 'active' : null }}"
    href="{{ route('leaders_edit') }}">Редактировать лидера</a>
  </li>
</ul>