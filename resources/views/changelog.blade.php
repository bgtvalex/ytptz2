@extends('layouts.single')


@section('page-title')
Дневник разработки (бэклог и чейнджлог)
@endsection


@section('content')
<div class="lead">Ниже описаны три очереди задач, каждой задаче присвоены ярлычки:
    <span class="badge rounded-pill text-bg-secondary">В очереди</span>
    <span class="badge rounded-pill text-bg-warning">В работе</span>
    <span class="badge rounded-pill text-bg-success">Сделано</span>
    <span class="badge rounded-pill text-bg-danger">Отменено</span>
    <span class="badge rounded-pill text-bg-info">Автор идеи</span>
</div>


<div class="accordion mt-4" id="devStages">

    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                Первоочередное
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#devStages">
            <div class="accordion-body">
                <ul>
                    <li>Общее:
                        <ul>
                            <li>
                                <del>Просмотр справочной информации доступен без авторизации</del>
                                <span class="badge rounded-pill text-bg-danger">Отменено</span>
                            </li>
                            <li>(С точки зрения безопасности) Просмотр/редактирование данных доступен только савторизацией
                            <span class="badge rounded-pill text-bg-success">Сделано</span>
                            </li>
                            <li>С персонами лидеров/служителей связаны учетные записи для входа.
                                <span class="badge rounded-pill text-bg-secondary">В очереди</span>
                            </li>
                            <li>Выстроена понятная и прозрачная система страниц и отображений (view).
                                <span class="badge rounded-pill text-bg-secondary">В очереди</span>
                            </li>
                        </ul>
                    </li>
                    <li>Персоны:
                        <ul>
                            <li>Ввод и хранение сведений персон: ФИО, дата рождения, место рождения, контакты (телефон,
                                соцсети, мессенджер), комментарий служителей.
                                <span class="badge rounded-pill text-bg-success">Сделано</span>
                            </li>
                            <li>При добавлении персоны: проверка на наличие уже существующей такой.
                                <span class="badge rounded-pill text-bg-secondary">В очереди</span>

                            </li>
                            <li>Просмотр общего списка ЦА.
                                <span class="badge rounded-pill text-bg-success">Сделано</span>
                            </li>
                            <li>Просмотр/редактирование персон
                                <span class="badge rounded-pill text-bg-success">Сделано</span>
                            </li>
                            <li>Переход к редактированию персоны с общего списка ЦА.
                                <span class="badge rounded-pill text-bg-success">Сделано</span>
                            </li>
                            <li>Переход к редактированию персоны через ввод с подсказкой, на странице редактирования
                                персон.
                                <span class="badge rounded-pill text-bg-success">Сделано</span>
                            </li>
                            <li>Добавление персоны в общий список ЦА
                                <span class="badge rounded-pill text-bg-success">Сделано</span>
                            </li>
                            <li>Фильтры в списке ЦА: просто выпадающими списками (Служитель/не служитель; пол: не указано/мужской/женский; город: не указано/Птз/Карелия/другое; Возраст: не указано/14-16/16-18/18-20/старше 20; Дата рождения: не указано/зима/весна/лето/осень; и т.д.)
                                <span class="badge rounded-pill text-bg-secondary">В очереди</span>
                            </li>
                            <li>В списках персон номер телефона интерактивен: если у персоны указан номер телефона, ему можно сразу позвонить в один клик.
                                <span class="badge rounded-pill text-bg-success">Сделано</span>
                            </li>
                            <li>Гиперактивные (кликабельные) ссылки на соцсети.
                                <span class="badge rounded-pill text-bg-secondary">В очереди</span>
                            </li>
                        </ul>
                    </li>
                    <li>Встречи: <span class="badge rounded-pill text-bg-warning">В работе</span>
                        <ul>
                            <li>Функционал добавления встреч, с указанием даты, вида встречи, отвестственного (опционально) и темы (опционально), а также списка посетивших.
                                <span class="badge rounded-pill text-bg-success">Сделано</span>
                            </li>
                            <li>Страница со статистикой посещения встреч, с фильтром по типам встреч
                                <span class="badge rounded-pill text-bg-secondary">В очереди</span>
                            </li>
                            <li>Страница с графиком посещения встреч, с фильтром по типам встреч
                                <span class="badge rounded-pill text-bg-secondary">В очереди</span>
                            </li>
                            <li>
                                При создании встречи, в список посетителей можно добавлять гостей (кого еще нет в общем списке ЦА). В общем списке ЦА гости отмечаются пометкой "гость", можно просмотреть три их последних посещения.
                                <span class="badge rounded-pill text-bg-success">Сделано</span>
                            </li>
                            <li>В список посетителей можно добавить гостей - тех, кто пришел первый раз (и возможно единственный). Посещение гостей не отслеживается, но их можно выбрать в качестве посетителей, и их можно посмотреть в отдельном списке "Гости" (не "ЦА"). Строка с ними выделена курсивом, и, например, с пометкой <i>"был(а) на молодежке такого-то числа"</i>. Если на какую-то встречу гость приходит три и более раз, система предлагает добавить персону в отслеживание. Такое же поведение и для "неактуальных" (не ЦА по возрасту) персон.
                                <span class="badge rounded-pill text-bg-secondary">В очереди</span>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Задачи, реализуемые во вторую очередь (когда будет доделано первое):
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#devStages">
            <div class="accordion-body">
                <ul>
                    <li>Встречи
                        <ul>
                            <li>
                                Редактирование уже введенной и сохраненной встречи.
                                <span class="badge rounded-pill text-bg-secondary">В очереди</span>
                            </li>
                            <li>
                                При создании встречи домашки, автоматически предлагать добавить участников этой домашки (подопечных). Возможно, всплывающее окно с предложением отметить галочками.
                                <span class="badge rounded-pill text-bg-secondary">В очереди</span>
                            </li>
                        </ul>
                    </li>
                    <li>Отметки:
                        <ul>
                            <li>
                                Заметки лидеров о критическом состоянии персоны, с комментарием
                                <span class="badge rounded-pill text-bg-secondary">В очереди</span>
                            </li>
                            <li>
                                Отметка лидеров о неактивном статусе персоны, с комментарием. Неактивный статус - если персона больше не в ЦА, отслеживание не требуется (например, уехал в др.город).
                                <span class="badge rounded-pill text-bg-secondary">В очереди</span>
                            </li>
                        </ul>
                    </li>
                    <li>Лидеры и подопечные:
                        <ul>
                            <li>
                                Лидер может редактировать инфо о своих подопечных
                                <span class="badge rounded-pill text-bg-secondary">В очереди</span>
                            </li>
                            <li>
                                Лидер может получать уведомления о Днях рождения подопечных.
                                <span class="badge rounded-pill text-bg-secondary">В очереди</span>
                            </li>
                            <li>
                                Лидер может получать уведомления, если они долгий срок (2 недели...месяц) не посещают
                                встречи.
                                <span class="badge rounded-pill text-bg-secondary">В очереди</span>
                            </li>
                        </ul>
                    </li>
                    <li>Дополнительное:
                        <ul>
                            <li>
                                При просмотре общего списка ЦА можно применить сортировки и фильтры: служители/ЦА,
                                сортировка по дате рождения с учетом года или без, мужской/женский пол, место рождения.
                                <span class="badge rounded-pill text-bg-secondary">В очереди</span>
                                <span class="badge rounded-pill text-bg-info">Соня Борисова</span>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="accordion-item">
  
        <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Остальное: предлагаемый функционал.&nbsp;<i class="text-secondary">Эти задачи будут со временем перемещаться в первую или вторую очередь.</i>
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#devStages">
            <div class="accordion-body">
                Полезные фишки:
                <ul>
                    <li>В списках ЦА ссылки на соцсети/мессенджеры интерактивны: переход в соответствующий чат возможен
                        в один клик.</li>
                    <li>Лидер, имеющий подопечных, может сделать групповую рассылку своим подопечным.
                        <span class="badge rounded-pill text-bg-info">Женя Кукушкина</span>
                    </li>
                    <li>Страница "Список лидеров/служителей", с отметками - в каком отделе служит (ДГ, МС).
                        <span class="badge rounded-pill text-bg-info">Женя Кукушкина</span>
                    </li>
                    <li>Сортировка списка ЦА по их активности
                        <span class="badge rounded-pill text-bg-info">Девора Никитенкова</span>
                    </li>
                    <li>Система наград/поощрения ЦА за посещение всех мероприятий
                        <span class="badge rounded-pill text-bg-info">Девора Никитенкова</span>
                    </li>
                    <li>В материалы: список "ледоколов", разных форматов и кейсов проведения.
                        <span class="badge rounded-pill text-bg-info">Девора Никитенкова</span>
                    </li>
                    <li>Добавлять к проводимым домашкам предлагаемый опорный конспект по темам.
                        <span class="badge rounded-pill text-bg-info">Девора Никитенкова</span>
                    </li>
                    <li>Автоматические уведомления ЦА о предстоящих встречах (через мессенджеры/соцсети).</li>
                    <li>Автоматические уведомления актива о предстоящих встречах (через мессенджеры/соцсети).
                        <span class="badge rounded-pill text-bg-info">Женя Детчуев</span>
                    </li>
                    <li>Автоопределение пола персоны по имени.</li>
                    <li>Автоформатирование номера телефона.</li>
                    <li>При просмотре общего списка ЦА можно применить сортировки: по дате добавления в список; по дате последних изменений.</li>
                    <li>... и фильтры: по лидерам/домашним группам; по месту рождения (Петрозаводск, Карелия (районы), Россия (регионы))</li>
                    <li>В список встреч можно добавлять встречи служителей.</li>
                    <li>Возможность добавлять данные из excel/CSV, например, по персонам (из файлов регистрации).</li>
                    <li>На странице добавления персон: чекбокс "Добавить много" (поточное добавление) позволяет после добавления остаться на странице добавления и добавлять еще людей. Возможно, реализация в виде <a target="_blank" href="https://bootstrap-4.ru/docs/5.2/components/button-group/#nesting">кнопки с выпадающим списком действий</a>.</li>
                    <li>Ведение для служителей статистики ответственности за встречи.</li>
                    <li>Ведение справочников, доступных для редактирования администраторами: виды встреч; популярные адреса; пол; место рождения, и т.д..</li>

                </ul>
            </div>
        </div>
    </div>
</div>

<h4 class="mt-4">Используемый стек технологий:</h4>
<ul>
    <li>Язык: <a target="_blank" href="https://www.php.net/manual/ru/langref.php">PHP 8.0.26</a></li>
    <li>Основной PHP-фреймворк: <a target="_blank" href="https://laravel.com/docs/9.x/">Laravel v9.50.1.</a></li>
    <li>*** Дополнительные фреймворки и библиотеки: Laravel UI 4.1, Livewire 2.10</li>
    <li>CSS-фреймворк: <a target="_blank" href="https://bootstrap-4.ru/docs/5.3/">Bootstrap 5.3.0</a></li>
    <li>Иконки (значки): <a target="_blank" href="https://icons.bootstrap-4.ru/">Bootstrap Ions</a>, <a target="_blank" href="https://fontawesome.com/icons">Font Awesome</a>.</li>
    <li>Сервер БД: MySQL Server 8.0</li>
    <li>NodeJS 18.12.1, npm 9.2.0</li>
    <li>Архитектура приложения: MVC.</li>
</ul>

<h4 class="mt-4">Задачи разработки:</h4>
<ul>
    <li>Авторизация <span class="badge rounded-pill text-bg-success">Сделано</span></li>
    <li>Покрытие тестами <span class="badge rounded-pill text-bg-secondary">В очереди</span></li>
    <li>Развертывание - Continous Deploying <span class="badge rounded-pill text-bg-warning">В работе</span></li>
    <li>Версионность и командная разработка - Continous Integration <span class="badge rounded-pill text-bg-warning">В работе</span></li>
    <li>Перенос на домен/поддомен msptz.ru и SSL-сертификат <span class="badge rounded-pill text-bg-secondary">В очереди</span></li>
    <li>Обеспечение отказоустойчивости (перезагрузка по сторожевым таймерам) и резервное копирование на NAS <span class="badge rounded-pill text-bg-secondary">В очереди</span></li>
</ul>
<br/>
<br/>
<br/>

@endsection