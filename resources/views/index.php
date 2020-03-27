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

<!doctype html>
<html id="top">
<head>
    <title>Test title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/app.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
    <body>
    <header>
        <svg id="svg-stripe" preserveAspectRatio="none" viewBox="0 0 200 50">
<style type="text/css">
    /*.st0{fill:url(#SVGID_1_);}*/
    .st1{fill: none;}
</style>
            <!--<linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="-0.5" y1="40" x2="122.5" y2="40">
                <stop  offset="6.520855e-04" style="stop-color:#71D2E0"/>
                <stop  offset="0.1578" style="stop-color:#68CCDF"/>
                <stop  offset="0.4191" style="stop-color:#4EBCDD"/>
                <stop  offset="0.7503" style="stop-color:#25A1DA"/>
                <stop  offset="0.969" style="stop-color:#068DD7"/>
            </linearGradient>-->
            <clipPath id="svg-stripe-clip">
                <polygon class="st0" points="122.5,53.5 -0.5,26.5 -0.5,34.5 114.5,53.5 " style="fill: #00f2c3"/>
            </clipPath>
<!--            <line class="st1" x1="-2" y1="30" x2="115" y2="54"/>-->
            <path id="svg-stripe-path" d="M-2 30 L115 54" clip-path="url(#svg-stripe-clip)"></path>
</svg>
        <div class="container">
            <div class="row">
                <div class="col">
                    <svg viewBox="0 0 900 310">
                        <symbol id="s-text">
                            <text text-anchor="start" x="0" y="130">shadow</text>
                            <text text-anchor="end" x="900" y="300">labs.</text>
                        </symbol>

                        <g class="g-ants">
                            <use xlink:href="#s-text" class="text-copy"></use>
                            <use xlink:href="#s-text" class="text-copy"></use>
                            <use xlink:href="#s-text" class="text-copy"></use>
                            <use xlink:href="#s-text" class="text-copy"></use>
                            <use xlink:href="#s-text" class="text-copy"></use>
                        </g>
                    </svg>

                        <!--<div class="align-self-end" id="svg-wrapper-2">
                            <svg viewBox="0 0 700 200">
                                <symbol id="s-text-2">
                                    <text text-anchor="middle" x="50%" y="80%">labs.</text>
                                </symbol>

                                <g class="g-ants">
                                    <use xlink:href="#s-text-2" class="text-copy"></use>
                                    <use xlink:href="#s-text-2" class="text-copy"></use>
                                    <use xlink:href="#s-text-2" class="text-copy"></use>
                                    <use xlink:href="#s-text-2" class="text-copy"></use>
                                    <use xlink:href="#s-text-2" class="text-copy"></use>
                                </g>
                            </svg>
                        </div>-->
                </div>
            </div>
        </div>
    </header>
    <section class="section-overview">
        <div class="container mt-4">
            <div class="row overflow-visible">
                <svg class="triangle" viewBox="0 0 500 500" preserveAspectRatio="none">
                    <polygon points="0,0 0,500 500,500"  />
                </svg>
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
                        Приложение написано с нуля и не использует сторонних библиотек, за исключением Bootstrap. К сожалению.
                    </p>
                </div>
                <div class="col-sm-6" data-aos="fade-up">
                    <h6>Подробнее</h6>
                    <p>
                        Весь код доступен на GitHub. Чтобы развернуть локальное окружение для разработки и тестирования, достаточно выполнить команду:
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
                    echo <<<HEREDOC
                    <div class="col-md-4" data-aos="fade-up">
                        <a class="card-link" href="#">
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
    <footer>
        <div class="container">
            <div class="row">
                <svg class="triangle mt-0 mb-2" viewBox="0 0 500 500" preserveAspectRatio="none">
                    <polygon points="0,0 500,0 500,500"  />
                </svg>
            </div>
            <div class="row">
                <div class="d-flex footer-container">
                    <h3>shadow<span class="color-black">labs</span><span class="color-black dot" data-aos>.</span></h3>
                    <p><a href="#top"><i class="fas fa-level-up-alt"></i>Вернуться наверх</a></p>
                    <p><a href="https://github.com/shadowusr/u-web-labs" target="_blank"><i class="fab fa-github"></i>Перейти на GitHub</a></p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 700,
            once: true,
            useClassNames: true
            //animatedClassName: 'animated',
        });
    </script>
</body>
</html>