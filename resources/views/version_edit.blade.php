@extends('layouts.versions')


@section('page-title')
Редактировать версию
@endsection


@section('content')

  @if (empty($data))

    @livewire('version-search')

  @else

  <form action="{{ route('submit_person_edit', $data->id) }}" method="post">
    @csrf
    <!-- Версия -->
    <div class="row mt-3">
    <div class="form-group col-12">
     
    </div>
  </div>

  <!-- Статус -->
  <div class="row mt-3">
    <div class="form-group col-12">
      <div class="input-group">
        <span class="input-group-text" id="lbl-pol">Статус:</span>
        
      </div>
    </div>
  </div>

 <!-- Тема -->
  <div class="row gx-3 mt-3">
    <div class="form-group col-xs-12 col-lg-4">
      <div class="input-group">
        <span class="input-group-text" id="lbl-data_rozhd">Тема:</span>
        <input type="date" class="form-control" name="data_rozhd" id="data_rozhd" aria-describedby="lbl-data_rozhd" value="{{ $data->data_rozhd }}">
      </div>
    </div>

    <!-- Описание -->
    <div class="form-group col-xs-12 col-lg-8 mt-3 mt-lg-0">
      <div class="input-group">
        <span class="input-group-text" id="lbl-mesto_rozhd">Описание:</span>
        <input type="text" class="form-control" name="mesto_rozhd" id="mesto_rozhd" aria-describedby="lbl-mesto_rozhd" value="{{ $data->mesto_rozhd }}">
      </div>
    </div>
  </div>

    <div class="d-grid gap-2 mt-3">
      <button type="submit" class="btn btn-success">Сохранить</button>
    </div>
  </form>

  @endif
</div>
@endsection