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

$searchName = trim($_GET['name']);

$success = false;
if (empty($searchName)) {
    $status = 'Необходимо указать имя.';
} elseif (!is_string($searchName) || mb_strlen($searchName) > 128) {
    $status = nl2br("Введите корректное имя для поиска. Допускаются строки, длиной не более 128 символов.");
} else {
    $minIndex = -1;
    $minDist = 100000;
    foreach ($items as $index => $item) {
        $dist = levenshtein($searchName, $item['name']);
        if ($dist < 4 && $dist < $minDist) {
            $minIndex = $index;
            $minDist = $dist;
        }
    }
    $searchName = htmlentities($searchName, ENT_QUOTES);
    if ($minIndex == -1) {
        $success = false;
        $status = 'Записи с именем "' . $searchName . '" не найдено.';
    } else {
        $success = true;
        $item = $items[$minIndex];
        $item['name'] = htmlentities($item['name'], ENT_QUOTES);
        $item['type'] = htmlentities($item['type'], ENT_QUOTES);
        $item['price'] = htmlentities($item['price'], ENT_QUOTES);
        if ($minDist == 0) {
            $status = 'Запись найдена!';
        } else {
            $status = "Записи с именем \"{$searchName}\" не существует, но \"{$item['name']}\" выглядит похожим!";
        }
    }
}

?>

<section class="section-overview">
    <div class="container">
        <div class="row">
            <div class="col-12" data-aos="fade-up">
                <h3 class="heading-underlined">Задание</h3>
                <h6>#<?= $task['number'] . ' ' . $task['caption'] ?></h6>
                <p><?= $task['description'] ?></p>
                <?php
                if (isset($task['variant'])) {
                    echo <<<HEREDOC
                <h6>Вариант</h6>
                <p>{$task['variant']}</p>
HEREDOC;
                }
                ?>
            </div>
        </div>
        <div class="row">
            <?php
            if ($success) {
                echo <<<HEREDOC
            <div class="offset-md-2 col-md-8">
                <div class="alert success" data-aos="fade-up">
                    <svg viewBox="0 0 512 512"><path fill="currentColor" d="M435.848 83.466L172.804 346.51l-96.652-96.652c-4.686-4.686-12.284-4.686-16.971 0l-28.284 28.284c-4.686 4.686-4.686 12.284 0 16.971l133.421 133.421c4.686 4.686 12.284 4.686 16.971 0l299.813-299.813c4.686-4.686 4.686-12.284 0-16.971l-28.284-28.284c-4.686-4.686-12.284-4.686-16.97 0z" class=""></path></svg>
                    <p>$status</p>
                </div>
            </div>
            <div class="offset-md-3 col-md-6">
                <div class="card-form" data-aos="fade-up">
                    <label class="form-caption">Редактирование</label>
                    <form class="container" action="/tasks/4/save">
                        <div class="row">
                            <input type="hidden" name="index" value="$minIndex">
                            <div class="col-12">
                                <label>Название</label>
                            </div>
                            <div class="col-12">
                                <input type="text" name="name" placeholder="Название" required value="{$item['name']}"/>
                            </div>
                            <div class="col-12">
                                <label>Тип</label>
                            </div>
                            <div class="col-12">
                                <input type="text" name="type" placeholder="Тип" required value="{$item['type']}"/>
                            </div>
                            <div class="col-12">
                                <label>Цена</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="price" placeholder="Цена" required pattern="-?[0-9]+((.|,)[0-9]+)?" value="{$item['price']}"/>
                            </div>

                            <input type="submit" value="Сохранить">
                        </div>
                    </form>
                </div>
            </div>
HEREDOC;

            } else {
                echo <<<HEREDOC
            <div class="offset-md-2 col-md-8">
                <div class="alert" data-aos="fade-up">
                    <svg viewBox="0 0 576 512"><path d="M270.2 160h35.5c3.4 0 6.1 2.8 6 6.2l-7.5 196c-.1 3.2-2.8 5.8-6 5.8h-20.5c-3.2 0-5.9-2.5-6-5.8l-7.5-196c-.1-3.4 2.6-6.2 6-6.2zM288 388c-15.5 0-28 12.5-28 28s12.5 28 28 28 28-12.5 28-28-12.5-28-28-28zm281.5 52L329.6 24c-18.4-32-64.7-32-83.2 0L6.5 440c-18.4 31.9 4.6 72 41.6 72H528c36.8 0 60-40 41.5-72zM528 480H48c-12.3 0-20-13.3-13.9-24l240-416c6.1-10.6 21.6-10.7 27.7 0l240 416c6.2 10.6-1.5 24-13.8 24z"></path></svg>
                    <p>$status</p>
                </div>
            </div>
HEREDOC;
            }
            ?>
            <?php
            if ($success) {
                echo <<<HEREDOC
            <div class="col-12 d-flex">
                <a class="mx-auto my-2 mt-4 link-clear" href="/tasks/4/delete?index=$minIndex" data-aos="fade-up"><button class="danger"><i class="fas fa-times mr-2"></i>Удалить</button></a>
            </div>
HEREDOC;
            }
            ?>
            <div class="col-12 d-flex">
                <a class="mx-auto my-2 mt-3 link-clear" href="/tasks/4" data-aos="fade-up"><button><i class="fas fa-arrow-left mr-2"></i>Назад</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12" >
                <h3 class="heading-underlined" data-aos="fade-up">Исходный код</h3>
                <p data-aos="fade-up">Исходный код страницы доступен на <a href="https://github.com/shadowusr/u-web-labs/tree/master/resources/views/tasks/task-4-search.php">GitHub</a>.</p>
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

    .alert.success {
        background-color: rgba(0, 255, 184, 0.5);
        border: 2px solid #2effc5;
    }

    .alert > svg {
        height: 45px;
        flex-shrink: 0;
    }
    .alert > svg > path {
        fill: rgba(255, 255, 255, .8);
    }

    .alert > p {
        flex-grow: 1;
        margin-left: 20px;
    }

    .card-form {
        background-color: #27325d;
        border-radius: 5px;
        padding: 10px;
        box-shadow: 0px 0px 25px -5px rgba(0,0,0,0.3);
        margin: 30px 0 0;
    }

    button.danger {
        background: linear-gradient(90deg, rgb(243, 17, 17) 0%, #ff8924 100%);
    }
</style>