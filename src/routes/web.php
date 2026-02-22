<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SprintController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'submitLogin']);

});

Route::middleware(['auth', 'permission:admin'])->group(function () {

    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::post('/users', [UsersController::class, 'submitRegister'])->name('submitRegister');
    Route::post('/users/find', [UsersController::class, 'findUser'])->name('findUser');
    Route::post('/users/stop', [UsersController::class, 'stopUser'])->name('stopUser');
    Route::post('/users/on', [UsersController::class, 'onUser'])->name('onUser');

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/classes', [HomeController::class, 'addNewClass']);
    Route::post('/classes/find', [HomeController::class, 'findClass']);
    Route::post('/classes/update', [HomeController::class, 'updateClass']);
    Route::post('/classes/delete', [HomeController::class, 'deleteClass']);

    Route::get('/sprint', [SprintController::class, 'index'])->name('sprint');
    Route::post('/sprint', [SprintController::class, 'addNewSprint']);
    Route::post('/sprints/find', [SprintController::class, 'findSprint']);
    Route::post('/sprints/delete', [SprintController::class, 'deleteSprint']);

    Route::get('/skill', [SkillController::class, 'index'])->name('skill');
    Route::post('/skill', [SkillController::class, 'addNewSkill']);
    Route::post('/skill/find', [SkillController::class, 'findSkill']);
    Route::post('/skill/delete', [SkillController::class, 'deleteSkill']);

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});