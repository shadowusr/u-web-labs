<?php

$task = [
    'number' => 6,
    'caption' => 'Регулярные выражения',
    'description' => 'Напишите скрипт, который выполнит поиск определенных конструкций на странице http://grafika.me/node/37',
    'variant' => 'Выведите все комментарии внутри примеров на языке Pascal.',
];

$response = file_get_contents('http://grafika.me/node/37');
preg_match_all('/<pre class=".*?pascal.*?">(.*?)<\/pre>/is', $response, $codeBlocks);
$clearedCodeBlocks = preg_replace('/<span.*?>|<\/span>/i', '', $codeBlocks[1]);
$code = implode("\n", $clearedCodeBlocks);
preg_match_all('#//.*?$#im', $code, $comments);
$commentsString = htmlentities(implode("\n", $comments[0]), ENT_QUOTES);

$regularExpressions = [
    [
        'regex' => htmlentities('/<pre class=".*?pascal.*?">(.*?)<\/pre>/is', ENT_QUOTES),
        'description' => 'Для выборки всех блоков с кодом на языке паскаль:',
    ],
    [
        'regex' => htmlentities('/<span.*?>|<\/span>/i', ENT_QUOTES),
        'description' => htmlentities('Для очистки всех <span>, которые использовались для подсветки кода:', ENT_QUOTES),
    ],
    [
        'regex' => htmlentities('#//.*?$#im', ENT_QUOTES),
        'description' => 'Для выборки комментариев:',
    ],
]

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
            <div class="col-12" data-aos="fade-up">
                <h6>Использованные регулярные выражения</h6>
                <?php
                foreach ($regularExpressions as $regularExpression) {
                    echo "<p>{$regularExpression['description']}</p><pre><code>{$regularExpression['regex']}</code></pre>";
                }
                ?>
                <h6>Итоговый ответ</h6>
                <pre><code><?=$commentsString?></code></pre>
            </div>
        </div>
        <div class="row">
            <div class="col-12" >
                <h3 class="heading-underlined" data-aos="fade-up">Исходный код</h3>
                <p data-aos="fade-up">Исходный код страницы доступен на <a href="https://github.com/shadowusr/u-web-labs/tree/master/resources/views/tasks/task-6.php">GitHub</a>.</p>
            </div>
        </div>
    </div>
</section>
<style>

</style>