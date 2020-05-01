<?php

$task = [
    'number' => 10,
    'caption' => 'Использование популярных JS-библиотек',
    'description' => 'Подключите любые библиотеки JQuery.js, Fabric.js, Raphael.js или другую и напишите демосцену, наподобие представленных на сайте http://grafika.me/demoscene.',
];

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
                <h6>Сервис хранения текста</h6>
                <p>zbin - это сервис хранения текста, похожий на pastebin с некоторыми улучшениями:</p>
                <ul class="features-list">
                    <li>Пользовательские URL</li>
                    <li>Короткие ссылки</li>
                    <li>Темная тема</li>
                    <li>Реализация через spa-приложение</li>
                    <li>Поддержка подсветки синтаксиса для большего количества языков</li>
                </ul>
                <p>Приложение написано целиком на Javascript с использованием React, Nest, GraphQL API и Mongo.</p>
                <p>Сервис доступен по адресу: <a href="http://zbin.me/" target="_blank" rel="noreferrer noopener">zbin.me</a></p>
                <p>Весь код приложения доступен на github: <a href="https://github.com/shadowusr/zbin-frontend" target="_blank" rel="noreferrer noopener">frontend</a>, <a href="https://github.com/shadowusr/zbin-backend">backend</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12" >
                <h3 class="heading-underlined" data-aos="fade-up">Исходный код</h3>
                <p data-aos="fade-up">Исходный код страницы доступен на <a href="https://github.com/shadowusr/u-web-labs/tree/master/resources/views/tasks/task-10.php">GitHub</a>.</p>
            </div>
        </div>
    </div>
</section>
<style>
.features-list {
    color: rgba(255, 255, 255, .7);
    list-style: square;
    padding-left: 20px;
}
</style>