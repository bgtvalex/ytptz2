<ul class="nav nav-tabs">
  <h1 class="h2 px-2">Персоны</h1>
  <li class="nav-item">
    <a class="nav-link {{ Route::currentRouteName()=='person_all' ? 'active' : null }}"
    href="{{ route('person_all') }}">Cписок</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ Route::currentRouteName()=='person_add' ? 'active' : null }}"
    href="{{ route('person_add') }}">Добавить</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ strncmp(Route::currentRouteName(),'person_edit',11)==0 ? 'active' : null }}"
    href="{{ route('person_edit_page') }}">Изменить</a>
  </li>
</ul>