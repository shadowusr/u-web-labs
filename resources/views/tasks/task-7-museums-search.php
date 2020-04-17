<?php

$task = [
    'number' => 7,
    'caption' => 'Работа с базой данных',
    'description' => 'Создайте базу данных из двух таблиц по теме предложенной ниже. В каждой таблице определите по 4 столбца и заполните данными, близкими к реальным (не менее 5 записей). Организуйте интерфейс заполнения данными с контролем ссылочной целостности. Сделайте поиск в базе данных по двум любым столбцам.',
    'variant' => 'Музеи - картины',
];

$sql = 'SELECT * FROM museums';
$searchParams = [];
$useAnd = false;
$insertWhere = true;
if (!empty($_GET['name'])) {
    if ($insertWhere) {
        $insertWhere = false;
        $sql .= ' WHERE';
    }
    $sql .= ' name LIKE :name';
    $searchParams['name'] = trim($_GET['name']);
    $useAnd = true;
}
if (!empty($_GET['rating']) && is_numeric($_GET['rating'])) {
    if ($insertWhere) {
        $insertWhere = false;
        $sql .= ' WHERE';
    }
    if ($useAnd) {
        $sql .= ' AND';
    }
    $sql .= ' rating >= :rating';
    $searchParams['rating'] = $_GET['rating'];
}


$db = \App\Database\Database::connect();
$statement = $db->prepare($sql);
$statement->execute($searchParams);

$museums = escapeObjects($statement->fetchAll(PDO::FETCH_ASSOC));
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
            <div class="col-12">
                <div class="card-form" data-aos="fade-up">
                    <label class="form-caption">Музеи</label>
                    <table>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Город</th>
                            <th>Рейтинг</th>
                        </tr>
                        </thead>
                        <?php
                        if (count($museums ) > 0) {
                            foreach ($museums as $museum) {
                                echo <<<HEREDOC
                            <tr>
                                <td>{$museum['id']}</td>
                                <td>{$museum['name']}</td>
                                <td>{$museum['city']}</td>
                                <td>{$museum['rating']}</td>
                            </tr>
HEREDOC;
                            }
                        } else {
                            echo '<tr><td colspan="4" class="table-empty-set">Нет записей</td></tr>';
                        }

                        ?>
                    </table>
                </div>
            </div>
            <div class="col-12 d-flex">
                <a class="mx-auto my-2 mt-3 link-clear" href="/tasks/7" data-aos="fade-up"><button><i class="fas fa-arrow-left mr-2"></i>Назад</button></a>
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
    table {
        width: 100%;
    }
    .table-empty-set {
        color: #a5fde5;
        text-align: center;
        padding: 20px;
    }
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