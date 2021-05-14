<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;



class Category extends Model
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    use HasSlug;

    /**
     * Get the options for generating the slug.
     */
    protected $fillable = ['title'];//мы разрешаем вносить поле тайт через http запрос
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }
}
