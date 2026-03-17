<div>
    <div class="input-group mt-4">
        <input class="form-control" type="text" wire:model="searchTerm" placeholder="Введите фамилию или имя (минимум 2 символа)" aria-label="Введите фамилию или имя" aria-describedby="button-choose" id="person_search_input" />
        <button class="btn btn-outline-primary" type="button" id="button-choose">Выбрать</button>
    </div>
    <div id="person_search_list table-striped" class="list-group">
        @foreach($persons as $persona)
        <a class="list-group-item list-group-item-action" href="{{ route('person_edit', $persona->id) }}">
            {{ $persona->fio }} <em><small class="text-muted">Нажми, чтоб редактировать</small></em>
        </a>
        @endforeach
    </div>
</div>