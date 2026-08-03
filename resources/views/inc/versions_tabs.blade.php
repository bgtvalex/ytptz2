<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ Route::currentRouteName()=='versions' ? 'active' : null }}"
    href="{{ route('versions.index') }}">Журнал</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ Route::currentRouteName()=='version_add' ? 'active' : null }}"
    href="{{ route('version.create') }}">Добавить</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ strncmp(Route::currentRouteName(),'version_edit',11)==0 ? 'active' : null }}"
    href="{{ route('version_edit') }}">Изменить</a>
  </li>
</ul>