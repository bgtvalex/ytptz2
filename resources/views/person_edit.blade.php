@extends('layouts.app')


@section('page-title')
Сведения об аудитории
@endsection


@section('content')

  @if (empty($data))

    @livewire('person-search')

  @else

  <form action="{{ route('submit_person_edit', $data->id) }}" method="post">
    @csrf

    <div class="row mt-3">
    <div class="form-group col-12">
      <div class="input-group">
        <span class="input-group-text" id="lbl-fio">ФИО<span class="text-danger">*</span>:</span>
        <input class="form-control" type="text" name="fio" id="fio" aria-describedby="lbl-fio" value="{{ $data->fio }}">
        <span class="input-group-text text-primary d-none d-sm-flex">Служитель:</span>
        <span class="input-group-text text-primary d-sm-none"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="currentColor"><rect width="100%" height="100%" fill="none"/><g class="currentLayer"><path d="M6.351 10.544a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1h-10s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c0-.246-.154-.986-.832-1.664-.652-.652-1.879-1.332-4.168-1.332-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/><path d="m11.115 7.664 2.315-.245 1.036-2.187.954 2.105 2.397.327-1.826 1.503.546 2.431-1.99-1.013-2.152 1.013.464-2.268-1.744-1.666z" /></g></svg></span>
        <div class="input-group-text text-bg-light">
          <input class="form-check-input mt-0" type="checkbox" name="is_leader"
          @if ($data->is_leader == 1)
            checked
          @endif
            >
        </div>
      </div>
    </div>
  </div>


  <div class="row mt-3">
    <div class="form-group col-12">
      <div class="input-group">
        <span class="input-group-text" id="lbl-pol">Пол:</span>
        <select class="form-select" name="pol_id" placeholder="ФИО" aria-describedby="lbl-pol">
          @foreach($pols as $pol)
          <option value="{{ $pol->id }}"
              @if ($pol->id == $data->pol_id)
                selected>
              @else
               >
            @endif
            {{ $pol->name }}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>


  <div class="row gx-3 mt-3">
    <div class="form-group col-xs-12 col-lg-4">
      <div class="input-group">
        <span class="input-group-text" id="lbl-data_rozhd">Дата рождения:</span>
        <input type="date" class="form-control" name="data_rozhd" id="data_rozhd" aria-describedby="lbl-data_rozhd" value="{{ $data->data_rozhd }}">
      </div>
    </div>
    <div class="form-group col-xs-12 col-lg-8 mt-3 mt-lg-0">
      <div class="input-group">
        <span class="input-group-text" id="lbl-mesto_rozhd">Место рождения:</span>
        <input type="text" class="form-control" name="mesto_rozhd" id="mesto_rozhd" aria-describedby="lbl-mesto_rozhd" value="{{ $data->mesto_rozhd }}">
      </div>
    </div>
  </div>


    <div class="row mt-3">
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-text">Контакты:</span>
          <input class="form-control" type="text" name="telefon" value="{{ $data->telefon }}" id="telefon"
            placeholder="Номер телефона">
          <input class="form-control" type="text" name="socials" value="{{ $data->socials }}" id="socials"
            placeholder="Ссылка на соцсети/мессенджер">
        </div>
      </div>
    </div>

    <div class="form-group mt-3">
      <textarea class="form-control" name="comments" placeholder="Дополнительные комментарии" id="comments">{{ $data->comments }}</textarea>
    </div>

    <div class="d-grid gap-2 mt-3">
      <button type="submit" class="btn btn-success">Сохранить</button>
    </div>
  </form>

  @endif
</div>
@endsection