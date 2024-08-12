<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StateController;

Route::get('/ping', function (): JsonResponse {
    return response()->json(['Pong' => true]);
});

Route::get('/states', [StateController::class, 'index'])->name('state.index');
Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');