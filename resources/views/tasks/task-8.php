<?php

$task = [
    'number' => 8,
    'caption' => 'Работа с Cookies и Session',
    'description' => 'Создайте два PHP-скрипта: index.php и test.php. Сделайте в первом скрипте index.php форму опроса пользователя с предложенными ниже в заданиях параметрами (или в варианте 8-9 просто заполните параметры нужными значениями). Сохраните значения введенных параметров в переменных массива $_COOKIE или $_SESSION. Передайте управление скрипту test.php без использования GET или POST запросов.',
    'variant' => 'Запомните время первого захода пользователя на страницу index.php. На странице test.php выводите сколько секунд назад пользователь зашел на сайт.',
];

if (!isset($_COOKIE['task-8-index-visit-time'])) {
    setcookie('task-8-index-visit-time', time(), time() + 60 * 60 * 24 * 30);
}

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
        <div class="row">

            <div class="col-12" data-aos="fade-up">
                <h3 class="heading-underlined">Результат</h3>
            </div>
            <div class="col-md-6">
                <div class="card dark" data-aos="fade-up">
                    <h5>Операция проведена успешно</h5>
                    <p>Время вашего первого посещения этой страницы сохранено в cookies.</p>
                    <button onclick="location.href='/tasks/8/test'">Перейти на страницу test.php</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" >
                <h3 class="heading-underlined" data-aos="fade-up">Исходный код</h3>
                <p data-aos="fade-up">Исходный код страницы доступен на <a href="https://github.com/shadowusr/u-web-labs/tree/master/resources/views/tasks/task-8.php">GitHub</a>.</p>
            </div>
        </div>
    </div>
</section>
<style>
    .card.dark {
        margin: 0;
        background-image: none;
        background-color: #27325d;
        border-radius: 5px;
        padding: 15px;
        box-shadow: 0px 0px 25px -5px rgba(0,0,0,0.3);
        border: none;
    }

    .card.dark h5 {
        margin: 0;
    }
    .card.dark p {
        background: transparent;
        color: rgba(255, 255, 255, .8);

    }
</style>