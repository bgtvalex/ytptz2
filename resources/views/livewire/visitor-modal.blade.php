<div>
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
</div>