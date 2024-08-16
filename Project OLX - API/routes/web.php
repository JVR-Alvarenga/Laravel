<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

Route::get('/ping', function () : JsonResponse {
    return response()->json(['Pong' => true]);
});

Route::get('/states', [StateController::class, 'findAll'])->name('state.all');
Route::get('/categories', [CategoryController::class, 'findAll'])->name('category.all');

Route::post('/user/signin', [UserController::class, 'signin'])->name('user.signin');
Route::post('/user/signup', [UserController::class, 'signup'])->name('user.signup');

Route::middleware(['auth'])->group(function () {
    Route::get('/user/me', [UserController::class, 'infoUser'])->name('user.info');
});

Route::get('/posts', [PostController::class, 'findAll'])->name('post.all');
Route::get('/posts/{id}', [PostController::class, 'findOne'])->name('post.findOne');
Route::get('/posts/add', [PostController::class, 'addPost'])->name('post.add');




// {
//     "title": "Poste 3",
//     "price": 1234,
//     "isNegotiable": 0,
//     "description": "Terceiro poste",
//     "user_id": 1,
//     "state_id": 2,
//     "category_id": 2
// }






