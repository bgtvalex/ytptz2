@extends('layouts.vstrecha')

@section('page-title')
Добавить встречу
@endsection

@section('content')

<form action="{{ route('submit_vstrecha_edit', $vstrecha->id) }}" class="mb-2" method="post">
  @csrf

  <div class="row g-3 mt-2">
    <div class="form-group col-xs-12 col-sm-6">
      <div class="input-group">
        <span class="input-group-text" id="lbl-data">Дата встречи<span class="text-danger">*</span>:</span>
        <input class="form-control" type="date"  value="{{ $vstrecha->data }}" name="data" id="data" aria-describedby="lbl-data">
      </div>
    </div>

    <div class="form-group col-xs-12 col-sm-6">
      <div class="input-group">
        <span class="input-group-text" id="tip_id-tip">Вид<span class="text-danger">*</span>:</span>
          <select class="form-select" name="tip_id" aria-describedby="tip_id-tip">
          @foreach($tips_vstrechi as $tip)
          <option value="{{ $tip->id }}"
            @if ($tip->id == $vstrecha->tip_id)
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
      <span class="input-group-text" id="otvetstvenny">Ответственный<span class="text-danger">*</span>:</span>
        <select class="form-select" name="otvetstvenny" placeholder="ФИО" aria-describedby="otvetstvenny">
          <option value="null" selected>Не указан</option>
          @foreach($leaders as $leader)
          <option value="{{ $leader->id }}"
            @if ($leader->id == $vstrecha->otvetstvenny_id)
              selected>
            @else
              >
            @endif
            {{ $leader->fio }}
          </option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="form-group col-12 col-sm-6">
      <div class="input-group">
        <span class="input-group-text" id="lbl-theme">Тема:</span>
        <input type="text" class="form-control" name="theme" id="theme" aria-describedby="lbl-theme" value="{{ $vstrecha->theme }}">
      </div>
    </div>

    <div class="form-group col-12 col-sm-6">
      <div class="input-group">
        <span class="input-group-text" id="lbl-place">Место:</span>
        <input type="text" class="form-control" name="place" id="place" aria-describedby="lbl-place" value="{{ $vstrecha->place }}">
      </div>
    </div>

    <input type="hidden" name="visitors" id="visitors">
    <input type="hidden" name="new_persons" id="new_persons">

    <div class="d-grid col-12">
      <button type="submit" class="btn btn-primary">
        Сохранить <span id="num_visitors" class="badge text-bg-light fs-6 fw-light align-middle">0</span> человек
      </button>
    </div>

  </div>

</form>

<ul class="list-inline" id="person_list">
    @foreach($visitors as $visitor)
        <li class="person_added list-inline-item mt-1">
            <div class="btn-group btn-group" role="group">
                <span class="btn btn-outline-primary">{{$visitor->fio}}</span>
                <button type="button" id="person_{{$visitor->person_id}}" class="person_del btn btn-primary display-3">X</button>
            </div>
        </li>
    @endforeach
</ul>

@endsection