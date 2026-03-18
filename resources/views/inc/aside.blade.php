@section('aside')
<nav id="sidebarMenu" class="my-navigation col-md col-lg-2 d-lg-block bg-light sidebar collapse border-end mt-4 bg-secondary bg-gradient">
  <div class="position-sticky">
  
  <ul class="nav flex-column">
      <li class="nav-item bg-light bg-gradient">
        <a class="nav-link" href="#">
          <!-- Bootstrap -->
          <i class="bi bi-house-fill"></i>
          <span>Главная</span>
        </a>
      </li>

      <li><hr></li>

      <li class="nav-item">
        <a class="nav-link{{ Request::is('person/*') ? ' disable text-light bg-primary' : null }}" href="{{ route('person_add') }}"><i class="bi bi-person-vcard"></i> Персоны
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link{{ Request::is('vstrecha/*') || Request::is('vstrecha_*') ? ' disable text-light bg-primary' : null }}" aria-current="page" href="{{ route('vstrecha_add') }}"><i class="bi bi-calendar2-plus"></i> Встречи
        </a>
      </li>

      <li class="nav-item">
        <a class="disabled nav-link" href="#"><i class="bi bi-heart-pulse"></i> Мои подопечные
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link{{ Request::is('leaders/*') || Request::is('leaders_*') ? ' disable text-light bg-primary' : null }}" href="{{ route('leaders_all') }}"><i class="bi bi-star"></i> Лидеры и служители
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('leaders_all') }}"><i class="bi bi-calendar3"></i> Календарь
        </a>
      </li>
    </ul>


    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Socials:</span>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa-brands fa-telegram"></i> Чат #YOURTIMEPTZ
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa-brands fa-vk"></i> Чат актива
        </a>
      </li>
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Документация:</span>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-info-square"></i> О служении
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-book"></i> Руководство по работе с порталом
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('changelog') }}"><i class="bi bi-code-square"></i> Дневник разработки
        </a>
      </li>
    </ul>
  </div>
</nav>