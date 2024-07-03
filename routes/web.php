<?php

use App\Http\Controllers\Admin\CommentAdminController;
use App\Http\Controllers\Admin\IndexAdminController;
use App\Http\Controllers\Admin\PostAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DeleteUserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PasswordSettingsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Livewire\CreatePost;
use App\Livewire\ShowPost;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/blog/oldest', [BlogController::class, 'blogOldest'])->name('blogOldest');

Route::get('/blog/latest', [BlogController::class, 'blogLatest'])->name('blogLatest');

Route::get('/profile',[UserController::class, 'profile'])->name('profile');

Route::resource('users', UserController::class)->only('show');

Route::middleware(['auth','can:admin'])->prefix('/admin')->as('admin.')->group(function(){
    
    Route::get('/', [IndexAdminController::class, 'index'])->name('index');

    Route::get('/posts', [PostAdminController::class, 'index'])->name('posts');

    Route::resource('/users',UserAdminController::class)->only(['index','edit','update']);

    Route::resource('comments', CommentAdminController::class)->only(['index','destroy']);
});

Route::resource('userSettings', SettingsController::class)->only(['edit','index','update'])->middleware('auth');

Route::put('/userSettingsPassword/{user}', [PasswordSettingsController::class, 'update'])->middleware('auth')->name('password.update');

Route::resource('userSettingsDelete', DeleteUserController::class)->only(['show','destroy'])->middleware('auth');

Route::get('post/create', CreatePost::class)->middleware('auth')->name('post.create');

Route::get('post/{post}', ShowPost::class)->name('post.show');