<?php

namespace App;

use App\Routing\Request;
use App\Facades\Route;

class App
{
    private static $instance;

    private function __construct()
    {

    }

    private function getGUID(){
        if (function_exists('com_create_guid')){
            return com_create_guid();
        }else{
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = chr(123)// "{"
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);// "}"
            return $uuid;
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new App();
        }

        return self::$instance;
    }

    public function handle(Request $request) {
        require '../routes/web.php';

        if (!isset($_COOKIE['client-id'])) {
            $guid = $this->getGUID();
            setcookie('client-id', $guid, time()+60*60*24*30, '/');
            $_COOKIE['client-id'] = $guid;
            header('Location: ' . $_SERVER['REQUEST_URI']); // Refresh page to init $_COOKIE
        }

        echo Route::resolve($request);
    }
}