<?php

$task = [
    'number' => 5,
    'caption' => 'Графика',
    'description' => 'Постройте любое цветное узнаваемое изображение с использованием повторяющихся элементов (циклы). В изображении использовать не менее 6 графических примитивов.',
];

$canvasWidth = 1920;
$canvasHeight = 1080;
$image = imagecreatetruecolor($canvasWidth, $canvasHeight);

$colorSchemes = [
    'day' => [
        'sky' => imagecolorallocate($image, 133, 186, 255),
        'cloud-small' => imagecolorallocate($image, 42, 93, 162),
        'cloud-big' => imagecolorallocate($image, 227, 239, 255),
        'ground-top' => imagecolorallocate($image, 3, 128, 104),
        'ground-bottom' => imagecolorallocate($image, 15, 70, 60),
        'pine-left' => imagecolorallocate($image, 86, 160, 164),
        'pine-right' => imagecolorallocate($image, 40, 97, 108),
        'pine-trunk-left' => imagecolorallocate($image, 132, 100, 107),
        'pine-trunk-right' => imagecolorallocate($image, 96, 66, 78),
    ],
    'evening' => [
        'sky' => imagecolorallocate($image, 255, 159, 135),
        'cloud-small' => imagecolorallocate($image, 131, 85, 236),
        'cloud-big' => imagecolorallocate($image, 255, 208, 165),
        'ground-top' => imagecolorallocate($image, 120, 67, 220),
        'ground-bottom' => imagecolorallocate($image, 79, 33, 167),
        'pine-left' => imagecolorallocate($image, 243, 121, 100),
        'pine-right' => imagecolorallocate($image, 64, 6, 173),
        'pine-trunk-left' => imagecolorallocate($image, 132, 100, 107),
        'pine-trunk-right' => imagecolorallocate($image, 96, 66, 78),
    ],
    'night' => [
        'sky' => imagecolorallocate($image, 3, 9, 41),
        'cloud-small' => imagecolorallocate($image, 11, 56, 119),
        'cloud-big' => imagecolorallocate($image, 13, 26, 88),
        'ground-top' => imagecolorallocate($image, 26, 49, 80),
        'ground-bottom' => imagecolorallocate($image, 14, 35, 64),
        'pine-left' => imagecolorallocate($image, 0, 60, 138),
        'pine-right' => imagecolorallocate($image, 7, 25, 47),
        'pine-trunk-left' => imagecolorallocate($image, 46, 58, 86),
        'pine-trunk-right' => imagecolorallocate($image, 13, 23, 47),
    ],
];

if (isset($_GET['time']) && in_array($_GET['time'], array_keys($colorSchemes))) {
    switch ($_GET['time']) {
        case 'day' :
            $colorSchemeName = 'day';
            $spawnHostiles = false;
            $spawnNeutral = true;
            $showStars = false;
            break;
        case 'evening':
            $colorSchemeName = 'evening';
            $spawnHostiles = false;
            $spawnNeutral = true;
            $showStars = false;
            break;
        case 'night':
            $colorSchemeName = 'night';
            $spawnHostiles = true;
            $spawnNeutral = false;
            $showStars = true;
            break;
    }
} else {
    date_default_timezone_set('Europe/Moscow');
    $hour = date('H');
    switch (true) {
        case ($hour >= 9 && $hour <= 17) :
            $colorSchemeName = 'day';
            $spawnHostiles = false;
            $spawnNeutral = true;
            $showStars = false;
            break;
        case (($hour >= 6 && $hour < 9) || ($hour > 17 && $hour <= 20)):
            $colorSchemeName = 'evening';
            $spawnHostiles = false;
            $spawnNeutral = true;
            $showStars = false;
            break;
        case (($hour > 20 && $hour < 24) || ($hour >= 0 && $hour < 6)):
            $colorSchemeName = 'night';
            $spawnHostiles = true;
            $spawnNeutral = false;
            $showStars = true;
            break;
    }
}
$colorScheme = $colorSchemes[$colorSchemeName];


imagefilledrectangle($image, 0, 0, 1920, 1080, $colorScheme['sky']);

if ($showStars) {
    $yOffset = 0;
    $step = 40;
    while ($yOffset < $canvasHeight) {
        $xOffset = 0;
        while ($xOffset < $canvasWidth) {
            $x = $xOffset + rand(-25, 25);
            $y = $yOffset + rand(-25, 25);
            imagefilledrectangle($image, $x, $y, $x + 1 + rand(0, 3), $y + 1 + rand(0, 3), imagecolorallocate($image, 255, 255, 255));
            $xOffset += $step;
        }
        $yOffset += $step;
    }
}

imagefilledpolygon($image, [1358, 90, 1405, 75, 1430, 80, 1475, 55, 1500, 95, 1490, 100, 1375, 100], 7, $colorScheme['cloud-small']);
imagefilledpolygon($image, [1482, 120, 1525, 135, 1920, 123, 1920, 0, 1895, 0, 1685, 85, 1605, 65, 1540, 115], 8, $colorScheme['cloud-big']);

imagefilledpolygon($image, [0, 70, 548, 110, 627, 220, 1050, 227, 1750, 425, 1920, 380, 1920, 1080, 0, 1080], 8, $colorScheme['ground-top']);
imagefilledpolygon($image, [0, 672, 235, 700, 1050, 950, 1920, 880, 1920, 1080, 0, 1080], 6, $colorScheme['ground-bottom']);


$pine = imagecreatetruecolor(184, 507);
$transparent = imagecolorallocatealpha($pine, 0, 0, 0, 127);
imagefill($pine, 0, 0, $transparent);

imagefilledpolygon($pine, [111,370,124,497,98,507,93,370], 4, $colorScheme['pine-trunk-right']);
imagefilledpolygon($pine, [83,370,75,500,98,507,93,370], 4, $colorScheme['pine-trunk-left']);
imagefilledpolygon($pine, [145,295,184,345,170,370,75,382,83,294], 5, $colorScheme['pine-right']);
imagefilledpolygon($pine, [45,294,0,370,75,382,83,294], 4, $colorScheme['pine-left']);
imagefilledpolygon($pine, [113,203,163,279,147,300,77,310,83,200], 5, $colorScheme['pine-right']);
imagefilledpolygon($pine, [60,200,13,298,77,310,83,200], 4, $colorScheme['pine-left']);
imagefilledpolygon($pine, [100,115,137,205,128,211,80,217,82,112], 5, $colorScheme['pine-right']);
imagefilledpolygon($pine, [69,112,35,210,80,217,82,112], 4, $colorScheme['pine-left']);
imagefilledpolygon($pine, [75,0,117,115,80,123], 3, $colorScheme['pine-right']);
imagefilledpolygon($pine, [75,0,50,115,80,123], 3, $colorScheme['pine-left']);


$pig = imagecreatefrompng(__DIR__ . '/../../images/pig.png');
$chicken = imagecreatefrompng(__DIR__ . '/../../images/chicken.png');
$sheep = imagecreatefrompng(__DIR__ . '/../../images/sheep.png');
$sheep = imagescale($sheep, 300);

$chicken = imagescale($chicken, 80);
$sheep = imagescale($sheep, 200);
$pig = imagescale($pig, 175);


$creeper = imagecreatefrompng(__DIR__ . '/../../images/creeper.png');
$zombie = imagecreatefrompng(__DIR__ . '/../../images/zombie.png');
$spider = imagecreatefrompng(__DIR__ . '/../../images/spider.png');

$creeper = imagescale($creeper, 130);
$zombie = imagescale($zombie, 180);
$spider = imagescale($spider, 270);


//    imagecopy($image, $pine, 0, 0, 0, 0, 184, 507);
//    imagecopy($image, $chicken, 200, 400, 0, 0, 200, 240);
//    imagecopy($image, $sheep, 350, 300, 0, 0, 500, 500);
//    imagecopy($image, $pig, 500, 400, 0, 0, 500, 500);

//    imagecopy($image, $creeper, 200, 280, 0, 0, imagesx($creeper), imagesy($creeper));
//    imagecopy($image, $zombie, 400, 250, 0, 0, imagesx($zombie), imagesy($zombie));
//    imagecopy($image, $spider, 600, 400, 0, 0, imagesx($spider), imagesy($spider));


$currentScale = .5;
$totalDepth = 5;
$yOffset = 100;
$yStep = ($canvasHeight - $yOffset - 500) / $totalDepth;
$scaleStep = (1 - $currentScale) / $totalDepth;
for ($i = 0; $i < $totalDepth; $i++) { // depth loop, starting from furthest
    $xOffset = 0;

    $pineResized = imagescale($pine, 184 * $currentScale);
    if ($colorSchemeName == 'day') {
        imagefilter($pineResized, IMG_FILTER_CONTRAST, -($i + 1) * 10);
    } elseif ($colorSchemeName == 'night') {
        imagefilter($pineResized, IMG_FILTER_BRIGHTNESS, -( ($i + 1) ) * 3);
    } elseif ($colorSchemeName == 'evening') {
        imagefilter($pineResized, IMG_FILTER_BRIGHTNESS, ( -$i + $totalDepth ) * 10);

    }

    while ($xOffset < min(32 / -5 * ($canvasHeight - $yOffset) + 6800, 1920)) {


        imagecopy($image, $pineResized, $xOffset + rand(-50, 0), $yOffset + rand(-75, 75), 0, 0, imagesx($pineResized), imagesy($pineResized));

        if ($spawnNeutral && rand(0, 10) == 5) {
            $chickenResized = imagescale($chicken, imagesx($chicken) * $currentScale);
            imagefilter($chickenResized, IMG_FILTER_CONTRAST, -($i + 1) * 10);
            if (rand(0, 1)) {
                imageflip($chickenResized, IMG_FLIP_HORIZONTAL);
            }
            imagecopy($image, $chickenResized, $xOffset + rand(20, 50), $yOffset + rand(-25, 25) + (imagesy($pineResized) - imagesy($chickenResized)), 0, 0, imagesx($chickenResized), imagesy($chickenResized));
        } elseif ($spawnNeutral && rand(0, 10) == 5) {
            $pigResized = imagescale($pig, imagesx($pig) * $currentScale);
            imagefilter($pigResized, IMG_FILTER_CONTRAST, -($i + 1) * 5);
            if (rand(0, 1)) {
                imageflip($pigResized, IMG_FLIP_HORIZONTAL);
            }
            imagecopy($image, $pigResized, $xOffset + rand(20, 50), $yOffset + rand(-25, 25) + (imagesy($pineResized) - imagesy($pigResized)), 0, 0, imagesx($pigResized), imagesy($pigResized));
        } elseif ($spawnNeutral && rand(0, 10) == 5) {
            $sheepResized = imagescale($sheep, imagesx($sheep) * $currentScale);
            imagefilter($sheepResized, IMG_FILTER_CONTRAST, -($i + 1) * 10);
            if (rand(0, 1)) {
                imageflip($sheepResized, IMG_FLIP_HORIZONTAL);
            }
            imagecopy($image, $sheepResized, $xOffset + rand(20, 50), $yOffset + rand(-25, 25) + (imagesy($pineResized) - imagesy($sheepResized)), 0, 0, imagesx($sheepResized), imagesy($sheepResized));
        }

        if ($spawnHostiles && rand(0, 10) == 5) {
            $creeperResized = imagescale($creeper, imagesx($creeper) * $currentScale);
            imagefilter($creeperResized, IMG_FILTER_CONTRAST, -($i + 1) * 10);
            if (rand(0, 1)) {
                imageflip($creeperResized, IMG_FLIP_HORIZONTAL);
            }
            imagecopy($image, $creeperResized, $xOffset + rand(20, 50), $yOffset + rand(-25, 25) + (imagesy($pineResized) - imagesy($creeperResized)), 0, 0, imagesx($creeperResized), imagesy($creeperResized));
        } elseif ($spawnHostiles && rand(0, 10) == 5) {
            $zombieResized = imagescale($zombie, imagesx($zombie) * $currentScale);
            imagefilter($zombieResized, IMG_FILTER_CONTRAST, -($i + 1) * 2);
            if (rand(0, 1)) {
                imageflip($zombieResized, IMG_FLIP_HORIZONTAL);
            }
            imagecopy($image, $zombieResized, $xOffset + rand(20, 50), $yOffset + rand(-25, 25) + (imagesy($pineResized) - imagesy($zombieResized)), 0, 0, imagesx($zombieResized), imagesy($zombieResized));
        } elseif ($spawnHostiles && rand(0, 10) == 5) {
            $spiderResized = imagescale($spider, imagesx($spider) * $currentScale);
            imagefilter($spiderResized, IMG_FILTER_CONTRAST, -($i + 1) * 3);
            if (rand(0, 1)) {
                imageflip($spiderResized, IMG_FLIP_HORIZONTAL);
            }
            imagecopy($image, $spiderResized, $xOffset + rand(20, 50), $yOffset + rand(-25, 25) + (imagesy($pineResized) - imagesy($spiderResized)), 0, 0, imagesx($spiderResized), imagesy($spiderResized));
        }

        $xOffset += rand(120, 150);
    }
    $yOffset += $yStep;
    $currentScale += $scaleStep;
}

imagejpeg($image, __DIR__ . '/../../../public/images/task-5-image.jpg');
imagedestroy($image);

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
            <div class="col-md-6">
                <div class="alert" data-aos="fade-up">
                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="info-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-info-circle fa-w-16 fa-3x"><path fill="currentColor" d="M256 40c118.621 0 216 96.075 216 216 0 119.291-96.61 216-216 216-119.244 0-216-96.562-216-216 0-119.203 96.602-216 216-216m0-32C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm-36 344h12V232h-12c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h48c6.627 0 12 5.373 12 12v140h12c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12h-72c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12zm36-240c-17.673 0-32 14.327-32 32s14.327 32 32 32 32-14.327 32-32-14.327-32-32-32z" class=""></path></svg>
                    <p>Изображение изменяется в зависимости от времени дня. Каждый раз картинка генерируется уникальным образом.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card dark" data-aos="fade-up">
                    <h5>Попробуйте другие варианты</h5>
                    <div class="mt-2 buttons-container">
                        <button onclick="location.href='/tasks/5?time=day'">День</button>
                        <button class="pastel" onclick="location.href='/tasks/5?time=evening'">Вечер</button>
                        <button class="dark-blue" onclick="location.href='/tasks/5?time=night'">Ночь</button>
                    </div>
                </div>
            </div>
            <div class="col-12" data-aos="fade-up">
                <img class="task-image" src="/images/task-5-image.jpg"/>
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