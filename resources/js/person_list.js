/* === VARIABLES === */

const $personSearchInput = document.getElementById("person_search_input");
const $btnNewPerson = document.getElementById("new_person");
let person_list = document.getElementById("person_list");
const num_visitors = document.getElementById("num_visitors");


let person_selected_list = [];
let new_person_list = [];

/* === FUNCTIONS === */

// Добавление персоны в список через Модальное окно
const visitors = document.getElementById("visitors");
const $visitsItems = document.querySelectorAll(".visits-item");
const $btnAddItems = document.getElementById("btn-add-items");

for (let item of $visitsItems) {
    item.addEventListener("click", function () {
        this.classList.toggle("active");
    });
}

$btnAddItems.addEventListener("click", function () {
    for (let item of $visitsItems) {
        if (item.classList.contains("active")) {
            personAdd(item);
        }
    }

    // удаление элементов
    let elementDeletes = document.querySelectorAll(".person_del");
    for (let el of elementDeletes) {
        el.addEventListener("click", function () {
            personDelete(el);
        });
    }
});

// Добавление Новой Персоны
$btnNewPerson.addEventListener('click', function(){
    // person_search_input
    let newPerson = $personSearchInput.value
    $personSearchInput.value = ''

    // new_person_list
    new_person_list.push('newperson_' + newPerson)

    // num_visitors
    num_visitors.textContent = person_selected_list.length + new_person_list.length;

    // person_list
    person_list.innerHTML += `
        <div class="btn-group btn-group person" role="group">
            <span class="btn btn-outline-success">${newPerson}</span>
            <button type="button" id="${'newperson_' + newPerson}" class="person_del btn btn-success display-3">X</button>
        </div>`

        // удаление новых персон
        let elements = document.querySelectorAll('.person_del')
        console.log(elements)
        for(let elem of elements) {
            elem.addEventListener('click', function(){
                for (let i = new_person_list.length - 1; i >= 0; i--) {
                    if (new_person_list[i] === elem.id) {
                        new_person_list.splice(i, 1);
                        console.log(new_person_list);
                    }
                }
                elem.closest('.person').remove()
                num_visitors.textContent = person_selected_list.length + new_person_list.length;
            })
        }

})


/* === METHODS === */

// Добавление персоны
function personAdd(item) {
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

        // добавление самого элемента
        person_list.innerHTML += `<li class="person_added list-inline-item mt-1 g-col-6" data-sort="${item.textContent}"><div class="btn-group btn-group" role="group"><span class="btn btn-outline-primary">${item.textContent}</span><button type="button" id="person_${id}" class="person_del btn btn-primary display-3">X</button></div></li>`;

        num_visitors.textContent = person_selected_list.length + new_person_list.length;
    }
}

// Удаление персон
function personDelete(el) {
    let id = +el.id.slice(7);
    changeCounters(id);

    // удаляем сам элемент
    el.closest(".person_added").remove();
}

// Изменение счётчиков
function changeCounters(id) {
    // меняем массив person_selected_list
    for (let i = person_selected_list.length - 1; i >= 0; i--) {
        if (person_selected_list[i] === id) {
            person_selected_list.splice(i, 1);
        }
    }

    // меняем счётчик num_visitors
    num_visitors.textContent = person_selected_list.length + new_person_list.length;

    // меняем visitors
    visitors.removeAttribute("value");
    for (let el of person_selected_list) {
        if (!visitors.hasAttribute("value")) {
            visitors.setAttribute("value", el);
        } else {
            visitors.value += "," + el;
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

/* Добавляющийся элемент в список выбранных
	<li class="person_added list-inline-item mt-1" data-sort="Амелина Олеся">
		<div class="btn-group btn-group" role="group">
			<span class="btn btn-outline-primary">Амелина Олеся</span>
			<button type="button" id="person_8" class="person_del btn btn-primary display-3">X</button>
		</div>
	</li>
*/
/* Добавлена Новая Персона
  <div class="btn-group btn-group" role="group">
    <span class="btn btn-outline-success">Богатенков Александр</span>
    <button type="button" id="newperson_Богатенков Александр" class="person_del btn btn-success display-3">X</button>
  </div>
*/




// удалить после успешной замены кода
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
