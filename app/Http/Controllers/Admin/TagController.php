<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::query()->paginate(10);//создаем массив тег
        return view('admin.tags.index', compact('tags'));//возвращаем вид и передаем в него тег
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTag $request )
    {   //создаем валидацию для раздела создания тег, что поле тайтл обязательное
       /* $request->validate([
           'title'=>'required'
        ]);*/
        //далее создаем сам пост
        Tag::query()->create($request->all());
        // with('success', 'category is add') добавляем сообщение о том что тег успешно добавлена
        return redirect()->route('admin.tags.index')->with('success', 'tag is add');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param StoreTag $id
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::query()->find($id);//находим тег по вібраному id
       return view('admin.tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTag $request, $id)
    {
        $tag = Tag::query()->find($id);//находим тег по вібраному id
        $tag -> update($request->all());//обновляем ее
        return redirect()->route('admin.tags.index')->with('success', 'Tag is change');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $tags = Tag::query()->find($id);
        $tags_count = $tags->posts->count();
        if ($tags_count){
            return redirect()->route('admin.tags.index')->with('error',"tags $tags->title make $tags_count posts");
        }
        $tags->delete();
        return redirect()->route('admin.tags.index')->with('success', 'tag delete');
    }
}
