<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController as BlogController;
use App\Http\Controllers\CategoryController as BlogCategoryController;
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
    Route::get('posts', [PostController::class, 'index'])->name('get.posts');
    Route::get('posts/create', [PostController::class, 'create'])->name('create.posts');
    Route::get('posts/edit/{post}', [PostController::class, 'edit'])->name('edit.posts');

    Route::get('categories', [CategoryController::class, 'index'])->name('get.categories');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('create.categories');
    Route::get('categories/edit/{category}', [CategoryController::class, 'edit'])->name('edit.categories');
});

Route::get('/posts/{post:slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/categories/{category:slug}', [BlogCategoryController::class, 'show'])->name('blog.show');
