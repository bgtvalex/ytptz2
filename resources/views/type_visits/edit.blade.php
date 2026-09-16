@extends('layouts.versions')


@section('page-title')
Добавить версию
@endsection


@section('content')

<form action="{{ route('version.update', $version->id)}}" method="post">
  @csrf
  @method('patch')
  <!-- Версия -->
  <div class="form-group col-xs-12 col-lg-8 mt-3">
      <div class="input-group">
        <label class="input-group-text" id="versions-version">Версия<span class="text-danger">*</span>:</label>
        <input type="text" 
          class="form-control" name="version" id="version" value="{{$version->version}}">
      </div>
  </div>
    
    <!-- Тема -->
    <div class="form-group col-xs-12 col-lg-8 mt-3">
      <div class="input-group">
        <label class="input-group-text" id="versions-theme">Тема<span class="text-danger">*</span>:</label>
        <input type="text" class="form-control" name="theme" id="theme" value="{{$version->theme}}">
      </div>
    </div>
    
    <!-- Описание -->
    <div class="form-group col-xs-12 col-lg-8 mt-3">
      <div class="input-group">
        <label class="input-group-text" id="versions-desc">Описание:</label>
        <input type="text" class="form-control" name="desc" id="desc" value="{{$version->desc}}">
      </div>
    </div>

  <!-- Статус -->
    <div class="form-group col-xs-12 col-lg-8 mt-3">
      <div class="input-group">
        <label class="input-group-text" id="versions-status">Статус<span class="text-danger">*</span>:</label>
        <select class="form-select" name="status">
          <option value="сделано">Сделано</option>
          <option value="в процессе">В процессе</option>
          <option value="отменено">Отменено</option>
          <option value="отложено">Отложено</option>
        </select>
      </div>
    </div>

  <div class="form-group col-xs-12 col-lg-8 mt-3">
    <button type="submit" class="btn btn-success">Изменить</button>
  </div>
</form>

@endsection