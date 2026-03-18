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
        Route::get('/students/index', [\App\Http\Controllers\StudentController::class, 'index'])->name('students.index');
        Route::get('/students/uploadData', [\App\Http\Controllers\StudentController::class, 'uploadData'])->name('students.uploadData');
        Route::post('/students/assignGroup', [\App\Http\Controllers\StudentController::class, 'assignGroup'])->name('students.assignGroup');

        Route::get('/teachers/index', [\App\Http\Controllers\TeacherController::class, 'index'])->name('teachers.index');
        Route::get('/teachers/uploadData', [\App\Http\Controllers\TeacherController::class, 'uploadData'])->name('teachers.uploadData');

        Route::get('/users/guests', [\App\Http\Controllers\UsersController::class, 'getGuests'])->name('users.guests');
        Route::get('/users/loadUser', [\App\Http\Controllers\UsersController::class, 'loadUser'])->name('users.loadUser');
        Route::post('/users/saveAsStudent/{id}', [\App\Http\Controllers\UsersController::class, 'saveAsStudent'])->name('users.saveAsStudent');
        Route::post('/users/saveAsTeacher/{id}', [\App\Http\Controllers\UsersController::class, 'saveAsTeacher'])->name('users.saveAsTeacher');
    });

});
