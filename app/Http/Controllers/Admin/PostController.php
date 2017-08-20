<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class PostController extends Controller
{

    private function getSelect(){
        $cats = Category::tree();
        $select = array();
        foreach ( $cats as $cat ) {
            $select[$cat->id] = $cat->name;
            if(count($cat->childs) > 0) {
                foreach ( $cat->childs as $child ) {
                    $select[$child->id] = '--'.$child->name;
                }
            }
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
        $posts = Post::paginate(15);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $select = $this->getSelect();
        return view('admin.posts.create', compact('cats', 'select'));
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
            'name' => 'required|string|max:255',
            'url' => 'required|string|unique:posts,url|max:100',
            'category_id' => 'required',
            'annotation' => 'required|string|max:1000',
            'body' => 'required'
        ]);

        $post = new Post();
        $post->name = $request->name;
        $post->url = $request->url;
        $post->category_id = $request->category_id;
        $post->annotation = $request->annotation;
        $post->meta_title = $request->meta_title;
        $post->meta_keywords = $request->meta_keywords;
        $post->meta_description = $request->meta_description;
        $post->body = $request->body;
        if($request->has('published'))
            $post->published = $request->published;
        else $post->published = 0;


        $user = \Auth::user();

        $post->author = $user->id;
        $post->editor = $user->id;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $destinationPath =  public_path().'/files/images/';
            $filename = str_random(20) .'.' . $file->getClientOriginalExtension() ?: 'jpg';
            $post->image = $filename;


           Image::make($file->getRealPath())->resize(1200, 600)->save($destinationPath.$filename);

        }

        $post->save();

        $request->session()->flash('success', 'Статья добавлена!');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $select = $this->getSelect();
        return view('admin.posts.show', compact('post', 'select'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $select = $this->getSelect();
        return view('admin.posts.show', compact('post', 'select'));
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
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:100|unique:posts,url,'.$id,
            'category_id' => 'required|integer',
            'annotation' => 'required|string',
            'body' => 'required',
        ]);

        $post =Post::findOrFail($id);

        $post->name = $request->name;
        $post->url = $request->url;
        $post->category_id = $request->category_id;
        $post->annotation = $request->annotation;
        $post->meta_title = $request->meta_title;
        $post->meta_keywords = $request->meta_keywords;
        $post->meta_description = $request->meta_description;
        $post->body = $request->body;
        if($request->has('published'))
            $post->published = $request->published;
        else
            $post->published = 0;




        $user = \Auth::user();

        $post->editor = $user->id;

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $destinationPath =  public_path().'/files/images/';
            $filename = str_random(20) .'.' . $file->getClientOriginalExtension() ?: 'jpg';
            $post->image = $filename;
            Image::make($file->getRealPath())->resize(1200, 600)->save($destinationPath.$filename);
        }

        $post->save();

        $request->session()->flash('success', 'Статья изменена!');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        $request->session()->flash('success', 'Статья '.$post->name.' удалена!');

        return redirect()->route('posts.index');
    }

    public function  checkUrl($url){
        $post = Post::where('url', '=', $url)->first();
        if($post === null) {
            return response()->json([
                'free' => true,
            ]);
        }
        return response()->json([
            'free' => false,
        ]);
    }
}
