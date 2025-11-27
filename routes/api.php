<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TurmaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/teachers', [TeacherController::class, 'index'])->name('index');
    Route::post('/teachers', [TeacherController::class, 'store'])->name('store');
    Route::patch('/teachers/{teacher}', [TeacherController::class, 'update'])->name('update');
    Route::delete('/teachers/{teacher}', [TeacherController::class, 'destroy'])->name('destroy');

    Route::get('/students', [StudentController::class, 'index'])->name('index');
    Route::post('/students', [StudentController::class, 'store'])->name('store');
    Route::put('/students/{students}', [StudentController::class, 'update'])->name('update');
    Route::delete('/students/{students}', [StudentController::class, 'destroy'])->name('destroy');

    Route::get('/turmas', [TurmaController::class, 'index'])->name('index');
    Route::post('/turmas', [TurmaController::class, 'store'])->name('store');
    Route::patch('/turmas/{turmas}', [TurmaController::class, 'update'])->name('update');
    Route::delete('/turmas/{turmas}', [TurmaController::class, 'destroy'])->name('destroy');
    Route::post('/turmas/{turmas}/professor', [TurmaController::class, 'addTeacher'])->name('addTeacher');

});
