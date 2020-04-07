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
                <p data-aos="fade-up">Исходный код страницы доступен на <a href="https://github.com/shadowusr/u-web-labs/tree/master/resources/views/tasks/task-5.php">GitHub</a>.</p>
            </div>
        </div>
    </div>
</section>
<style>
    .task-image {
        width: 100%;
        border: 4px solid #a5fde5;
        margin-top: 20px;
    }
    .alert {
        width: 100%;
        font-family: Nunito, sans-serif;
        display: flex;
        align-items: center;
        background-color: rgba(60, 54, 199, 0.51);
        border: 2px solid #4d00ff;
    }

    .alert > svg {
        height: 45px;
        flex-shrink: 0;
    }
    .alert > svg > path {
        fill: rgba(255, 255, 255, .8);
    }

    .alert > p {
        margin: 0;
        margin-left: 20px;
    }

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

    .buttons-container {
        display: flex;
    }

    .buttons-container > button {
        margin-left: 10px;
    }
    .buttons-container > button:first-child {
        margin-left: 0;
    }

    button.pastel {
        background: linear-gradient(90deg, rgba(255,146,70,1) 0%, rgba(255,64,201,1) 100%);
    }
    button.dark-blue {
        background: linear-gradient(90deg, rgba(0,106,255,1) 0%, rgba(58,0,177,1) 100%);
    }
</style>