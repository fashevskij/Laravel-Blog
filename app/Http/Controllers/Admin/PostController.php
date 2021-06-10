<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StorePost;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //with('category','tags') - вытащили cвязь категорий и тегов
        $posts = Post::query()->with('category','tags')->paginate(10);//создаем массив категорий
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePost $request)
    {
        $data = $request->all();

        $data['img'] = Post::uploadImg($request);//получаем метод для загрузки изображения из модели пост
        $post = Post::query()->create($data);//сохраняем в переменную пост те данніе которіе мы ввели при создании поста
        $post->tags()->sync($request->tag_id);//заносим связаные теги с постом в таблицу постов
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
        $categories = Category::query()->pluck('title','id')->all();//получаем на сранице создания поста title категорий
        $tags = Tag::query()->pluck('title','id')->all();//получаем на странице создания поста title тегов
        $post = Post::query()->find($id);
       return view('admin.posts.edit',compact('categories','tags','post'));
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
        $post= Post::query()->find($id);//находим в таблице строку с постом по айди
        $data = $request->all();//ложим в дата все что передано post запросом
        $data['img'] = Post::uploadImg($request, $post->img);//вызываем метод модели поста с доп параметром пути к картинки для удаления

        $post->update($data);//обновляем все данніе в посте
        $post->tags()->sync($request->tag_id);//заносим связаные теги с постом в таблицу постов
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
        $post = Post::query()->find($id);
        $post->tags()->sync([]);// $post получает доступ к таблице post_id через tags() и обновляем с помощью async данніе в post_id
        Storage::delete($post->img);//удаление картинки поста из сторедж
        $post->delete();//удаление самого поста

        return redirect()->route('admin.posts.index')->with('success', 'post delete');
    }
}
