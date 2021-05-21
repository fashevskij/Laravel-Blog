<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create() {
        return view('user.create');
    }

    public function store(StoreUser $request) {
        $user = User::query()->create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),//хешируем пароль перед внесением
        ]);
        //выводим флеш сообщение после регистрации
        session()->flash('flashText','Пользователь успешено зарегестрирован');
        return redirect()->home();
    }

    public function login() {
        return view('user.login');
    }
    public function loginstore(Request $request) {
        //валидационные правила для формы логина
        $request->validate([
            'email'=> ['required','email'],
            'password'=>['required'],

        ]);
        //проверка есть лить такой логин и ппароль в бд
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password, ])) {
            session()->flash('flashText','Пользователь успешено залогинился');
            return redirect()->home();  //если все ок то переходим на главную
        }else{//если нет
            //переходим на страницу входа и выводим сообщение
            return redirect()->route('login.login')->with('error','не правельный логин или пароль');
        }
    }
/*
    public function logout() {
        Auth::logout();//выход авторизованного пользователя
        return redirect()->route('login.login');//переходим на страницу входа
    }*/
}
