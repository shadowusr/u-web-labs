<?php

$task = [
    'number' => 3,
    'caption' => 'Передача параметров',
    'description' => 'Напишите два PHP-скрипта: один с формой для передачи параметров, второй с расчетами, произведенными по полученным параметрам. Организуйте пользовательский интерфейс так, чтобы пользователь мог проводить расчеты многократно.',
    'variant' => 'Задайте два отрезка четырьмя точками. Найдите точку пересечения.',
];

class Line {
    public $a, $b, $c;

	public function __construct($p, $q) {
        $this->a = $p[1] - $q[1];
        $this->b = $q[0] - $p[0];
        $this->c = - $this->a * $p[0] - $this->b * $p[1];
        $this->norm();
    }

	public function norm() {
        $EPS = 1e-9;

        $z = sqrt ($this->a * $this->a + $this->b * $this->b);

		if (abs($z) > $EPS) {
            $this->a /= $z;
		    $this->b /= $z;
		    $this->c /= $z;
		}
	}
	public function dist($p) {
        return $this->a * $p[0] + $this->b * $p[1] + $this->c;
    }
};

function swap(&$a, &$b) {
    $tmp = $a;
    $a = $b;
    $b = $tmp;
}

function det($a, $b, $c, $d) {
    return $a * $d - $b * $c;
}

function betw($l, $r, $x) {
    $EPS = 1e-9;
    return min($l,$r) <= $x + $EPS && $x <= max($l,$r) + $EPS;
}

function intersect_1d($a, $b, $c, $d) {
    $EPS = 1e-9;

    if ($a > $b)  swap ($a, $b);
    if ($c > $d)  swap ($c, $d);
    return max ($a, $c) <= min ($b, $d) + $EPS;
}

function pointLess($a, $b) {
    $EPS = 1e-9;
    return $a[0] < $b[0]-$EPS || abs($a[0]-$b[0]) < $EPS && $a[1] < $b[1] - $EPS;
}

function maxP($a, $b) {
    return (pointLess($a, $b) ? $b : $a);
}

function minP($a, $b) {
    return (pointLess($a, $b) ? $a : $b);
}

function intersect ($a, $b, $c, $d) {
    $EPS = 1e-9;
	if (! intersect_1d ($a[0], $b[0], $c[0], $d[0]) || ! intersect_1d ($a[1], $b[1], $c[1], $d[1]))
        return false;
	$m = new Line($a, $b);
	$n = new Line($c, $d);
	$zn = det ($m->a, $m->b, $n->a, $n->b);
	if (abs ($zn) < $EPS) {
        if (abs ($m->dist($c)) > $EPS || abs ($n->dist ($a)) > $EPS)
            return false;
        if (pointLess($b, $a))  swap ($a, $b);
        if (pointLess($d, $c))  swap ($c, $d);
        $left = maxP ($a, $c);
        $right = minP ($b, $d);
        return [$left, $right];
    }
    else {
        $left[0] = $right[0] = - det ($m->c, $m->b, $n->c, $m->b) / $zn;
        $left[1] = $right[1] = - det ($m->a, $m->c, $n->a, $n->c) / $zn;
        if (betw ($a[0], $b[0], $left[0])
            && betw ($a[1], $b[1], $left[1])
            && betw ($c[0], $d[0], $left[0])
            && betw ($c[1], $d[1], $left[1])) {
            return [$left, $right];
        } else {
            return false;
        }
    }
}

if (!is_numeric($_GET['point11X']) || !is_numeric($_GET['point12X']) || !is_numeric($_GET['point21X']) || !is_numeric($_GET['point22X']) || !is_numeric($_GET['point11Y']) || !is_numeric($_GET['point12Y']) || !is_numeric($_GET['point21Y']) || !is_numeric($_GET['point22Y']) ) {
    $result = 'Некорректный формат входных данных.';
} else {
    $a = [$_GET['point11X'], $_GET['point11Y']];
    $b = [$_GET['point12X'], $_GET['point12Y']];
    $c = [$_GET['point21X'], $_GET['point21Y']];
    $d = [$_GET['point22X'], $_GET['point22Y']];
    $answer = intersect($a, $b, $c, $d);
    if ($answer === false) {
        $result = 'Отрезки не пересекаются.';
    } elseif ($answer[0] == $answer[1]) {
        $result = "Отрезки пересекаются в точке ({$answer[0][0]}, {$answer[0][1]}).";
    } else {
        $result = "Отрезки совпадают между точками ({$answer[0][0]}, {$answer[0][1]}) и ({$answer[1][0]}, {$answer[1][1]}).";
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
            <div class="col-12" data-aos="fade-up">
                <h3 class="heading-underlined">Ответ</h3>
                <p><?= $result ?></p>
            </div>
            <a class="mx-auto my-2 link-clear" href="/tasks/3" data-aos="fade-up"><button><i class="fas fa-arrow-left mr-2"></i>Ввести другие данные</button></a>
        </div>
        <div class="row">
            <div class="col-12" >
                <h3 class="heading-underlined" data-aos="fade-up">Исходный код</h3>
                <p data-aos="fade-up">Исходный код страницы доступен на <a href="https://github.com/shadowusr/u-web-labs/tree/master/resources/views/tasks/task-3-handler.php">GitHub</a>.</p>
            </div>
        </div>
    </div>
</section>
<style>

</style>