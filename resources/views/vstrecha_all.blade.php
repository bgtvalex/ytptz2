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
      <th scope="col">Инфо</th>
      <th scope="col">##</th>
      <th scope="col"> </th>
    </tr>
    @foreach ($vstrechi as $vstrecha)
      <tr scope="col">
        <td>{{ $vstrecha->data }}</td>
        <td>{{ $vstrecha->tip }} ({{ $vstrecha->fio }})</td>
        <td>{{ $vstrecha->theme }} @if($vstrecha->place!="")
          (<i class="bi bi-geo-alt-fill text-danger"></i>{{ $vstrecha->place }}) @endif</td>
        <td>{{ $vstrecha->num }}</td>
        <td><a href="#"><!-- vstrecha_id --><button type="button" class="btn btn-outline-info"><i class="bi bi-pencil-fill"></i></button></a></td>
    @endforeach
</table>


<script type="text/javascript">
$(document).ready(function(){
  $(".dropdown-toggle-js").dropdown();
});
</script>
@endsection