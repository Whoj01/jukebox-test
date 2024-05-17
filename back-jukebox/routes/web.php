<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\CheckToken;

Route::get('/', function () {
    return view('welcome');
});


