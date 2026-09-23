@extends('layouts.vstrecha')


@section('page-title')
Все встречи
@endsection


@section('content')

<table class="table table-striped table-hover mt-4 table-responsive">
  <thead>
    <tr>
      <th scope="col">Дата</th>
      <th scope="col">Вид</th>
      <th scope="col">Ответственный</th>
      <th scope="col">Тема</th>
      <th scope="col">Локация</th>
      <th scope="col">##</th>
      <th scope="col"> </th>
    </tr>
    @foreach ($vstrechi as $vstrecha)
      <tr scope="col">
        <td>{{ $vstrecha->data }}</td>
        <td>{{ $vstrecha->tip }}</td>
        <td>{{ $vstrecha->fio }}</td>
        <td>{{ $vstrecha->theme }}</td>
        <td>{{ $vstrecha->place }}</td>
        <td>{{ $vstrecha->num }}</td>
        <td><a href="{{ route('vstrecha_edit', $vstrecha->id) }}"><button type="button" class="btn btn-outline-info"><i class="bi bi-pencil-fill"></i></button></a></td>
    @endforeach
</table>


<script type="text/javascript">
$(document).ready(function(){
  $(".dropdown-toggle-js").dropdown();
});
</script>
@endsection