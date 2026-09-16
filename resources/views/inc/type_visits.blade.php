<ul class="nav nav-tabs">
  <h1 class="h2 px-2">Виды встреч</h1>
  <li class="nav-item">
    <a class="nav-link {{ Route::currentRouteName()=='type-visits.index' ? 'active' : null }}"
    href="{{ route('type-visits.index') }}">Виды</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ Route::currentRouteName()=='version_add' ? 'active' : null }}"
    href="{{ route('version.create') }}">Добавить</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ strncmp(Route::currentRouteName(),'version_edit',11)==0 ? 'active' : null }}"
    href="">Изменить</a>
  </li>
</ul>