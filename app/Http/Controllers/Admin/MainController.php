<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class MainController extends Controller
{
    //функция отвечающая за логику на странице admin.index созданую в роутах
    public function index() {

        $tag = new Tag();
        $tag -> title = 'Привет Анна';
        $tag -> save();
        //возвращаем вид с папки admin/index.blade.php
        return view('admin.index');
    }
}
