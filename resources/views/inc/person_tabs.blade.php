<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ Route::currentRouteName()=='person_all' ? 'active' : null }}"
    href="{{ route('person_all') }}">Общий список</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ Route::currentRouteName()=='person_add' ? 'active' : null }}"
    href="{{ route('person_add') }}">Добавить персону</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ strncmp(Route::currentRouteName(),'person_edit',11)==0 ? 'active' : null }}"
    href="{{ route('person_edit_page') }}">Изменить инфо о персоне</a>
  </li>
</ul>