<?php

$task = [
    'number' => 7,
    'caption' => 'Работа с базой данных',
    'description' => 'Создайте базу данных из двух таблиц по теме предложенной ниже. В каждой таблице определите по 4 столбца и заполните данными, близкими к реальным (не менее 5 записей). Организуйте интерфейс заполнения данными с контролем ссылочной целостности. Сделайте поиск в базе данных по двум любым столбцам.',
    'variant' => 'Музеи - картины',
];

$db = \App\Database\Database::connect();

$newItem = [
    'name' => trim($_GET['name']),
    'creation_year' => trim($_GET['creation_year']),
    'museum_id' => trim($_GET['museum_id']),
];

$museumIds = $db->query('SELECT id FROM museums')->fetchAll(PDO::FETCH_COLUMN, 0);

$success = false;
$statement = $db->query('SELECT id FROM paintings;');
if ($statement->rowCount() >= 20) {
    $status = 'Вы можете сохранять не более 20 записей.';
} elseif (empty($newItem['name']) || empty($newItem['creation_year']) || empty($newItem['museum_id'])) {
    $status = 'Не было передано один или несколько входных параметров.';
} elseif (!is_string($newItem['name']) || mb_strlen($newItem['name']) > 128 || !in_array($newItem['museum_id'], $museumIds) || !is_numeric($newItem['creation_year'])) {
    $status = nl2br("Один или несколько параметров некорректны. Требования:\n- name должен быть непустой строкой, не превыщающей длину в 128 знаков.\n- creation_year должен быть числом\n- museum_id должен быть числом, id существующего музея.");
} else {
    $sql = 'INSERT INTO paintings (name, museum_id, creation_year) VALUES (:name, :museum_id, :creation_year)';

    if ($db->prepare($sql)->execute($newItem)) {
        $success = true;
        $newItem['name'] = htmlentities($newItem['name'], ENT_QUOTES);
        $status = "Запись с названием \"{$newItem['name']}\" успешно создана";
    } else {
        $status = 'Произошла внутренняя ошибка базы данных. Повторите запрос позже.';
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
            <div class="col-12 d-flex">
                <a class="mx-auto my-2 link-clear" href="/tasks/7" data-aos="fade-up"><button><i class="fas fa-arrow-left mr-2"></i>Назад</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12" >
                <h3 class="heading-underlined" data-aos="fade-up">Исходный код</h3>
                <p data-aos="fade-up">Исходный код страницы доступен на <a href="https://github.com/shadowusr/u-web-labs/tree/master/resources/views/tasks/task-7-paintings-create.php">GitHub</a>.</p>
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

</style>