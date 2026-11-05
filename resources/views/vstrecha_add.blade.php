@extends('layouts.vstrecha')


@section('page-title')
Добавить встречу
@endsection


@section('content')

<form action="{{ route('post_vstrecha_add') }}" class="mb-2" method="post">
  @csrf


  
  <div class="row g-3 mt-2">
    <!-- Дата встречи -->
    <div class="form-group col-xs-12 col-sm-6">
      <div class="input-group">
        <span class="input-group-text" id="lbl-data">Дата встречи<span class="text-danger">*</span>:</span>
        <input class="form-control" type="date" value="{{ date('Y-m-d') }}" name="data" id="data" aria-describedby="lbl-data">
      </div>
    </div>

   <!-- Вид Встречи -->
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

    <!-- Ответственный -->
    <div class="form-group col-12">
      <div class="input-group">
      <span class="input-group-text" id="otvetstvenny">Ответственный<span class="text-danger">*</span>:</span>
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

    <!-- Тема -->
    <div class="form-group col-12 col-sm-6">
      <div class="input-group">
        <span class="input-group-text" id="lbl-theme">Тема:</span>
        <input type="text" class="form-control" name="theme" id="theme" aria-describedby="lbl-theme">
      </div>
    </div>

    <!-- Место -->
    <div class="form-group col-12 col-sm-6">
      <div class="input-group">
        <span class="input-group-text" id="lbl-place">Место:</span>
        <input type="text" class="form-control" name="place" id="place" aria-describedby="lbl-place">
      </div>
    </div>

    <input type="hidden" name="visitors" id="visitors">
    <input type="hidden" name="new_persons" id="new_persons">

    <!-- Добавить -->
    <div class="d-grid col-12">
      <button type="submit" class="btn btn-primary">
        Добавить <span id="num_visitors" class="badge text-bg-light fs-6 fw-light align-middle">0</span> человек
      </button>
    </div>

  </div>

@livewire('visitor-add')

</form>

<ul class="grid text-left person_list" id="person_list"  style="--bs-gap: .25rem 1rem;">
</ul>


<!-- Кнопка-триггер модального окна -->
<button type="button" class="btn btn-primary btn_choose_from_list" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Выбрать из списка
</button>


<!-- Модальное окно -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
        <ul class="list-group">
          @foreach($all_persons as $person)
            <li class="visits-item list-group-item" id="person_{{ $person->id }}">{{ $person->fio }}</li>
          @endforeach
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
        <button type="button" class="btn btn-primary" id="btn-add-items" data-bs-dismiss="modal">Выбрать</button>
      </div>
    </div>
  </div>
</div>



@endsection