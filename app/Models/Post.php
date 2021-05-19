<?php

namespace App\Models;

use App\Http\Requests\StorePost;
use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


class Post extends Model
{
    use HasSlug;
    //создаем связь постом и тегов
    public function tags() {
        //многие к многим + заполнение времени при созаднии поста в талице post_tag
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
    //создаем свзяь постов и категорий
    public function category() {
        //belongsTo - многие к одному
        return $this->belongsTo(Category::class);
    }
    protected $fillable = ['title','description','content','category_id','img'];//мы разрешаем вносить поле тайт через http запрос
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public static function uploadImg(StorePost $request, $img = null) {

        //проверяем есть ли в поле инпут с именеим img файл
        if ($request->hasFile('img')) {
            if($img){
                Storage::delete($img);//удалим картинку сьарую из хранилища
            }
            $folder = date('Y-m-d');//в переменную фолдер ложим текущую дату
            // $data['img'] меняем этот обьект на строку с иминем путти к сохраненнию файла
            return $data['img'] = $request->file('img')->store("images/{$folder}");
        }
        if ($img) {
            return $img;
        }
        return null;
    }

    public function getImg() {//метод возвращающий картинку постов
        if(!$this->img) {//если картинки нет в базе
            return asset('no-image-02.png');//то вернем путь к но имг
        }
        return asset("upload/$this->img");//или получем путь что есть в базе
    }
}
