<?php

namespace App\Http\Controllers\Views;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostView extends Controller
{
    public function index($url){

        $cat = Category::where('url', '=', $url)->first();
        if (isset($cat)) {
            $posts = Post::where('category_id', '=', $cat->id)
                ->where('published', '=', 1)->paginate(10);
            return view( 'posts.category', compact( 'cat', 'posts' ) );
        }
        else return redirect('/');
    }

    public function show($cat_url, $url){

        $post = Post::where('url', '=', $url)->first();

        return view('posts.show', compact('post'));
    }

    public function search($keyword){
        $posts = Post::where('name', 'LIKE', '%'.$keyword.'%')
                ->orWhere('annotation', 'LIKE', '%'.$keyword.'%')
                ->where('published', '=', 1)->paginate(10);
        return view( 'posts.search', compact( 'keyword', 'posts' ) );
    }

    public function searchRedirect(Request $request){
        if($request->has('keyword')){
            return redirect()->route('search', $request->keyword);
        }
        return redirect()->back();
    }
}
