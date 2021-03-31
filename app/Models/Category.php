<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Category extends Model
{

    //создаем связь таблицы категорий с табл постами
    public function posts() {

        //hasMany - связь один к многим (одна категория может содержать много постов но не наоборот)
        return $this->hasMany( Post::class);
    }
}
