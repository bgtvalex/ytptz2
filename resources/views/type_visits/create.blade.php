@extends('layouts.type_visits')


@section('page-title')
Добавить версию
@endsection


@section('content')

<form action="{{ route('type-visits.store') }}" method="post">
  @csrf

  <!-- Вид Встречи -->
  <div class="form-group col-xs-12 col-lg-8 mt-3">
      <div class="input-group">
        <label class="input-group-text" id="type_visits_name">Вид<span class="text-danger">*</span>:</label>
        <input type="text" 
          class="form-control" name="tip" id="type_visits" 
            placeholder="Молодёжка">
      </div>
  </div>

  <div class="form-group col-xs-12 col-lg-8 mt-3">
    <button type="submit" class="btn btn-success">Добавить</button>
  </div>
</form>

@endsection