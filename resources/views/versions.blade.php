@extends('layouts.single')

@section('page-title')
Версии (и их описание)
@endsection


@section('content')

<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <b>0.1.0</b>
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div class="accordion-body">
         <ul>
					<li><b>[0.1.1]</b>  <b><i>Общее:</i></b> (С точки зрения безопасности) Просмотр/редактирование данных доступен только с авторизацией.</li>
					<li><b>[0.1.2]</b>  <b><i>Персоны:</i></b> Ввод и хранение сведений персон: ФИО, дата рождения, место рождения, контакты (телефон, соцсети, мессенджер), комментарий служителей.</li>
					<li><b>[0.1.3]</b>  <b><i>Персоны:</i></b> Просмотр общего списка ЦА.</li>
					<li><b>[0.1.4]</b>  <b><i>Персоны:</i></b> Просмотр/редактирование персон.</li>
					<li><b>[0.1.5]</b>  <b><i>Персоны:</i></b> Переход к редактированию персоны с общего списка ЦА.</li>
					<li><b>[0.1.6]</b>  <b><i>Персоны:</i></b> Переход к редактированию персоны через ввод с подсказкой, на странице редактирования персон.</li>
					<li><b>[0.1.7]</b>  <b><i>Персоны:</i></b> Добавление персоны в общий список ЦА</li>
					<li><b>[0.1.8]</b>  <b><i>Персоны:</i></b> В списках персон номер телефона интерактивен: если у персоны указан номер телефона, ему можно сразу позвонить в один клик.</li>
					<li><b>[0.1.9]</b>  <b><i>Встречи:</i></b> Функционал добавления встреч, с указанием даты, вида встречи, ответственного (опционально) и темы (опционально), а также списка посетивших.</li>
					<li><b>[0.1.11]</b>  <b><i>Адаптивность под различные экраны</i></b> </li>
					<li><b>[0.1.12]</b>  <b><i>Версионность:</i></b> Введена версионность разработки, а так же журнал с номерами версий.</li>
				 </ul>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Элемент аккордеона #2
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>Это тело аккордеона второго элемента.</strong> По умолчанию он скрыт, пока плагин свертывания не добавит соответствующие классы, которые мы используем для стилизации каждого элемента. Эти классы управляют общим внешним видом, а также отображением и скрытием с помощью переходов CSS. Вы можете изменить все это с помощью собственного CSS или переопределить наши переменные по умолчанию. Также стоит отметить, что практически любой HTML может быть помещен в <code>.accordion-body</code>, хотя переход ограничивает переполнение.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Элемент аккордеона #3
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>Это тело аккордеона третьего элемента.</strong> По умолчанию оно скрыто, пока плагин свертывания не добавит соответствующие классы, которые мы используем для стилизации каждого элемента. Эти классы управляют общим внешним видом, а также отображением и скрытием с помощью переходов CSS. Вы можете изменить все это с помощью собственного CSS или переопределить наши переменные по умолчанию. Также стоит отметить, что практически любой HTML может быть помещен в <code>.accordion-body</code>, хотя переход ограничивает переполнение.
      </div>
    </div>
  </div>
</div>

@endsection