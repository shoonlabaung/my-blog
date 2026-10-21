<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostController;
Route::get('/', function () { return view('welcome');});
Route::get('/admin/posts/{id}', [UserController::class, 'show']);

Route::get('/front/detail/{id}', [FrontController::class, 'detail'])->name('front.detail');
Route::get('/',[App\Http\Controllers\FrontController::class,'index'])->name('index');
Route::get('/admin',[App\Http\Controllers\DashController::class,'index'])->name('admin.index');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\DashController::class, 'index'])->name('index');
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('posts', App\Http\Controllers\Admin\PostController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
