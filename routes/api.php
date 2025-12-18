<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassModelController;
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

    Route::get('/class-models', [ClassModelController::class, 'index']);
    Route::post('/class-models', [ClassModelController::class, 'store']);
    Route::patch('/class-models/{classModel}', [ClassModelController::class, 'update']);
    Route::delete('/class-models/{classModel}', [ClassModelController::class, 'destroy']);
    Route::post('/class-models/{classModel}/teacher', [ClassModelController::class, 'addTeacher']);
    Route::get('/class-models/{classModel}', [ClassModelController::class, 'show']);
});
