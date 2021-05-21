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

Route::get('/', function () {
    return view('welcome');
})->name('home');
//группа роутов для админки
//prefix - сокращение путей (автоматом доабвление admin перед путем)
//name - имя группы , в данном примере admin. и для обращения к именам внутри группы можно исп аdmin.index например
Route::prefix('admin')->name('admin.')->group(function (){
    Route::get('/',[MainController::class, 'index'])->name('index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/tags', TagController::class);
    Route::resource('/posts', PostController::class);
});

Route::get('/register',[UserController::class,'create'])->name('register.create');//маршрут для показа формі регистрации
Route::post('/register',[UserController::class,'store'])->name('register.store');//маршрут для передачи формі

Route::get('/login',[UserController::class,'login'])->name('login.login');//маршрут для показа формі регистрации
Route::post('/login',[UserController::class,'loginstore'])->name('login.loginstore');//маршрут для передачи формі
