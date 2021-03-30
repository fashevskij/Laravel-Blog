<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //функция отвечающая за логику на странице admin.index созданую в роутах
    public function index() {
        //возвращаем вид с папки admin/index.blade.php
        return view('admin.index');
    }
}
