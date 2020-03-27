<?php

function view($name) {
    if (strpos($name, '.') !== false) { // Preventing from accidental injections
        throw new \App\Exceptions\InvalidFormatException();
    }
    if (!file_exists(__DIR__ . '/../resources/views/' . $name . '.php')) {
        throw new \App\Exceptions\InternalServerErrorException();
    }
    ob_start();
    require __DIR__ . '/../resources/views/' . $name . '.php';
    return ob_get_clean();
}