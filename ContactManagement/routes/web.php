<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\DislikeController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Changed the 'home' to 'index' since in your method(HomeController) you defined an index class function for returning the home page while in your route you had called a 'home' class thus the error!
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}/update', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}/destroy', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/post/{id}/users', [PostController::class, 'showUsers']);
