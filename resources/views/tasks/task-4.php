<?php

$task = [
    'number' => 4,
    'caption' => 'Работа с файлами',
    'description' => 'Создайте форму, позволяющую задавать информацию по теме, представленной ниже в вариантах. Сохраните ее в файле на сервере. Организуйте поиск по одному из полей и редактирование найденной записи.',
    'variant' => 'Лекарства: название, тип, цена.',
];

if (file_exists(__DIR__ . '/../../files/' . $_COOKIE['client-id'] . '-task-4-data.json')) {
    $items = json_decode(file_get_contents(__DIR__ . '/../../files/' . $_COOKIE['client-id'] . '-task-4-data.json'), true);
} else {
    $items = [];
}

array_walk($items, function(&$item) {
    $item['name'] = htmlentities($item['name'], ENT_QUOTES);
    $item['type'] = htmlentities($item['type'], ENT_QUOTES);
    $item['price'] = htmlentities($item['price'], ENT_QUOTES);
});


?>

<section class="section-overview">
    <div class="container">
        <div class="row">
            <div class="col-12" >
                <h3 class="heading-underlined" data-aos="fade-up">Задание</h3>
                <h6 data-aos="fade-up">#<?= $task['number'] . ' ' . $task['caption'] ?></h6>
                <p data-aos="fade-up"><?= $task['description'] ?></p>
                <?php
                if (isset($task['variant'])) {
                    echo <<<HEREDOC
                <h6 data-aos="fade-up">Вариант</h6>
                <p data-aos="fade-up">{$task['variant']}</p>
HEREDOC;
                }
                ?>
            </div>
        </div>
        <div class="row pb-3">

            <div class="col-12" data-aos="fade-up">
                <h3 class="heading-underlined">Результат</h3>

            </div>
            <div class="col-md-8">
                <div class="alert" data-aos="fade-up">
                    <svg viewBox="0 0 576 512"><path d="M270.2 160h35.5c3.4 0 6.1 2.8 6 6.2l-7.5 196c-.1 3.2-2.8 5.8-6 5.8h-20.5c-3.2 0-5.9-2.5-6-5.8l-7.5-196c-.1-3.4 2.6-6.2 6-6.2zM288 388c-15.5 0-28 12.5-28 28s12.5 28 28 28 28-12.5 28-28-12.5-28-28-28zm281.5 52L329.6 24c-18.4-32-64.7-32-83.2 0L6.5 440c-18.4 31.9 4.6 72 41.6 72H528c36.8 0 60-40 41.5-72zM528 480H48c-12.3 0-20-13.3-13.9-24l240-416c6.1-10.6 21.6-10.7 27.7 0l240 416c6.2 10.6-1.5 24-13.8 24z"></path></svg>
                    <p>Вся информация, сохраняемая здесь в файл, является временной - файл будет удален после перезагрузки контейнера. Это сделано намеренно.<br>Чтобы информация не стиралась, нужно подключить Amazon S3 или подобный облачный сервис хранения данных, но тогда это бы уже не было работой с файлами. Поэтому пока что так.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="alert warning" data-aos="fade-up">
                    <svg viewBox="0 0 576 512"><path d="M270.2 160h35.5c3.4 0 6.1 2.8 6 6.2l-7.5 196c-.1 3.2-2.8 5.8-6 5.8h-20.5c-3.2 0-5.9-2.5-6-5.8l-7.5-196c-.1-3.4 2.6-6.2 6-6.2zM288 388c-15.5 0-28 12.5-28 28s12.5 28 28 28 28-12.5 28-28-12.5-28-28-28zm281.5 52L329.6 24c-18.4-32-64.7-32-83.2 0L6.5 440c-18.4 31.9 4.6 72 41.6 72H528c36.8 0 60-40 41.5-72zM528 480H48c-12.3 0-20-13.3-13.9-24l240-416c6.1-10.6 21.6-10.7 27.7 0l240 416c6.2 10.6-1.5 24-13.8 24z"></path></svg>
                    <p>Все введенные данные видны только Вам. Каждому устройству присваивается уникальный идентификатор и хранится в cookies.</p>
                </div>
            </div>
            <div class="col-12">
                <div class="card-form" data-aos="fade-up">
                    <label class="form-caption">Просмотр записей</label>
                    <table>
                        <thead>
                            <tr>
                                <th>Название</th>
                                <th>Тип</th>
                                <th>Цена</th>
                            </tr>
                        </thead>
                        <?php
                        if (count($items ) > 0) {
                            foreach ($items as $item) {
                                echo <<<HEREDOC
                            <tr>
                                <td>{$item['name']}</td>
                                <td>{$item['type']}</td>
                                <td>{$item['price']}</td>
                            </tr>
HEREDOC;
                            }
                        } else {
                            echo '<tr><td colspan="3" class="table-empty-set">Нет записей</td></tr>';
                        }

                        ?>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-form" data-aos="fade-up">
                    <label class="form-caption">Добавить новую запись</label>
                    <form class="container" action="/tasks/4/create">
                        <div class="row">
                            <div class="col-12">
                                <label>Название</label>
                            </div>
                            <div class="col-12">
                                <input type="text" name="name" placeholder="Название" required />
                            </div>
                            <div class="col-12">
                                <label>Тип</label>
                            </div>
                            <div class="col-12">
                                <input type="text" name="type" placeholder="Тип" required />
                            </div>
                            <div class="col-12">
                                <label>Цена</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="price" placeholder="Цена" required pattern="-?[0-9]+((.|,)[0-9]+)?"/>
                            </div>

                            <input type="submit" value="Создать">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-form" data-aos="fade-up">
                    <label class="form-caption">Поиск записи</label>
                    <form class="container" action="/tasks/4/search">
                        <div class="row">
                            <div class="col-12">
                                <label>Название</label>
                            </div>
                            <div class="col-12">
                                <input type="text" name="name" placeholder="Название" required />
                            </div>

                            <input type="submit" value="Поиск">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" >
                <h3 class="heading-underlined" data-aos="fade-up">Исходный код</h3>
                <p data-aos="fade-up">Исходный код страницы доступен на <a href="https://github.com/shadowusr/u-web-labs/tree/master/resources/views/tasks/task-3.php">GitHub</a>.</p>
            </div>
        </div>
    </div>
</section>
<style>
    .alert {
        width: 100%;
        font-family: Nunito, sans-serif;
        display: flex;
        align-items: center;
        background-color: rgba(243, 6, 61, .5);
        border: 2px solid #ff1032;
    }

    .alert.warning {
        background-color: rgba(255, 94, 0, 0.5);
        border: 2px solid #ff682e;
    }



    .alert > svg {
        margin-top: -60px;
        height: 45px;
        flex-shrink: 0;
    }
    .alert > svg > path {
        fill: rgba(255, 255, 255, .8);
    }

    .alert > p {
        margin-left: 20px;
    }

    .card-form {
        background-color: #27325d;
        border-radius: 5px;
        padding: 10px;
        box-shadow: 0px 0px 25px -5px rgba(0,0,0,0.3);
        margin: 30px 0 0;
    }
    table {
        width: 100%;
    }
    .table-empty-set {
        color: #a5fde5;
        text-align: center;
        padding: 20px;
    }
</style>