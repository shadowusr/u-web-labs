<?php

use App\Facades\Route;

Route::get('/', function () {
    return 'That\'s a test response from our router.';
});