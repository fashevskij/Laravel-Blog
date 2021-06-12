<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use mysql_xdevapi\TableUpdate;

class PostController extends Controller
{
    public function index()
    {
        //with('category','tags') - вытащили cвязь категорий и тегов
        $posts = Post::query()->with(['category', 'tags'])->paginate(2);//создаем массив категорий
        $categories = Category::all();
        $tags = Tag::all();

        return view('front.posts.index', compact(['posts', 'categories', 'tags']));
    }

    public function show($slug)
    {
        $post = Post::query()->where('slug', '=', $slug)->first();//получаем пост на который кликнули
        $post->views +=1;//к просмотру добавляем единицу
        $post->save();//сохраняем изменения
        return view('front.posts.single', compact('post'));
    }

    public function category($slug)
    {
        $category = Category::query()->where('slug', '=', $slug)->first();
       /* $category_id = null;
        foreach ($category->pluck('id')->all() as $id) {
            $category_id = $id;
        }*/
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::query()->where('category_id', '=', $category->id)->paginate(2);
        return view('front.posts.index', compact(['posts', 'categories', 'tags']));
    }

    public function tags($slug)
    {
     /*   $tag_id = Tag::query()->where('slug', '=', $slug)->first()->id;

        $post_id = Post::query()->getRelation('tags')->where('tag_id', '=', $tag_id)->get();*/
        $categories = Category::all();
        $tags = Tag::all();
        $tag = Tag::query()->where('slug', $slug)->first();
        $posts = $tag->posts()->where('tag_id', $tag->id)->paginate(2);
        return view('front.posts.index', compact(['posts', 'categories', 'tags']));

    }


}
