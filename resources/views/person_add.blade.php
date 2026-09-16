@extends('layouts.app')


@section('content')

<form action="{{ route('post_person_add') }}" method="post">
  @csrf
  <div class="row mt-3">
    <div class="form-group col-12">
      <div class="input-group">
        <span class="input-group-text" id="lbl-fio">ФИО<span class="text-danger">*</span>:</span>
        <input class="form-control" type="text" name="fio" id="fio" aria-describedby="lbl-fio">
        <span class="input-group-text text-primary d-none d-sm-flex">Гость:</span>
        <span class="input-group-text text-primary d-sm-none"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16"><path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/><path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/></svg></span>
        <div class="input-group-text text-bg-light">
          <input class="form-check-input mt-0" type="checkbox" name="is_guest" checked >
        </div>
        <span class="input-group-text text-primary d-none d-sm-flex">Служитель:</span>
        <span class="input-group-text text-primary d-sm-none"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="currentColor"><rect width="100%" height="100%" fill="none"/><g class="currentLayer"><path d="M6.351 10.544a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1h-10s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c0-.246-.154-.986-.832-1.664-.652-.652-1.879-1.332-4.168-1.332-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/><path d="m11.115 7.664 2.315-.245 1.036-2.187.954 2.105 2.397.327-1.826 1.503.546 2.431-1.99-1.013-2.152 1.013.464-2.268-1.744-1.666z" /></g></svg></span>
        <div class="input-group-text text-bg-light">
          <input class="form-check-input mt-0" type="checkbox" name="is_leader" >
        </div>
        <span class="input-group-text text-primary d-none d-sm-flex">Следить:</span>
        <span class="input-group-text text-primary d-sm-none"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">  <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z"/>  <path d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5ZM6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z"/></svg></span>
        <div class="input-group-text text-bg-light">
          <input class="form-check-input mt-0" type="checkbox" name="is_active" checked >
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-3">
    <div class="form-group col-12">
      <div class="input-group">
        <span class="input-group-text" id="lbl-pol">Пол:</span>
        <select class="form-select" name="pol_id" placeholder="ФИО" aria-describedby="lbl-pol">
          @foreach($pols as $pol_)
          <option value="{{ $pol_->id }}" @if ($pol_->name == "Не указан")
            selected>
            @else
            >
            @endif
            {{ $pol_->name }}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>

  <div class="row gx-3 mt-3">
    <div class="form-group col-xs-12 col-lg-4">
      <div class="input-group">
        <span class="input-group-text" id="lbl-data_rozhd">Дата рождения:</span>
        <input type="date" class="form-control" name="data_rozhd" id="data_rozhd" aria-describedby="lbl-data_rozhd">
      </div>
    </div>
    <div class="form-group col-xs-12 col-lg-8 mt-3 mt-lg-0">
      <div class="input-group">
        <span class="input-group-text" id="lbl-mesto_rozhd">Место рождения:</span>
        <input type="text" class="form-control" name="mesto_rozhd" id="mesto_rozhd" aria-describedby="lbl-mesto_rozhd">
      </div>
    </div>
  </div>

  <div class="row mt-3">
    <div class="form-group col-12">
      <div class="input-group">
        <span class="input-group-text">Контакты:</span>
        <input class="form-control" type="text" name="telefon" placeholder="Номер телефона" id="telefon">
        <input class="form-control" type="text" name="socials" placeholder="Ссылка на соцсети/мессенджер" id="socials">
      </div>
    </div>
  </div>

  <div class="form-group mt-3 col-12">
    <textarea class="form-control" name="comments" placeholder="Дополнительные комментарии" id="comments"></textarea>
  </div>

  <div class="d-grid mt-3 col-12">
    <button type="submit" class="btn btn-success">Добавить</button>
  </div>
</form>

@endsection