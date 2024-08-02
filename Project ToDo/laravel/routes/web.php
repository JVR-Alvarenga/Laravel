<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;

Route::middleware(['auth'])->group(function (){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
    Route::get('/task/new', [TaskController::class, 'create'])->name('task.create');
    Route::post('/task/create_action', [TaskController::class, 'createAction'])->name('task.createAction');
    
    Route::get('/task/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::post('/task/edit_action', [TaskController::class, 'editAction'])->name('task.editAction');
    Route::post('/task/update', [TaskController::class, 'update'])->name('task.update');
    
    Route::get('/task/delete', [TaskController::class, 'delete'])->name('task.delete');
    
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/categories', [CategoryController::class, 'index'])->name('category.home');

    Route::get('/categories/new', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/categories/new_action', [CategoryController::class, 'createAction'])->name('category.createAction');

    Route::get('/categories/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/categories/edit_action', [CategoryController::class, 'editAction'])->name('category.editAction');

    Route::get('/categories/delete', [CategoryController::class, 'delete'])->name('category.delete');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/action', [AuthController::class, 'loginAction'])->name('loginAction');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/action', [AuthController::class, 'registerAction'])->name('registerAction');