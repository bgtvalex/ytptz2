@extends('layouts.type_visits')


@section('page-title')
Добавить версию
@endsection


@section('content')

<form action="{{ route('type-visits.update', $type) }}" method="post">
  @csrf
  @method('put')
  <!-- Вид Встречи Изменить -->
  <div class="form-group col-xs-12 col-lg-8 mt-3">
      <div class="input-group">
        <label class="input-group-text" id="type-tip">Вид<span class="text-danger">*</span>:</label>
        <input type="text" 
          class="form-control" name="tip" id="type" value="{{$type->tip}}">
      </div>
  </div>

  <div class="form-group col-xs-12 col-lg-8 mt-3">
    <button type="submit" class="btn btn-success">Изменить</button>
  </div>
</form>

@endsection