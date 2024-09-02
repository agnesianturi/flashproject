<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ArticleController;

Route::get('/', [GuestController::class, 'index'])->name('home');

Route::get('/login', [GuestController::class, 'login'])->name('login');
Route::post('/login', [GuestController::class, 'login'])->name('login');

Route::post('/logout', [GuestController::class, 'logout'])->name('logout');

Route::get('/article/{category}', [ArticleController::class, 'showArticle'])->name('showArticle');

Route::middleware(['auth', 'role:Admin'])->group(function (){
    Route::get('/admin/admin', [AdminController::class, 'showAdmin'])->name('showAdmin');
    Route::get('/admin/user', [AdminController::class, 'showUser'])->name('showUser');
    Route::resource('/admin', AdminController::class);
});

Route::resource('/user', UserController::class);

Route::resource('/user/article', ArticleController::class);

// Route::delete('/admin/user/{id}', [UserController::class, 'destroy'])->name('admin.destroy');





