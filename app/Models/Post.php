<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


class Post extends Model
{
    use HasSlug;
    //создаем связь постом и тегов
    public function tags() {
        //многие к многим
        return $this->belongsToMany(Tag::class);
    }
    //создаем свзяь постов и категорий
    public function category() {
        //belongsTo - многие к одному
        return $this->belongsTo(Category::class);
    }
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
