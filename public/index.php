<?php

require '../vendor/autoload.php';

$app = App\App::getInstance();

$app->handle(new \App\Routing\Request());