<?php

$task = [
    'number' => 3,
    'caption' => 'Передача параметров',
    'description' => 'Напишите два PHP-скрипта: один с формой для передачи параметров, второй с расчетами, произведенными по полученным параметрам. Организуйте пользовательский интерфейс так, чтобы пользователь мог проводить расчеты многократно.',
    'variant' => 'Задайте два отрезка четырьмя точками. Найдите точку пересечения.',
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

            </div>
            <div class="offset-md-3 col-md-6">
                <div class="card-form" data-aos="fade-up">
                    <label class="form-caption">Введите четыре точки</label>
                    <form class="container" action="/tasks/3/handler">
                        <div class="row">
                            <div class="col-12">
                                <label>Отрезок 1 Точка А</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="point11X" placeholder="x" required pattern="-?[0-9]+((.|,)[0-9]+)?"/>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="point11Y" placeholder="y" required pattern="-?[0-9]+((.|,)[0-9]+)?"/>
                            </div>
                            <div class="col-12">
                                <label>Отрезок 1 Точка Б</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="point12X" placeholder="x" required pattern="-?[0-9]+((.|,)[0-9]+)?"/>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="point12Y" placeholder="y" required pattern="-?[0-9]+((.|,)[0-9]+)?"/>
                            </div>

                            <div class="col-12">
                                <label>Отрезок 2 Точка А</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="point21X" placeholder="x" required pattern="-?[0-9]+((.|,)[0-9]+)?"/>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="point21Y" placeholder="y" required pattern="-?[0-9]+((.|,)[0-9]+)?"/>
                            </div>
                            <div class="col-12">
                                <label>Отрезок 2 Точка Б</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="point22X" placeholder="x" required pattern="-?[0-9]+((.|,)[0-9]+)?"/>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="point22Y" placeholder="y" required pattern="-?[0-9]+((.|,)[0-9]+)?"/>
                            </div>

                            <input type="submit" value="Отправить">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" >
                <h3 class="heading-underlined" data-aos="fade-up">Исходный код</h3>
                <p data-aos="fade-up">Исходный код страницы доступен на <a href="https://github.com/https://github.com/shadowusr/u-web-labs/tree/master/resources/views/tasks/task-3.php">GitHub</a>.</p>
            </div>
        </div>
    </div>
</section>
<style>
    .card-form {
        background-color: #27325d;
        border-radius: 5px;
        padding: 10px;
        box-shadow: 0px 0px 25px -5px rgba(0,0,0,0.3);
        margin: 50px 0;
    }
</style>