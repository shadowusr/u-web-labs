<?php
$task = [
    'number' => 7,
    'caption' => 'Работа с базой данных',
    'description' => 'Создайте базу данных из двух таблиц по теме предложенной ниже. В каждой таблице определите по 4 столбца и заполните данными, близкими к реальным (не менее 5 записей). Организуйте интерфейс заполнения данными с контролем ссылочной целостности. Сделайте поиск в базе данных по двум любым столбцам.',
    'variant' => 'Музеи - картины',
];

$db = \App\Database\Database::connect();

$museums = $db->query('SELECT * FROM museums ORDER BY rating DESC;')->fetchAll(PDO::FETCH_ASSOC);
$museums = escapeObjects($museums);

$paintings = $db->query('SELECT * FROM paintings LEFT JOIN (SELECT id AS museum_id, name AS museum_name FROM museums) museums ON paintings.museum_id = museums.museum_id;')->fetchAll(PDO::FETCH_ASSOC);
$paintings = escapeObjects($paintings);

$sqlSnippets = [
    [
        'description' => 'Создание таблицы музеев.',
        'code' => 'CREATE TABLE IF NOT EXISTS museums (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(128) NOT NULL,
    city VARCHAR(128) NOT NULL,
    rating INT NOT NULL
) ENGINE=INNODB;',
    ],
    [
        'description' => 'Создание таблицы картин.',
        'code' => 'CREATE TABLE IF NOT EXISTS paintings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(128) NOT NULL,
    creation_year INT NOT NULL,
    
    museum_id INT UNSIGNED NOT NULL,
    FOREIGN KEY (museum_id) REFERENCES museums(id)
) ENGINE=INNODB;',
    ],
    [
        'description' => 'Выборка музеев.',
        'code' => 'SELECT * FROM museums WHERE name LIKE :name AND rating >= :rating',
    ],
    [
        'description' => 'Выборка картин.',
        'code' => 'SELECT * FROM paintings LEFT JOIN (SELECT id AS museum_id, name AS museum_name FROM museums) museums ON paintings.museum_id = museums.museum_id WHERE name LIKE :name AND paintings.museum_id = :museum_id',
    ],
    [
        'description' => 'Создание картины.',
        'code' => 'INSERT INTO paintings (name, museum_id, creation_year) VALUES (:name, :museum_id, :creation_year)',
    ],
    [
        'description' => 'Удаление музея.',
        'code' => 'DELETE FROM museums WHERE id = :id',
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
        <div class="row pb-3">

            <div class="col-12" data-aos="fade-up">
                <h3 class="heading-underlined">Результат</h3>
            </div>
            <div class="col-12" data-aos="fade-up">
                <h6>Использованный SQL</h6>
                <?php
                foreach ($sqlSnippets as $sqlSnippet) {
                    echo "<p>{$sqlSnippet['description']}</p><pre><code>{$sqlSnippet['code']}</code></pre>";
                }
                ?>
            </div>
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
                                <th></th>
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
                                <td><!--<a href="/tasks/7/museums/edit?id={$museum['id']}"><i class="far fa-edit"></i></a>--><a href="/tasks/7/museums/delete?id={$museum['id']}"><i class="far fa-trash-alt"></i></a></td>
                            </tr>
HEREDOC;
                            }
                        } else {
                            echo '<tr><td colspan="5" class="table-empty-set">Нет записей</td></tr>';
                        }

                        ?>
                    </table>
                </div>
            </div>
            <div class="col-12">
                <div class="card-form" data-aos="fade-up">
                    <label class="form-caption">Картины</label>
                    <table>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Год создания</th>
                            <th>Музей</th>
                            <th></th>
                        </tr>
                        </thead>
                        <?php
                        if (count($paintings) > 0) {
                            foreach ($paintings as $painting) {
                                echo <<<HEREDOC
                            <tr>
                                <td>{$painting['id']}</td>
                                <td>{$painting['name']}</td>
                                <td>{$painting['creation_year']}</td>
                                <td>{$painting['museum_id']}:{$painting['museum_name']}</td>
                                <td><!--<a href="/tasks/7/paintings/edit?id={$painting['id']}"><i class="far fa-edit"></i></a>--><a href="/tasks/7/paintings/delete?id={$painting['id']}"><i class="far fa-trash-alt"></i></a></td>
                            </tr>
HEREDOC;
                            }
                        } else {
                            echo '<tr><td colspan="5" class="table-empty-set">Нет записей</td></tr>';
                        }

                        ?>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-form" data-aos="fade-up">
                    <label class="form-caption">Создать музей</label>
                    <form class="container" action="/tasks/7/museums/create">
                        <div class="row">
                            <div class="col-12">
                                <label>Название</label>
                            </div>
                            <div class="col-12">
                                <input type="text" name="name" placeholder="Название" required />
                            </div>
                            <div class="col-12">
                                <label>Город</label>
                            </div>
                            <div class="col-12">
                                <input type="text" name="city" placeholder="Город" required />
                            </div>
                            <div class="col-12">
                                <label>Рейтинг</label>
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="rating" placeholder="Рейтинг" required />
                            </div>

                            <input type="submit" value="Создать">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-form" data-aos="fade-up">
                    <label class="form-caption">Создать картину</label>
                    <form class="container" action="/tasks/7/paintings/create">
                        <div class="row">
                            <div class="col-12">
                                <label>Название</label>
                            </div>
                            <div class="col-12">
                                <input type="text" name="name" placeholder="Название" required />
                            </div>
                            <div class="col-12">
                                <label>Музей</label>
                            </div>
                            <div class="col-12">
                                <select name="museum_id">
                                    <option disabled selected value>Не выбрано</option>
                                    <?php
                                    foreach ($museums as $museum) {
                                        echo "<option value=\"{$museum['id']}\">{$museum['name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <label>Год создания</label>
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="creation_year" placeholder="Год создания" required />
                            </div>

                            <input type="submit" value="Создать">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-form" data-aos="fade-up">
                    <label class="form-caption">Поиск музеев</label>
                    <form class="container" action="/tasks/7/museums/search">
                        <div class="row">
                            <div class="col-12">
                                <label>Название</label>
                            </div>
                            <div class="col-12">
                                <input type="text" name="name" placeholder="Название" />
                            </div>
                            <div class="col-12">
                                <label>Рейтинг</label>
                            </div>
                            <div class="col-12">
                                <input type="number" name="rating" placeholder=">= N" />
                            </div>
                            <input type="submit" value="Поиск">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-form" data-aos="fade-up">
                    <label class="form-caption">Поиск картин</label>
                    <form class="container" action="/tasks/7/paintings/search">
                        <div class="row">
                            <div class="col-12">
                                <label>Название</label>
                            </div>
                            <div class="col-12">
                                <input type="text" name="name" placeholder="Название" />
                            </div>
                            <div class="col-12">
                                <label>Музей</label>
                            </div>
                            <div class="col-12">
                                <select name="museum_id">
                                    <option selected value>Не выбрано</option>
                                    <?php
                                    foreach ($museums as $museum) {
                                        echo "<option value=\"{$museum['id']}\">{$museum['name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <input type="submit" value="Поиск">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" >
                <h3 class="heading-underlined" data-aos="fade-up">Исходный код</h3>
                <p data-aos="fade-up">Исходный код страницы доступен на <a href="https://github.com/shadowusr/u-web-labs/tree/master/resources/views/tasks/task-7.php">GitHub</a>.</p>
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

    .alert.warning {
        background-color: rgba(255, 94, 0, 0.5);
        border: 2px solid #ff682e;
    }



    .alert > svg {
        margin-top: -60px;
        height: 45px;
        flex-shrink: 0;
    }
    .alert > svg > path {
        fill: rgba(255, 255, 255, .8);
    }

    .alert > p {
        margin-left: 20px;
    }

    .card-form {
        background-color: #27325d;
        border-radius: 5px;
        padding: 10px;
        box-shadow: 0px 0px 25px -5px rgba(0,0,0,0.3);
        margin: 30px 0 0;
    }
    table {
        width: 100%;
    }
    .table-empty-set {
        color: #a5fde5;
        text-align: center;
        padding: 20px;
    }

    td:last-of-type {
        width: 1%;
        white-space: nowrap;
    }

    td a {
        color: rgba(255, 255, 255, .8);
        transition: color .3s ease;
        margin-left: 5px;
    }
    td a:first-of-type {
        margin-left: 0;
    }
    td a:hover {
        color: rgba(255, 255, 255, 1);
    }


    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>