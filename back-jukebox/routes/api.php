<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\CheckToken;
use App\Http\Controllers\TaskController;

Route::prefix('authenticate')->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/create', [LoginController::class, 'create']);
    Route::post('/logout', [LoginController::class, 'logout'])->middleware(CheckToken::class);
});

Route::prefix('task')->group(function () {
    Route::post('/create', [TaskController::class, 'create'])->middleware(CheckToken::class);
    Route::get('/read', [TaskController::class, 'read'])->middleware(CheckToken::class);
    Route::patch('/update/{id}', [TaskController::class, 'update'])->middleware(CheckToken::class);
    Route::delete('/delete/{id}', [TaskController::class, 'delete'])->middleware(CheckToken::class);
});
