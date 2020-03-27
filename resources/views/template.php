<!doctype html>
<html id="top">
<!--
Ребята, не стоит вскрывать этот код.
Вы молодые, шутливые, вам все легко.
Это не то.
Это не Чикатило и даже не архивы спецслужб.
Сюда лучше не лезть.
Серьезно, любой из вас будет жалеть.
Лучше закройте код и забудьте, что тут писалось.
Я вполне понимаю, что данным сообщением вызову дополнительный интерес, но хочу сразу предостеречь пытливых - стоп.
Остальные просто не найдут.
-->
<head>
    <title>shadowlabs.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/app.css">
    <link rel="stylesheet" href="/styles/forms.css">
    <link rel="stylesheet" href="/styles/buttons.css">
    <link rel="stylesheet" href="/styles/tables.css">
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
        <div class="container position-relative">
            <div class="row">
                <div class="col">
                    <a class="text-decoration-none" href="/">
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
                    </a>
                </div>
                <svg class="triangle triangle-top" viewBox="0 0 500 500" preserveAspectRatio="none">
                    <polygon points="0,0 0,500 500,500"  />
                </svg>
            </div>

        </div>

    </header>
    <?= $args['content'] ?? '' ?>
    <footer>
        <div class="container">
            <div class="row">
                <svg class="triangle mt-0 mb-2" viewBox="0 0 500 500" preserveAspectRatio="none">
                    <polygon points="0,0 500,0 500,500"  />
                </svg>
            </div>
            <div class="row">
                <div class="d-flex footer-container pr-2">
                    <h3>shadow<span class="color-black">labs</span><span class="color-black dot" data-aos></span></h3>
                    <p><a href="#top"><i class="fas fa-level-up-alt"></i>Вернуться наверх</a></p>
                    <p><a href="https://github.com/shadowusr/u-web-labs" target="_blank"><i class="fab fa-github"></i>Перейти на GitHub</a></p>
                    <p><a href="https://minecraft.net"><img src="/images/minecraft.png" class="footer-minecraft-icon">Самый лучший сайт</a></p>
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
    <style>
        .footer-minecraft-icon {
            height: 20px;
            margin-top: -4px;
            margin-right: 5px;
        }
    </style>
</body>
</html>