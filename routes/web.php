<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ping', function () {
    return '<h1>LogiTrack Operante </h1> <p>Sistema rodando a todo vapor.</p>';
});