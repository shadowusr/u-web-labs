<?php

use App\Facades\Route;

Route::get('/', view('template', ['content' => view('main')]));

Route::get('/tasks/3', view('template', ['content' => view('tasks/task-3')]));
Route::get('/tasks/3/handler', view('template', ['content' => view('tasks/task-3-handler')]));