<?php

use Illuminate\Support\Facades\Route;

Route::get('/registration', [\App\Http\Controllers\AuthenticationController::class, 'getRegistration'])->name('registration');
Route::post('/registration', [\App\Http\Controllers\AuthenticationController::class, 'postRegistration']);
Route::get('/login', [\App\Http\Controllers\AuthenticationController::class, 'getLogin'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthenticationController::class, 'postLogin'])->name('login');
Route::get('/logout', [\App\Http\Controllers\AuthenticationController::class, 'logout'])->name("logout");

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('main');
    })->name('main');

    Route::get('/account/profile', [\App\Http\Controllers\AccountController::class, 'getProfile'])->name('account.profile');
    Route::get('/timetable', [\App\Http\Controllers\TimetableController::class, 'getTimetable'])->name('timetable');
    Route::middleware(\App\Http\Middleware\AdministratorRoleMiddleware::class)->group(function () {
        Route::get('/students/student', [\App\Http\Controllers\StudentController::class, 'getStudents'])->name('students.students');
        Route::get('/students/uploadData', [\App\Http\Controllers\StudentController::class, 'uploadData'])->name('students.uploadData');
        Route::post('/students/assignGroup', [\App\Http\Controllers\StudentController::class, 'assignGroup'])->name('students.assignGroup');
    });

});
