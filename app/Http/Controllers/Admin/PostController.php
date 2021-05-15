<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StorePost;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::query()->paginate(10);//создаем массив категорий
        return view('admin.posts.index', compact('posts'));//возвращаем вид и передаем в него категории
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::query()->pluck('title','id')->all();//получаем на сранице создания поста список категорий
        $tags = Tag::query()->pluck('title','id')->all();//получаем на странице создания поста списко тегов
        return view('admin.posts.create',compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request )
    {

        return redirect()->route('admin.posts.index')->with('success', 'post is add');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param StorePost $id
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       return view('admin.categories.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {

        return redirect()->route('admin.posts.index')->with('success', 'post is change');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       /* Post::destroy($id);//удаляем пост*/
        return redirect()->route('admin.posts.index')->with('success', 'post delete');
    }
}
