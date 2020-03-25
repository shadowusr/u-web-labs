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

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new App();
        }

        return self::$instance;
    }

    public function handle(Request $request) {
        require '../routes/web.php';

        echo Route::resolve($request);
    }
}