<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PizzaDoceController;
use App\Http\Controllers\PizzaEspecialController;
use App\Http\Controllers\PizzaFrangoController;
use App\Http\Controllers\PizzaTradicionalController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home/pizzatradicional', [PizzaTradicionalController::class, 'home'])->name('homePizzaTradicional');
Route::get('/home/pizzaespecial', [PizzaEspecialController::class, 'home'])->name('homePizzaEspecial');
Route::get('/home/pizzadoce', [PizzaDoceController::class, 'home'])->name('homePizzaDoce');
Route::get('/home/pizzafrango', [PizzaFrangoController::class, 'home'])->name('homePizzaFrango');