<?php

use App\Http\Controllers\Admin\IndexAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DeleteUserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PasswordSettingsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Livewire\Admin\Categories;
use App\Livewire\Admin\Comments;
use App\Livewire\Admin\Posts;
use App\Livewire\Admin\Users;
use App\Livewire\CreatePost;
use App\Livewire\ShowPost;
use App\Livewire\EditPost;

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

Route::get('/blog', [BlogController::class, 'index'])->name('blog');

Route::get('/profile',[UserController::class, 'profile'])->name('profile');

Route::resource('users', UserController::class)->only('show');

Route::middleware(['auth','can:admin'])->prefix('/admin')->as('admin.')->group(function(){
    
    Route::get('/', [IndexAdminController::class, 'index'])->name('index');

    Route::get('/posts', Posts::class)->name('posts');

    Route::get('/user/{user}/edit', [UserAdminController::class, 'edit'])->name('userEdit');

    Route::put('/user/{user}', [UserAdminController::class, 'update'])->name('userUpdate');

    Route::get('/users',Users::class)->name('users');

    Route::get('/comments', Comments::class)->name('comments');

    Route::get('/categories', Categories::class)->name('categories');
});

Route::resource('userSettings', SettingsController::class)->only(['edit','index','update'])->middleware('auth');

Route::put('/userSettingsPassword/{user}', [PasswordSettingsController::class, 'update'])->middleware('auth')->name('password.update');

Route::resource('userSettingsDelete', DeleteUserController::class)->only(['show','destroy'])->middleware('auth');

Route::get('post/create', CreatePost::class)->middleware('auth')->name('post.create');

Route::get('post/{post}', ShowPost::class)->name('post.show');

Route::get('post/{post}/edit', EditPost::class)->name('post.edit')->middleware('auth');