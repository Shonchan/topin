<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    private function getSelect(){
        $root_cats = Category::get()->where('parent_id', '=', 0);
        $select = array();
        $select[0] = 'Корневая рубрика';
        foreach ( $root_cats as $cat ) {
            $select[$cat->id] = $cat->name;
        }
        return $select;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::tree();

        return view('admin.categories.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $select = $this->getSelect();
        return view('admin.categories.create', compact('select'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'url' => 'required|string|unique:categories,url',
            'parent_id' => 'required|integer',
        ]);

        $cat = new Category();

        $cat->name = $request->name;
        $cat->url = $request->url;
        $cat->parent_id = $request->parent_id;
        $cat->meta_title = $request->meta_title;
        $cat->meta_keywords = $request->meta_keywords;
        $cat->meta_description = $request->meta_description;
        $cat->description = $request->description;

        $cat->save();

        $request->session()->flash('success', 'Рубрика добавлена!');


        return redirect()->route('categories.show', $cat->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = Category::findOrFail($id);
        $select = $this->getSelect();
        return view('admin.categories.show', compact('cat', 'select'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Category::findOrFail($id);
        $select = $this->getSelect();
        return view('admin.categories.show', compact('cat', 'select'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'url' => 'required|string|unique:categories,url,'.$id,
            'parent_id' => 'required|integer',
        ]);

        $cat = Category::findOrFail($id);

        $cat->name = $request->name;
        $cat->url = $request->url;
        $cat->parent_id = $request->parent_id;
        $cat->meta_title = $request->meta_title;
        $cat->meta_keywords = $request->meta_keywords;
        $cat->meta_description = $request->meta_description;
        $cat->description = $request->description;

        $cat->save();

        $request->session()->flash('success', 'Рубрика изменена!');


        return redirect()->route('categories.show', $cat->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $cat = Category::findOrFail($id);
        $cat->delete();

        $request->session()->flash('success', 'Рубрика '.$cat->name.' удалена!');

        return redirect()->route('categories.index');
    }
}
