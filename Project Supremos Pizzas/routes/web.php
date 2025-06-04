<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TypePizzaController;



//Admin
Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/home', [AdminController::class, 'home'])->name('admin.home');
    
    Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
    
    Route::get('/create/pizza', [PizzaController::class, 'create'])->name('create.pizza');
    Route::post('/create/pizza/action', [PizzaController::class, 'createAction'])->name('create.pizza.action');
    
    Route::post('/create/type/pizzas/action', [TypePizzaController::class, 'createAction'])->name('create.type.pizza.action');
});


//Login/Cadastro
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('/admin/login/action', [AuthController::class, 'loginAction'])->name('admin.login.action');
    
    
    Route::get('/admin/register', [AuthController::class, 'register'])->name('admin.register');
    Route::post('/admin/register/action', [AuthController::class, 'registerAction'])->name('admin.register.action');
});


//Homes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home/pizzas/{id}', [HomeController::class, 'homePizzas'])->name('home.pizzas');


