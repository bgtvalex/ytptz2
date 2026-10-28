/* === ПЕРЕМЕННЫЕ === */

const $personSearchInput = document.getElementById('person_search_input')
const $newPerson = document.getElementById('new_person')
let person_list = document.getElementById('person_list')
const num_visitors = document.getElementById('num_visitors')

let person_selected_list = []
let new_person_list = []


/* === ФУНКЦИОНАЛ === */

// Добавление персоны в список через Модальное окно
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


/* === МЕТОДЫ === */


/* ===  HTML-элементы === */

/* Выпадающий элемент списка выбираемых
	<div id="person_search_list" class="list-group person-select table-striped">
		<span class="list-group-item person_selected list-group-item-action" id="person_8">
			Амелина Олеся 
			<i class="text-secondary">Нажмите, чтобы добавить</i>
		</span>
	</div>
*/

/* Добавлющийся элемент в список выбранных
	<li class="person_added list-inline-item mt-1" data-sort="Амелина Олеся">
		<div class="btn-group btn-group" role="group">
			<span class="btn btn-outline-primary">Амелина Олеся</span>
			<button type="button" id="person_8" class="person_del btn btn-primary display-3">X</button>
		</div>
	</li>
*/