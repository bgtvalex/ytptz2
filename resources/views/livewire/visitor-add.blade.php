<div>
    <div class="input-group mt-4">
        <input class="form-control" type="text" wire:model="searchTerm" placeholder="Введите фамилию или имя (минимум 2 символа)" aria-label="Введите фамилию или имя" aria-describedby="button-choose" id="person_search_input" />
        <button class="btn btn-outline-success" type="button" id="new_person">Новая персона</button>
    </div>
    <div id="person_search_list" class="list-group person-select table-striped">
        @foreach($persons as $person_)
            <span class="list-group-item person_selected list-group-item-action" id="person_{{ $person_->id }}">{{ $person_->fio }} <i class="text-secondary">Нажмите, чтобы добавить</i></span>
        @endforeach
    </div>
</div>