<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mail\AuthMailController;

Route::get('/', [AuthMailController::class, 'index'])->name('home');
Route::get('/send-email', [AuthMailController::class, 'registerMail'])->name('mail.register');