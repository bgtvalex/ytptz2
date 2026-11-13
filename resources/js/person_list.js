/* === VARIABLES === */

// Общее количество добавленных Персон
const num_visitors = document.getElementById("num_visitors");

// Добавление персоны через Модальное окно (переменные)
const visitors = document.getElementById("visitors");
const $visitsItems = document.querySelectorAll(".visits-item");
const $btnAddItems = document.getElementById("btn-add-items");

// Добавление Новой Персоны (переменные)
const $newPersons = document.getElementById("new_persons")
const $personSearchInput = document.getElementById("person_search_input");
const $btnNewPerson = document.getElementById("new_person");
let person_list = document.getElementById("person_list");

// Рабочие массивы
let person_selected_list = [];
let new_person_list = [];


/* === FUNCTIONS === */

/* = Добавление Персоны в список через Модальное окно*/

// Выбор персоны в Модальном окне
for (let item of $visitsItems) {
    item.addEventListener("click", function () {
        this.classList.toggle("active");
    });
}

// Добавление Персон из Модального окна
$btnAddItems.addEventListener("click", function () {
    for (let item of $visitsItems) {
        if (item.classList.contains("active")) {
            let id = +item.id.slice(7);
            // проверка есть ли выбранные персоны
            if (!person_selected_list.includes(id)) {
                // добавление аттрибута value элементу VISITORS
                if (!visitors.hasAttribute("value")) {
                    visitors.setAttribute("value", id);
                } else {
                    visitors.value += "," + id;
                }
                person_selected_list.push(+id);

                // добавление элемента Персоны
                person_list.innerHTML += 
                `<li class="person_added list-inline-item mt-1 g-col-6" data-sort="${item.textContent}">
                    <div class="btn-group btn-group" role="group">
                        <span class="btn btn-outline-primary">${item.textContent}</span>
                    <button type="button" id="person_${id}" class="person_del btn btn-primary display-3">X</button>
                    </div>
                </li>`;

                num_visitors.textContent = person_selected_list.length + new_person_list.length;
            }
        }
    }
    deleteItems()
});

/* = Добавление Новой Персоны */
$btnNewPerson.addEventListener('click', function(){
    // person_search_input
    let id = $personSearchInput.value
    $personSearchInput.value = ''

    // $newPersons
    // проверка есть ли выбранные персоны
    if (!new_person_list.includes(id)) {
        // добавление аттрибута value элементу VISITORS
        if (!$newPersons.hasAttribute("value")) {
            $newPersons.setAttribute("value", id);
        } else {
            $newPersons.value += "," + id;
        }
    // new_person_list
    new_person_list.push('newperson_' + id)
    }
    
    // num_visitors
    num_visitors.textContent = person_selected_list.length + new_person_list.length;

    // добавление Новой Персоны в .person_list
    person_list.innerHTML += `
        <li class="person_added list-inline-item mt-1" data-sort="${id}">
            <div class="btn-group btn-group" role="group">
                <span class="btn btn-outline-success">${id}</span>
                <button type="button" id="${'newperson_' + id}" class="person_del btn btn-success display-3">X</button>
            </div>
        </li>`
        deleteItems()
})

// Удаление Персон из .person_list
function deleteItems () {
    let elements = document.querySelectorAll('.person_del')
    for (let el of elements) {
        el.addEventListener('click', function(){
            changeCounters(el)
            let element = el.closest('.person_added')
            element.remove()
        })
    }
}


// Обновление счётчиков
function changeCounters(el) {
    console.log(el)

    // проверка на Персону и Новую Персону
    const elms = el.closest('.btn-group').children
    for (let elTarget of elms) {
        if (elTarget.classList.contains('btn-outline-primary')) {
            let id = +el.id.slice(7);
            // удаление из массива person_selected_list
            for (let i = person_selected_list.length - 1; i >= 0; i--) {
                if (person_selected_list[i] === id) {
                    person_selected_list.splice(i, 1);
                }
            }
            // меняем visitors
            visitors.removeAttribute("value");
            for (let el of person_selected_list) {
                if (!visitors.hasAttribute("value")) {
                    visitors.setAttribute("value", el);
                } else {
                    visitors.value += "," + el;
                }
            }
            // меняем счётчик num_visitors
            num_visitors.textContent = person_selected_list.length + new_person_list.length
        } 
        else {
            // удаление из массива new_person_list
            for (let i = new_person_list.length - 1; i >= 0; i--) {
                if (new_person_list[i] === el.id) {
                    new_person_list.splice(i, 1);
                    console.log(new_person_list);
                }
            }
            // удаление из скрытых new_persons
            $newPersons.removeAttribute("value");
            for (let el of new_person_list) {
                if (!$newPersons.hasAttribute("value")) {
                    $newPersons.setAttribute("value", el);
                } else {
                    $newPersons.value += "," + el;
                }
            }
            // меняем счётчик num_visitors
            num_visitors.textContent = person_selected_list.length + new_person_list.length
        }
    }
}



/* ===  HTML-ELEMENTS === */

/* Выпадающий элемент списка выбираемых
	<div id="person_search_list" class="list-group person-select table-striped">
		<span class="list-group-item person_selected list-group-item-action" id="person_8">
			Амелина Олеся 
			<i class="text-secondary">Нажмите, чтобы добавить</i>
		</span>
	</div>
*/
/* Добавляющийся элемент Персоны в .person_list
	<li class="person_added list-inline-item mt-1" data-sort="Амелина Олеся">
		<div class="btn-group btn-group" role="group">
			<span class="btn btn-outline-primary">Амелина Олеся</span>
			<button type="button" id="person_8" class="person_del btn btn-primary display-3">X</button>
		</div>
	</li>
*/
/* Добавляющийся элемент Новой Персоны в .person_list
    <li class="person_added list-inline-item mt-1" data-sort="Богатенков Александр">
        <div class="btn-group btn-group" role="group">
            <span class="btn btn-outline-success">Богатенков Александр</span>
            <button type="button" id="newperson_Богатенков Александр" class="person_del btn btn-success display-3">X</button>
        </div>
    </li>
*/




/* =========== удалить после успешной замены кода ================ */


/* Скрипт из vstrecha_add.blade.php
<script>
const num_visitors = document.getElementById('num_visitors')
let person_list = document.getElementById('person_list')
const visitors = document.getElementById('visitors')
const $visitsItems = document.querySelectorAll('.visits-item')
const $btnAddItems = document.getElementById('btn-add-items')

for (let item of $visitsItems) {
  item.addEventListener('click', function(){
    this.classList.toggle('active')
  })
}

$btnAddItems.addEventListener('click', function(){
  for (item of $visitsItems) {
    if (item.classList.contains('active')){
      if(!visitors.hasAttribute('value')) {
        visitors.setAttribute('value', item.id.slice(7))
      } else {
        visitors.value += ',' + item.id.slice(7)
      }
      person_list.innerHTML += 
      `<li class="person_added list-inline-item mt-1" data-sort="${item.textContent}"><div class="btn-group btn-group" role="group"><span class="btn btn-outline-primary">${item.textContent}</span><button type="button" id="person_${item.id.slice(7)}" class="person_del btn btn-primary display-3">X</button></div></li>`

      num_visitors.textContent = (+num_visitors.textContent + 1)
      console.log(num_visitors.textContent)
    }
  }
})
</script> */
