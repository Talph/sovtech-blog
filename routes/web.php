<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController as BlogController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/home', [DashboardController::class, 'index'])->name('home');

Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('posts/create', [PostController::class, 'create'])->name('create.posts');
    Route::get('posts', [PostController::class, 'index'])->name('get.posts');
    Route::get('posts/{post}', [PostController::class, 'edit'])->name('edit.posts');

    Route::get('categories', [CategoryController::class, 'index'])->name('get.categories');
    Route::get('categories/{category}', [CategoryController::class, 'edit'])->name('edit.categories');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('create.categories');

    Route::get('users', [UserController::class, 'index'])->name('get.users');
    Route::get('users/{user}', [UserController::class, 'edit'])->name('edit.users');
    Route::get('users/create', [UserController::class, 'create'])->name('create.users');

    Route::get('roles', [RoleController::class, 'index'])->name('get.roles');

});

Route::get('/posts/{post:slug}', [BlogController::class, 'show'])->name('blog.show');
