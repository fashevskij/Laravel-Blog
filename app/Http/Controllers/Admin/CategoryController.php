<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::query()->paginate(10);//создаем массив категорий
        return view('admin.categories.index', compact('categories'));//возвращаем вид и передаем в него категории
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request )
    {   //создаем валидацию для раздела создания категории, что поле тайтл обязательное
       /* $request->validate([
           'title'=>'required'
        ]);*/
        //далее создаем сам пост
        Category::query()->create($request->all());
        // with('success', 'category is add') добавляем сообщение о том что категория успешно добавлена
        return redirect()->route('admin.categories.index')->with('success', 'category is add');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param StoreCategory $id
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::query()->find($id);//находим категорию по вібраному id
       return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategory $request, $id)
    {
        $category = Category::query()->find($id);//находим категорию по вібраному id
        $category -> update($request->all());//обновляем ее
        return redirect()->route('admin.categories.index')->with('success', 'category is change');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);//удаляем пост
        return redirect()->route('admin.categories.index')->with('success', 'category delete');
    }
}
