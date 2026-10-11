<!-- Справочники / Виды встреч / Виды -->

@extends('layouts.type_visits')

@section('content')
<table class="table table-striped table-hover mt-4 mb-6 table-responsive">
  <tbody class="table-striped">
    <tr>
      <th scope="col" class="text-center">id</th>
      <th scope="col" class="text-center">Вид</th>
      <th scope="col" class="text-center">Создан</th>
      <th scope="col" class="text-center">Обновлен</th>
      <th scope="col"></th>
    </tr> <!-- {{ $i=0 }} -->
    @if (empty($type))
    <div class="alert alert-warning" role="alert">Нет данных.</div>
    @else
    
      <tr class="align-middle">
        <td class="text-center">{{ $type->id }}</td>
        <td >{{ $type->tip }}</td>
        @if($type->created_at == null)
        <td  class="text-center"> - </td>
        @else
        <td  class="text-center">{{ $type->created_at }}</td>
        @endif
        @if($type->updated_at == null)
        <td class="text-center"> - </td>
        @else
       <td  class="text-center">{{ $type->updated_at }}</td>
        @endif
        
        
        
        <td><a href="{{ route('type-visits.edit', $type->id)}} "><button type="button" class="btn btn-outline-info"><i class="bi bi-pencil-fill"></i></button></a> </td>
      </tr>
    
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