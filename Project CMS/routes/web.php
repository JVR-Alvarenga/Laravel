<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Site\HomeSiteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Site\ProfileUserController;
use App\Http\Controllers\Site\ConfigGeneralController;
use App\Http\Controllers\Site\PageController;
use App\Http\Controllers\Site\RoutesController;

Route::prefix('admin')->middleware(['auth', 'can:edit-users'])->group(function () {
    Route::get('/home', [HomeAdminController::class, 'home'])->name('admin.home');
    Route::resource('/users', UserAdminController::class);
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'loginAction'])->name('loginAction');
    
    Route::get('/register', [RegisterController::class, 'register'])->name('user.register');
    Route::post('/register', [RegisterController::class, 'registerAction'])->name('user.registerAction');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    Route::get('/home', [HomeSiteController::class, 'home'])->name('site.home');
    
    Route::get('/profile', [ProfileUserController::class, 'profileHome'])->name('user.profile');
    Route::put('/edit/profile', [ProfileUserController::class, 'profileEdit'])->name('user.profileEdit');
    
    Route::get('/config/general', [ConfigGeneralController::class, 'config'])->name('config.general');
    Route::put('/config/edit/action', [ConfigGeneralController::class, 'editAction'])->name('config.editAction');
    
    Route::resource('/pages', PageController::class);

    Route::fallback([RoutesController::class, 'route']);
});
