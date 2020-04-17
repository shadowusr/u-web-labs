<?php

function view($name, $args = []) {
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

function escapeObjects($objects) {
    foreach ($objects as $key => $object) {
        foreach ($object as $fieldName => $fieldValue) {
            $objects[$key][$fieldName] = htmlentities($fieldValue, ENT_QUOTES);
        }
    }
    return $objects;
}