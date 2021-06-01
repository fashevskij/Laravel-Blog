<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PostController extends Controller
{
  public function index() {
      //with('category','tags') - вытащили cвязь категорий и тегов
      $posts = Post::query()->with('category','tags')->paginate(10);//создаем массив категорий
        return view('front.posts.index',(compact('posts')));
    }

    public function show() {
      return view('front.posts.single');
    }
}
