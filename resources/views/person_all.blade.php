@extends('layouts.app')


@section('page-title')
Сведения об аудитории
@endsection


@section('content')

<!-- mTODO: https://codepen.io/massimo-cassandro/pen/NqRmMe -->
<table class="table table-striped table-hover mt-4 mb-6 table-responsive">
  <tbody class="table-striped">
    <tr>
      <th scope="col">#</th>
      <th scope="col">ФИО</th>
      <th scope="col">Контакты</th>
      <th scope="col">Место рождения</th>
      <th scope="col">Дата рождения</th>
      <th scope="col"> </th>
    </tr> <!-- {{ $i=0 }} -->
    @if (empty($data))
    <div class="alert alert-warning" role="alert">Нет данных.</div>
    @else
    @foreach($data as $person_)
      <tr class="align-middle" 
        @if ($person_->pol_id == 2) 
          style="color: #33CCCC;" 
        @elseif ($person_->pol_id == 3) 
          style="color: #EE6B9C;" 
        @else ($person_->pol_id == 0) 
          style="color: black;"
        @endif
      >
        <td>{{ ++$i }}</td>
        <td >
        @if ($person_->pol_id == 2)
        <svg width="16" height="16" fill="#33CCCC" viewBox="-160 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M96 0c35.346 0 64 28.654 64 64s-28.654 64-64 64-64-28.654-64-64S60.654 0 96 0m48 144h-11.36c-22.711 10.443-49.59 10.894-73.28 0H48c-26.51 0-48 21.49-48 48v136c0 13.255 10.745 24 24 24h16v136c0 13.255 10.745 24 24 24h64c13.255 0 24-10.745 24-24V352h16c13.255 0 24-10.745 24-24V192c0-26.51-21.49-48-48-48z"/></svg>
        @elseif ($person_->pol_id == 3)
        <svg width="16" height="16" fill="#EE6B9C" viewBox="-128 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c35.346 0 64 28.654 64 64s-28.654 64-64 64c-35.346 0-64-28.654-64-64S92.654 0 128 0m119.283 354.179l-48-192A24 24 0 0 0 176 144h-11.36c-22.711 10.443-49.59 10.894-73.28 0H80a24 24 0 0 0-23.283 18.179l-48 192C4.935 369.305 16.383 384 32 384h56v104c0 13.255 10.745 24 24 24h32c13.255 0 24-10.745 24-24V384h56c15.591 0 27.071-14.671 23.283-29.821z"/></svg>
        @elseif ($person_->pol_id == 1)
        <span>*</span>
        @endif
        @if ($person_->active == 0)
          <i> {{ $person_->fio }} (гость)</i>
          <div class="ms-1 dropdown dropend d-inline">
            <button class="btn btn-outline-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-clock-history"></i>
            </button>
            <div class="dropdown-menu p-0">
              <div class="dropdown-header p-1 m-1 border-bottom"><span class="fw-bold text-dark">Последняя активность гостя:</span></div>
              <div class="dropdown-body ps-2" style="width: 18rem;">
              @foreach($guests as $guest)
                @if($guest->id == $person_->id)
                  @foreach($guest->visits as $guest_visit)
                  <div>{{ $guest_visit->data_vstrechi }}, {{ $guest_visit->tip_vstrechi }} "{{ $guest_visit->theme_vstrechi }}"
                    @if ($guest_visit->place_vstrechi != "")
                      (<i class="bi bi-geo-alt-fill text-danger"></i>{{ $guest_visit->place_vstrechi }})</div>
                    @endif
                  @endforeach
                @endif
              @endforeach
              </div>
            </div>
          </div>
        @else
          {{ $person_->fio }}
        @endif
        @if ($person_->is_leader == 1)
        <span class="badge text-bg-secondary"><i class="bi bi-star-fill"></i></span>@endif
        @if ($person_->comments != "")
        <button type="button" class="btn p-0 text-secondary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="{{ $person_->comments }}"><i class="bi bi-chat-left-dots"></i></button>@endif
        </td>
        <td>@if ($person_->telefon != "")
          <a type="button" href="tel:{{ $person_->telefon }}" role="button" class="btn btn-outline-success">
            <i class="bi bi-telephone-outbound-fill"></i> 
          </a>@endif
          @if ($person_->socials != "")
          <a type="button" href="{{ $person_->socials }}" role="button" class="btn btn-outline-success">
            <i class="bi bi-telegram"></i>
          </a>
          @endif
        </td>

        <td >{{ $person_->mesto_rozhd }}</td>
        <td >
          {{ $person_->data_rozhd }}
          @if ($person_->data_rozhd != "")
          ({{ floor((time() - strtotime($person_->data_rozhd))/31536000) }})
          @endif
        </td>
        <td><a href="{{ route('person_edit', $person_->id) }}"><button type="button" class="btn btn-outline-info"><i class="bi bi-pencil-fill"></i></button></a> </td>
      </tr>
    @endforeach
    @endif
</table>

<script>
  const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
  const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

  var tooltipTriggerList = Array.prototype.slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl);
})
</script>

@endsection