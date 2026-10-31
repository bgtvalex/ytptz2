var person_selected_list = [];

var new_person_list = [];

// Добавление персоны в список
$(document).on('click', '.person_selected', function () {

    // Привести ID и фамилию-имя персоны к нормальному виду
    var person_id = this.id.split('_')[1];
    // отрезать отчество, если есть
    var person_name = this.textContent.split(' ')[0] + " " + this.textContent.split(' ')[1];

    // если в список мы еще не добавляли человека,
    if (($.inArray(person_selected_list,person_id)) == "-1") {
        var elem = $('<li class="person_added list-inline-item mt-1" data-sort="' + person_name +
            '"><div class="btn-group btn-group" role="group"><span class="btn btn-outline-primary">' +
            person_name +
            '</span><button type="button" id="person_' + person_id + 
            '" class="person_del btn btn-primary display-3">X</button></div></li>');

        // ... то добавляем его визуально
        $('#person_list').append(elem);
        // ... и его ID - в массив.
        person_selected_list.push(person_id);

        //корректируем количество персон, выводимое на кнопке
            $('#num_visitors').text(person_selected_list.length+new_person_list.length);

        // очищаем поле ввода
        $('#person_search_input').val('');
        //console.log(person_selected_list);

        // Обновляем поле с передаваемыми в бэкенд данными
        $('input#visitors').val(person_selected_list.join());
    }

    // Сортируем список добавленных людей
    var $elements = $('li.person_added');
    var $target = $('ul#person_list');
    
    $elements.sort(function (a, b) {
        var an = $(a).text(),
            bn = $(b).text();
        if (an && bn) {return an.toUpperCase().localeCompare(bn.toUpperCase());}
        return 0;
    });
    
    $elements.detach().appendTo($target);
});







// Добавление новой персоны в список
$(document).on('click', '#new_person', function () {
    var person_name = $('#person_search_input').val();

    var elem = $('<li class="person_added list-inline-item mt-1" data-sort="' + person_name +
            '"><div class="btn-group btn-group" role="group"><span class="btn btn-outline-success">' +
            person_name + '</span>' +
            '<button type="button" id="newperson_' + person_name +
            '" class="person_del btn btn-success display-3">X</button>' +
            '</div></li>');

    // добавляем персону визуально
    $('#person_list').append(elem);
    // ... и его имя - в массив.
    new_person_list.push(person_name);

    
    //корректируем количество персон, выводимое на кнопке
    $('#num_visitors').text(person_selected_list.length + new_person_list.length);


    // Обновляем поле с передаваемыми в бэкенд данными
    $('input#new_persons').val(new_person_list.join());
});



// Удаление персоны из списка по клику на "X"
$(document).on('click', '.person_del', function () {

    // Привести ID персоны к нормальному виду
    var person_id = this.id.split('_')[1];

    // Удалить визуально целиком элемент <li>
    $(this).parent().parent().remove();
    // ... и ID персоны из массива
    if (this.id.split('_')[0] == "person") { // Если удаляем существующую в БД персону
        // удаляем из массива
        person_selected_list.splice($.inArray(person_id, person_selected_list), 1);
        // Обновляем поле с передаваемыми в бэкенд данными
        $('input#visitors').val(person_selected_list.join());
    }
    else { // Если удаляем новую персону
        // удаляем из массива
        new_person_list.splice($.inArray(person_id, new_person_list), 1);
        // Обновляем поле с передаваемыми в бэкенд данными
        $('input#new_persons').val(new_person_list.join());
    }

    //корректируем количество персон, выводимое на кнопке
    $('#num_visitors').text(person_selected_list.length+new_person_list.length);

});


$('#person_search_list').each(function (index, element) {
    var person_id = element.id.split('_')[1];
    if ($.inArray(person_id, person_selected_list) != -1)
        element.css("outline", "1px solid red");
});

// TODO:m При добавлении персоны удалять ее из выпадающего списка в поиске
// или:
// TODO:m указывать в выпадающем списке, что персона уже добавлена
// или:
// TODO:m при попытке добавить уже добавленную ранее персону, происходит "вспышка", подсвечиваюшая ее в списке добавленных