<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

Route::get('/registration', [\App\Http\Controllers\AuthenticationController::class, 'registration']);
Route::post('/registration', [\App\Http\Controllers\AuthenticationController::class, 'registration']);
Route::get('/login', [\App\Http\Controllers\AuthenticationController::class, 'login']);
Route::post('/login', [\App\Http\Controllers\AuthenticationController::class, 'login']);
Route::get('/logout', [\App\Http\Controllers\AuthenticationController::class, 'logout']);
Route::post('/logout', [\App\Http\Controllers\AuthenticationController::class, 'logout']);
