<!-- Справочники / Виды встреч / Виды -->

@extends('layouts.type_visits')

@section('content')
<table class="table table-striped table-hover mt-4 mb-6 table-responsive">
  <tbody class="table-striped">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Вид</th>
      <th scope="col"></th>
    </tr> <!-- {{ $i=0 }} -->
    @if (empty($types))
    <div class="alert alert-warning" role="alert">Нет данных.</div>
    @else
    @foreach($types as $type)
      <tr class="align-middle">
        <td>{{ ++$i }}</td>
        <td >{{ $type->tip }}</td>
        
        <td><a href="{{ route('person_edit', $type->id) }}"><button type="button" class="btn btn-outline-info"><i class="bi bi-pencil-fill"></i></button></a> </td>
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