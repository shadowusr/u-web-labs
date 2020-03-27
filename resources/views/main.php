<?php
$cards = [
    [
        'number' => 3,
        'caption' => 'Передача параметров',
        'description' => 'Напишите два PHP-скрипта: один с формой для передачи параметров, второй с расчетами, произведенными по полученным параметрам. Организуйте пользовательский интерфейс так, чтобы пользователь мог проводить расчеты многократно.',
        'variant' => 'Задайте два отрезка четырьмя точками. Найдите точку пересечения.',
    ],
    [
        'number' => 4,
        'caption' => 'Работа с файлами',
        'description' => 'Создайте форму, позволяющую задавать информацию по теме, представленной ниже в вариантах. Сохраните ее в файле на сервере. Организуйте поиск по одному из полей и редактирование найденной записи.',
        'variant' => 'Лекарства: название, тип, цена.',
    ],
    [
        'number' => 5,
        'caption' => 'Графика',
        'description' => 'Постройте любое цветное узнаваемое изображение с использованием повторяющихся элементов (циклы). В изображении использовать не менее 6 графических примитивов.',
    ],
    [
        'number' => 6,
        'caption' => 'Регулярные выражения',
        'description' => 'Напишите скрипт, который выполнит поиск определенных конструкций на странице http://grafika.me/node/37',
        'variant' => 'Выведите все комментарии внутри примеров на языке Pascal.',
    ],
    [
        'number' => 7,
        'caption' => 'Работа с базой данных',
        'description' => 'Создайте базу данных из двух таблиц по теме предложенной ниже. В каждой таблице определите по 4 столбца и заполните данными, близкими к реальным (не менее 5 записей). Организуйте интерфейс заполнения данными с контролем ссылочной целостности. Сделайте поиск в базе данных по двум любым столбцам.',
        'variant' => 'Музеи - картины',
    ],
    [
        'number' => 8,
        'caption' => 'Работа с Cookies и Session',
        'description' => 'Создайте два PHP-скрипта: index.php и test.php. Сделайте в первом скрипте index.php форму опроса пользователя с предложенными ниже в заданиях параметрами (или в варианте 8-9 просто заполните параметры нужными значениями). Сохраните значения введенных параметров в переменных массива \$_COOKIE или \$_SESSION. Передайте управление скрипту test.php без использования GET или POST запросов.\n',
        'variant' => 'Запомните время первого захода пользователя на страницу index.php. На странице test.php выводите сколько секунд назад пользователь зашел на сайт.',
    ],
    [
        'number' => 9,
        'caption' => 'Выполнение JavaScript в браузере клиента',
        'description' => 'Напишите два PHP-скрипта: один с формой для передачи параметров, второй с расчетами, произведенными по полученным параметрам. Организуйте пользовательский интерфейс так, чтобы пользователь мог проводить расчеты многократно. Решите следующую задачу:\nЗадайте два отрезка четырьмя точками. Найдите точку пересечения.',
        'variant' => 'Реализуйте масштабирование изображения с помощью кнопок.'
    ],
    [
        'number' => 10,
        'caption' => 'Использование популярных JS-библиотек',
        'description' => 'Подключите любые библиотеки JQuery.js, Fabric.js, Raphael.js или другую и напишите демосцену, наподобие представленных на сайте http://grafika.me/demoscene.',
    ],

];
?>

<section class="section-overview">
    <div class="container">
        <div class="row overflow-visible">
            <div class="col-9">
                <h1 class="ml-4" data-aos="fade-right">Здесь должна была быть <span class="color-blue">эффектная надпись</span>, но я её так и <span class="color-blue">не придумал</span>.</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3 class="heading-underlined">Обзор</h3>
            </div>
        </div>
        <div class="row px-4 pt-3">
            <div class="col-sm-6" data-aos="fade-up">
                <h6>О приложении</h6>
                <p>
                    Приложение написано с нуля, верстка построена на Bootstrap и используется библиотека AOS для анимаций появления элементов. Структура проекта вдохновлена Laravel. Идея надписи в header - ClaireLarsen (codepen).
                </p>
            </div>
            <div class="col-sm-6" data-aos="fade-up">
                <h6>Подробнее</h6>
                <p>
                    Весь код доступен на GitHub. Чтобы запустить приложение локально, достаточно выполнить команду:
                </p>
                <pre>git clone https://github.com/shadowusr/u-web-labs.git &&
cd u-web-labs &&
docker-compose up -d</pre>
                <p>
                    Для выполнения команды необходим установленный <a href="https://git-scm.com/downloads">Git</a> и <a href="https://docs.docker.com/compose/install/">Docker Compose</a>. После выполнения команды приложение запустится по адресу localhost:1212 (порт можно менять в файле docker-compose.yml).
                </p>
            </div>
        </div>
    </div>
</section>
<section class="section-cards">
    <div class="container pb-3">
        <div class="row mb-3">
            <div class="col-12">
                <h3 class="heading-underlined">Задания</h3>
            </div>
        </div>
        <?php
        for ($row = 0; $row < ceil(count($cards) / 3); $row++) {
            echo '<div class="row px-md-5">';
            for ($col = 0; $col < 3 && $row * 3 + $col < count($cards); $col++) {
                $card = $cards[$row * 3 + $col];
                $card['description'] = mb_substr($card['description'], 0, rand(80, 140)) . '...';
                $classes = 'card ' . ($col === 1 ? 'raised' : '');
                if (!file_exists(__DIR__ . '/tasks/task-' . $card['number'] . '.php')) {
                    $classes .= ' inactive';
                }
                echo <<<HEREDOC
                    <div class="col-md-4" data-aos="fade-up">
                        <a class="card-link" href="/tasks/{$card['number']}">
                            <div class="$classes">
                                <h4>{$card['number']}</h4>
                                <h5>{$card['caption']}</h5>
                                <p>{$card['description']}</p>
                            </div>
                        </a>
                    </div>
HEREDOC;
            }
            echo '</div>';
        }

        ?>
    </div>
</section>
<style>
    .card.inactive {
        background-color: #4b5263;
        border: 2px solid rgba(255, 255, 255, .8);
    }

    .card.inactive:hover {
        background-color: #5b6273;
    }

    .card.inactive > h4, .card.inactive h5 {
        color: rgba(255, 255, 255, .8);
    }

    .card.inactive > p {
        color: #2a3944;
    }

    @keyframes shake {
        0% {
            left: 0;
        }
        16% {
            left: 7px;
        }
        32% {
            left: -6px;
        }
        48% {
            left: 4px;
        }
        64% {
            left: -3px;
        }
        80% {
            left: 2px;
        }
        100% {
            left: -1px;
        }
    }
</style>
<script>
    let elements = document.getElementsByClassName('inactive');
    for (let i = 0; i < elements.length; i++) {
        elements[i].addEventListener('click', e => {
            e.preventDefault();
            let el = e.target;
            while (el.tagName != 'DIV') {
                el = el.parentElement;
            }
            el.style['animation'] = 'shake 1s ease-in-out';
            setTimeout(() => {
                el.style.animation = 'none';
            }, 1000);
        })
    }
</script>