@extends('layouts.vstrecha')


@section('page-title')
Добавить встречу
@endsection


@section('content')

<form action="{{ route('post_vstrecha_add') }}" class="mb-2" method="post">
  @csrf

  <div class="row g-3 mt-2">
    <div class="form-group col-xs-12 col-sm-6">
      <div class="input-group">
        <span class="input-group-text" id="lbl-data">Дата встречи<span class="text-danger">*</span>:</span>
        <input class="form-control" type="date" value="{{ date('Y-m-d') }}" name="data" id="data" aria-describedby="lbl-data">
      </div>
    </div>



    <div class="form-group col-xs-12 col-sm-6">
      <div class="input-group">
        <span class="input-group-text" id="tip_id-tip">Вид<span class="text-danger">*</span>:</span>
          <select class="form-select" name="tip_id" aria-describedby="tip_id-tip">
          @foreach($tips_vstrechi as $tip)
          <option value="{{ $tip->id }}"
            @if ($tip->tip == "Не указан")
            selected>
            @else
            >
            @endif
            {{ $tip->tip }}
          </option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="form-group col-12">
      <div class="input-group">
      <span class="input-group-text" id="otvetstvenny">Ответственный:</span>
        <select class="form-select" name="otvetstvenny" placeholder="ФИО" aria-describedby="otvetstvenny">
          <option value="null" selected>Не указан</option>
          @foreach($leaders as $leader)
          <option value="{{ $leader->id }}">
            {{ $leader->fio }}
          </option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="form-group col-12 col-sm-6">
      <div class="input-group">
        <span class="input-group-text" id="lbl-theme">Тема:</span>
        <input type="text" class="form-control" name="theme" id="theme" aria-describedby="lbl-theme">
      </div>
    </div>

    <div class="form-group col-12 col-sm-6">
      <div class="input-group">
        <span class="input-group-text" id="lbl-place">Место:</span>
        <input type="text" class="form-control" name="place" id="place" aria-describedby="lbl-place">
      </div>
    </div>

    <input type="hidden" name="visitors" id="visitors">
    <input type="hidden" name="new_persons" id="new_persons">

    <div class="d-grid col-12">
      <button type="submit" class="btn btn-primary">
        Добавить <span id="num_visitors" class="badge text-bg-light fs-6 fw-light align-middle">0</span> человек
      </button>
    </div>

  </div>

@livewire('visitor-add')

</form>

<ul class="list-inline" id="person_list">

</ul>


@endsection