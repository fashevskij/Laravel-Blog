<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PostController extends Controller
{
  public function index() {
      //with('category','tags') - вытащили cвязь категорий и тегов
      $posts = Post::query()->with('category','tags')->paginate(10);//создаем массив категорий
        return view('front.posts.index',compact('posts'));
    }

    public function show($id) {
        $post = Post::query()->find($id);
      return view('front.posts.single', compact('post'));
    }
}
