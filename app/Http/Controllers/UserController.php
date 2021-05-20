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
}
