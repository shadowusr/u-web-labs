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

Route::get('/tasks/6', view('template', ['content' => view('tasks/task-6')]));

Route::get('/tasks/7', view('template', ['content' => view('tasks/task-7')]));
Route::get('/tasks/7/museums/create', view('template', ['content' => view('tasks/task-7-museums-create')]));
Route::get('/tasks/7/paintings/create', view('template', ['content' => view('tasks/task-7-paintings-create')]));
Route::get('/tasks/7/museums/search', view('template', ['content' => view('tasks/task-7-museums-search')]));
Route::get('/tasks/7/paintings/search', view('template', ['content' => view('tasks/task-7-paintings-search')]));
Route::get('/tasks/7/museums/delete', view('template', ['content' => view('tasks/task-7-museums-delete')]));
Route::get('/tasks/7/paintings/delete', view('template', ['content' => view('tasks/task-7-paintings-delete')]));

Route::get('/tasks/8', view('template', ['content' => view('tasks/task-8')]));
Route::get('/tasks/8/test', view('template', ['content' => view('tasks/task-8-test')]));

Route::get('/tasks/9', view('template', ['content' => view('tasks/task-9')]));

Route::get('/tasks/10', view('template', ['content' => view('tasks/task-10')]));
