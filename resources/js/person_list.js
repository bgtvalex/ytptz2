var person_selected_list = [];
var new_person_list = [];


// Добавление персоны в список
$(document).on('click', '.person_selected', function () {

    // Привести ID и фамилию-имя персоны к нормальному виду
    var person_id = this.id.split('_')[1];
    // отрезать отчество и другие сведения, если есть
    var parts = this.textContent.trim().split(/\s+/);
    var person_name = parts[0] + " " + (parts[1] || '');

    // Проверяем, есть ли уже такой человек в списках
    if ($.inArray(person_id, person_selected_list) != -1 ||
        $.inArray(person_name, new_person_list) != -1) {

            /* XXX НЕ РАБОТАЕТ, ИСПРАВИТЬ XXX
        // Подсвечиваем красным уже добавленный элемент в #person_list
        $('ul#person_list li.person_added').each(function (el) {
            var btn = $(el).find('button.person_del');
            //if (btn.attr('id') === 'newperson_' + person_id) {
            if (btn.attr('id') === 'person_' + person_id) {
                flashElement(btn.parent);
            }
        });

        // Если это персона из ручного ввода (совпадение по имени),
        // подсветим её тоже
        $('#person_list .person_added').each(function () {
            if ($(this).data('sort') === person_name) {
                flashElement($(this).parent.parent);
            }
        });*/ 

        // дополнительно скроем саму строку выпавшего списка
        $(this).css('display', 'none');
        return; // повторно не добавляем
    }

    // Если ещё не добавляли — создаём элемент
    var elem = $('<li class="person_added list-inline-item mt-1">')
        .attr('data-sort', person_name)
        .append(
            $('<div class="btn-group btn-group" role="group">').append(
                $('<span class="btn btn-outline-primary">').text(person_name),
                $('<button type="button" class="person_del btn btn-primary display-3">')
                    .attr('id', 'person_' + person_id)
                    .text('X')
            )
        );

    // добавляем визуально
    $('#person_list').append(elem);
    // ID — в массив
    person_selected_list.push(person_id);

    // корректируем количество персон на кнопке
    $('#num_visitors').text(person_selected_list.length + new_person_list.length);

    // очищаем поле ввода
    $('#person_search_input').val('');

    // обновляем данные для бэкенда
    $('input#visitors').val(person_selected_list.join());

    // Сортируем список добавленных людей
    sortPersonList();
    syncExcludedToLivewire();
});



// Вынесем сортировку в отдельную функцию — она нужна и при удалении
function sortPersonList() {
    var $elements = $('li.person_added');
    var $target = $('ul#person_list');

    $elements.sort(function (a, b) {
        var an = $(a).text(),
            bn = $(b).text();
        if (an && bn) { return an.toUpperCase().localeCompare(bn.toUpperCase()); }
        return 0;
    });

    $elements.detach().appendTo($target);
}



function flashElement($el) {
    if (!$el || !$el.length) return;

    // перезапуск анимации, если класс уже висит
    $el.removeClass('flash');
    // форсируем reflow, чтобы анимация стартовала заново
    void $el[0].offsetWidth;
    $el.addClass('flash');

    // снимаем класс после окончания (страховка на случай animationend)
    clearTimeout($el.data('flashTimer'));
    $el.data('flashTimer', setTimeout(function () {
        $el.removeClass('flash');
    }, 2000));
}



/**
 * Обработчик клика по кнопке "Новая персона".
 *
 * Срабатывает, когда пользователь ввёл ФИО, которого нет в БД,
 * и нажал "Новая персона". Создаёт новый <li> в списке #person_list
 * и запоминает имя в массиве new_person_list — эти имена позже
 * уйдут на бэкенд через скрытое поле input#new_persons, где сервер
 * создаст новых Person.
 *
 * ВАЖНО: у новой персоны ещё нет ID в БД, поэтому идентифицируем её
 * по имени (data-person-name), а не по id-атрибуту кнопки.
 */
$(document).on('click', '#new_person', function () {

    // Берём то, что пользователь ввёл в поле поиска, и обрезаем пробелы по краям
    var person_name = $('#person_search_input').val().trim();

    // Пустое имя не добавляем (защита от случайного клика с пустым полем)
    if (!person_name) return;

    // Строим DOM-элемент новой персоны:
    //   <li class="person_added ..." data-sort="Имя Фамилия">
    //     <div class="btn-group">
    //       <span class="btn btn-outline-success">Имя Фамилия</span>
    //       <button class="person_del ..." data-person-name="Имя Фамилия">X</button>
    //     </div>
    //   </li>
    //
    // - data-sort нужен для сортировки (sortPersonList) и для будущих проверок "уже добавлен";
    // - data-person-name нужен обработчику удаления, чтобы понять, кого именно удалять
    //   (у новой персоны нет id в БД — только имя);
    // - зелёные классы (btn-outline-success / btn-success) визуально отличают
    //   новых персон от существующих (те — синие, btn-outline-primary / btn-primary).
    var elem = $('<li class="person_added list-inline-item mt-1">')
        .attr('data-sort', person_name)
        .append(
            $('<div class="btn-group" role="group">').append(
                $('<span class="btn btn-outline-success">').text(person_name),
                $('<button type="button" class="person_del btn btn-success display-3">')
                    .attr('data-person-name', person_name)   // ← имя в data-атрибуте
                    .text('X')
            )
        );

    // Добавляем готовый <li> в конец видимого списка
    $('#person_list').append(elem);

    // Проверка на дубликат
    if (new_person_list.includes(person_name)) {
        // подсветить существующий элемент в #person_list и выйти
        flashElement($('#person_list li[data-sort="' + person_name + '"]'));
        $('#person_search_input').val('');
        return;
    }
    // Запоминаем имя в массиве "новых" персон — он пойдёт на бэкенд
    // (input#new_persons), где сервер создаст записи в таблице persons
    new_person_list.push(person_name);

    // Обновляем счётчик на большой кнопке "Записать/Добавить N человек":
    // всего = уже существующие (person_selected_list) + новые (new_person_list)
    $('#num_visitors').text(person_selected_list.length + new_person_list.length);

    // Синхронизируем скрытое поле формы с массивом новых персон.
    // join() без аргумента склеивает через запятую: ["А","Б"] -> "А,Б".
    // На бэкенде это поле разбирается (explode(',') или через $request->input) и
    // превращается в массив имён для создания Person.
    $('input#new_persons').val(new_person_list.join());

    // Очищаем поле поиска — чтобы пользователь мог сразу ввести следующее имя
    $('#person_search_input').val('');

    // Сортируем весь список #person_list по алфавиту (существующие + новые вместе)
    sortPersonList();
});




$(document).on('click', '.person_del', function () {
    var $btn = $(this);
    var btnId = $btn.attr('id') || '';

    // 1) Визуально удалить весь <li>, а не только внутренний <div>
    $btn.closest('li.person_added').remove();

    // 2) Обновить массив и скрытое поле
    if (btnId.startsWith('person_')) {
        // Существующая персона из БД
        var personId = btnId.slice('person_'.length);   // "5"
        var idx = $.inArray(personId, person_selected_list);
        if (idx !== -1) {
            person_selected_list.splice(idx, 1);
        }
        $('input#visitors').val(person_selected_list.join());

        // Сообщить Livewire, что персона снова доступна в поиске
        syncExcludedToLivewire();
    } else {
        // Новая персона (id отсутствует или начинается с "newperson_")
        var personName = $btn.data('person-name');
        if (personName) {
            var idx = new_person_list.indexOf(personName);
            if (idx !== -1) {
                new_person_list.splice(idx, 1);
            }
            $('input#new_persons').val(new_person_list.join());
        }
        // excludedIds не менялись — sync не нужен
    }
    // 3) Обновить счётчик
    $('#num_visitors').text(person_selected_list.length + new_person_list.length);
});



document.addEventListener('livewire:load', function () {
    // Livewire готов — теперь можно безопасно синхронизировать
    $('ul#person_list button.person_del').each(function () {
        var person_id = this.id.split('_')[1];
        if (person_id && person_id !== 'undefined') {
            person_selected_list.push(person_id);
        }
    });
    syncExcludedToLivewire();
});



/**
 * Передаёт текущий список выбранных ID (person_selected_list)
 * в Livewire-компонент VisitorAdd — в его публичное свойство excludedIds.
 *
 * Компонент затем исключает эти ID из выдачи поиска
 * (whereNotIn('id', $excludedIds)).
 *
 * Вызывать:
 *   - после добавления существующей персоны (.person_selected);
 *   - после удаления существующей персоны (.person_del, ветка "person_");
 *   - при загрузке страницы после инициализации Livewire (livewire:load),
 *     чтобы уже сохранённые в БД посетители не светились в поиске.
 */
function syncExcludedToLivewire() {
    // Livewire 2 хранит компоненты в глобальном объекте window.livewire.
    // Находим корневой DOM-элемент компонента: у него есть атрибут wire:id.
    // Экранирование "\\:" нужно, чтобы jQuery-селектор не принял ":" за псевдокласс.
    var rootEl = document.querySelector('[wire\\:id]');
    if (!rootEl) {
        // Компонента на странице нет — выходим тихо (например, если JS подключён
        // на странице без visitor-add).
        return;
    }

    // Узнаём id компонента из атрибута wire:id — это внутренний id Livewire
    var componentId = rootEl.getAttribute('wire:id');

    // Livewire 2: получаем экземпляр компонента по его id.
    // (В Livewire 3 тоже есть Livewire.find, но API компонента отличается —
    //  см. примечание ниже.)
    var component = window.livewire.find(componentId);
    if (!component) {
        return;
    }

    // person_selected_list хранит ID как строки (мы брали их из id="person_5").
    // whereNotIn в SQL сравнит их с int-колонкой — MySQL сделает неявное приведение,
    // но лучше привести к числу заранее, чтобы избежать сюрпризов.
    var ids = person_selected_list
        .map(function (v) { return parseInt(v, 10); })
        .filter(function (v) { return !isNaN(v); });

    // .set() в Livewire 2 устанавливает публичное свойство компонента
    // и запускает перерендер. Свойство excludedIds объявлено как public $excludedIds = [];
    // В методе updatedExcludedIds() на PHP мы дополнительно приводим к int.
    component.set('excludedIds', ids);
}