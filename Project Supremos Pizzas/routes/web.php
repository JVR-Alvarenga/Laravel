<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

//Homes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home/pizza/tradicional', [HomeController::class, 'homeTradicional'])->name('home.pizza.tradicional');
Route::get('/home/pizza/especial', [HomeController::class, 'homeEspecial'])->name('home.pizza.especial');
Route::get('/home/pizza/doce', [HomeController::class, 'homeDoce'])->name('home.pizza.doce');
Route::get('/home/pizza/frango', [HomeController::class, 'homeFrango'])->name('home.pizza.frango');

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/home', [AdminController::class, 'home'])->name('admin.home');

    Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::get('/create/pizza', [PizzaController::class, 'create'])->name('create.pizza');
    Route::post('/create/pizza/action', [PizzaController::class, 'createAction'])->name('create.pizza.action');
});

//Admin
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('/admin/login/action', [AuthController::class, 'loginAction'])->name('admin.login.action');


    Route::get('/admin/register', [AuthController::class, 'register'])->name('admin.register');
    Route::post('/admin/register/action', [AuthController::class, 'registerAction'])->name('admin.register.action');
});


