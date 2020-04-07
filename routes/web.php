<?php

use App\Facades\Route;

Route::get('/', view('template', ['content' => view('main')]));

Route::get('/tasks/3', view('template', ['content' => view('tasks/task-3')]));
Route::get('/tasks/3/handler', view('template', ['content' => view('tasks/task-3-handler')]));

Route::get('/tasks/4', view('template', ['content' => view('tasks/task-4')]));
Route::get('/tasks/4/create', view('template', ['content' => view('tasks/task-4-create')]));
Route::get('/tasks/4/search', view('template', ['content' => view('tasks/task-4-search')]));
Route::get('/tasks/4/save', view('template', ['content' => view('tasks/task-4-save')]));
Route::get('/tasks/4/delete', view('template', ['content' => view('tasks/task-4-delete')]));

Route::get('/tasks/5', view('template', ['content' => view('tasks/task-5')]));