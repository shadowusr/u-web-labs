<?php

namespace App\Routing;

// TODO: Make this class PSR-compatible.


class Request
{
    public function method() {
        return mb_strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function path() {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    /*public function fullUrl() {

    }

    public function path() {

    }

    public function segments() {

    }*/
}