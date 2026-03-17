@extends('layouts.leaders')


@section('page-title')
Все лидеры
@endsection


@section('content')

<table class="table table-striped table-hover mt-3 table-responsive">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ФИО</th>
      <th scope="col">Как связаться</th>
    </tr> <!-- {{ $i=0 }} -->
    @if (empty($data))
    <div class="alert alert-warning" role="alert">Нет данных.</div>
    @else
    @foreach($data as $persona)
      <tr class="align-middle">
        <td>{{ ++$i }}</td>
        <td >@if ($persona->pol_id == 2)
        <svg width="16" height="16" fill="#33CCCC" viewBox="-160 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M96 0c35.346 0 64 28.654 64 64s-28.654 64-64 64-64-28.654-64-64S60.654 0 96 0m48 144h-11.36c-22.711 10.443-49.59 10.894-73.28 0H48c-26.51 0-48 21.49-48 48v136c0 13.255 10.745 24 24 24h16v136c0 13.255 10.745 24 24 24h64c13.255 0 24-10.745 24-24V352h16c13.255 0 24-10.745 24-24V192c0-26.51-21.49-48-48-48z"/></svg>
        @elseif ($persona->pol_id == 3)
        <svg width="16" height="16" fill="#EE6B9C" viewBox="-128 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c35.346 0 64 28.654 64 64s-28.654 64-64 64c-35.346 0-64-28.654-64-64S92.654 0 128 0m119.283 354.179l-48-192A24 24 0 0 0 176 144h-11.36c-22.711 10.443-49.59 10.894-73.28 0H80a24 24 0 0 0-23.283 18.179l-48 192C4.935 369.305 16.383 384 32 384h56v104c0 13.255 10.745 24 24 24h32c13.255 0 24-10.745 24-24V384h56c15.591 0 27.071-14.671 23.283-29.821z"/></svg>
        @endif
        {{ $persona->fio }}</td>
        <td>@if ($persona->telefon != "")
          <a type="button" href="tel:{{ $persona->telefon }}" role="button" class="btn btn-outline-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-outbound-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z"/></svg>
          {{ $persona->telefon }}</a>@endif {{ $persona->socials }}</td>
      </tr>
    @endforeach
    @endif
</table>

@endsection