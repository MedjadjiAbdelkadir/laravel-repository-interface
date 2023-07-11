<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Medjadji\LaravelRepositoryInterface\Controllers',
    'prefix' => 'admin',
], function () {
    Route::get('hello-world', 'UserController@helloWorld');
});