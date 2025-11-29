<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TurmaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/teachers', [TeacherController::class, 'index'])->name('index');
    Route::post('/teachers', [TeacherController::class, 'store'])->name('store');
    Route::patch('/teachers/{teacher}', [TeacherController::class, 'update'])->name('update');
    Route::delete('/teachers/{teacher}', [TeacherController::class, 'destroy'])->name('destroy');

    Route::get('/students', [StudentController::class, 'index'])->name('index');
    Route::post('/students', [StudentController::class, 'store'])->name('store');
    Route::patch('/students/{student}', [StudentController::class, 'update'])->name('update');
    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('destroy');

    Route::get('/turmas', [TurmaController::class, 'index'])->name('index');
    Route::post('/turmas', [TurmaController::class, 'store'])->name('store');
    Route::patch('/turmas/{turma}', [TurmaController::class, 'update'])->name('update');
    Route::delete('/turmas/{turma}', [TurmaController::class, 'destroy'])->name('destroy');
    Route::post('/turmas/{turma}/professor', [TurmaController::class, 'addTeacher'])->name('addTeacher');
    Route::get('/turmas/{turma}', [TurmaController::class, 'show'])->name('show');
});
