<?php

use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\UserController;
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

Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('post.home');
Route::get('/single/{slug}', [\App\Http\Controllers\PostController::class, 'show'])->name('post.single');
Route::get('/category/{slug}', [\App\Http\Controllers\PostController::class, 'category'])->name('post.category');
Route::get('/tag/{slug}', [\App\Http\Controllers\PostController::class, 'tags'])->name('post.tag');
//группа роутов для админки
//prefix - сокращение путей (автоматом доабвление admin перед путем)
//name - имя группы , в данном примере admin. и для обращения к именам внутри группы можно исп аdmin.index например
Route::prefix('admin')->middleware('admin')->name('admin.')->group(function (){
    Route::get('/',[MainController::class, 'index'])->name('index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/tags', TagController::class);
    Route::resource('/posts', PostController::class);
});
//middleware('guest') посредник с проверкой что пользователь не авторизован
Route::middleware('guest')->group(function (){
    Route::get('/register',[UserController::class,'create'])->name('register.create');//маршрут для показа формі регистрации
    Route::post('/register',[UserController::class,'store'])->name('register.store');//маршрут для передачи формі
    Route::get('/login',[UserController::class,'login'])->name('login.login');//маршрут для показа формі регистрации
    Route::post('/login',[UserController::class,'loginstore'])->name('login.loginstore');//маршрут для передачи формі
});


//middleware('auth') посредник с проверкой авторизован ли пользователь
Route::get('/logout',[UserController::class,'logout'])->name('login.logout')->middleware('auth');//маршрут для показа формі регистрации
