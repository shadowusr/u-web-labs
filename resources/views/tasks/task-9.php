<?php

$task = [
    'number' => 9,
    'caption' => 'Выполнение JavaScript в браузере клиента',
    'description' => 'Выполните задания, предложенные ниже, используя только прототипно-ориентированный сценарный язык JavaScript.',
    'variant' => 'Реализуйте масштабирование изображения с помощью кнопок.'
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
                <p>Нажмите +/- на клавиатуре или воспользуйтесь кнопками внизу.</p>
                <img src="/images/task-9-image.jpg" id="task-9-image">
                <div class="mt-2 buttons-container">
                    <button class="pastel" onclick="scale(0.1)">+</button>
                    <button class="dark-blue" onclick="scale(-0.1)">-</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" >
                <h3 class="heading-underlined" data-aos="fade-up">Исходный код</h3>
                <p data-aos="fade-up">Исходный код страницы доступен на <a href="https://github.com/shadowusr/u-web-labs/tree/master/resources/views/tasks/task-9.php">GitHub</a>.</p>
            </div>
        </div>
    </div>
</section>
<script>
    let currentScale = .9;
    document.addEventListener('keypress', (e) => {
        if (e.key === '-') {
            scale(-0.1);
        } else if (e.key === '+') {
            scale(0.1);
        }
    })
    function scale(value) {
        let img = document.getElementById('task-9-image');
        if (Math.abs(currentScale - 1) < 0.0001 && value > 0) {
            img.style.animation = 'no-scale .5s ease-in-out';
            setTimeout(() => { img.style.animation = 'none' }, 500);
        } else if (Math.abs(currentScale - 0.1) < 0.0001 && value < 0) {
            img.style.animation = 'no-scale-down .5s ease-in-out';
            setTimeout(() => { img.style.animation = 'none' }, 500);
        } else {
            currentScale += value;
            img.style.transform = `scale(${currentScale})`;
        }
    }
</script>
<style>
#task-9-image {
    width: 100%;
    transform: scale(.9);
    transition: transform .2s ease-in;
}

.buttons-container {
    display: flex;
    justify-content: center;
}

.buttons-container > button {
    margin-left: 10px;
}
.buttons-container > button:first-child {
    margin-left: 0;
}
    @keyframes no-scale {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
        100% {
            transform: scale(1);
        }
    }
@keyframes no-scale-down {
    0% {
        transform: scale(.1);
    }
    50% {
        transform: scale(.05);
    }
    100% {
        transform: scale(.1);
    }
}
</style>