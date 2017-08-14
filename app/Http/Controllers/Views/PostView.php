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
            $posts = Post::latest()->where('category_id', '=', $cat->id)
                ->where('published', '=', 1)->paginate(10);
            $popular = Post::where('published', '=', 1)
                ->where('category_id', '=', $cat->id)
                ->orderBy('browsed', 'desc')->limit(10)->get();
            return view( 'posts.category', compact( 'cat', 'posts', 'popular' ) );
        }
        else return redirect('/');
    }

    public function show($cat_url, $url)
    {
        $post = Post::where('url', '=', $url)->first();

        if ($browsed_posts = \Cookie::get('browsed_posts')) {

            if(array_key_exists($post->id, $browsed_posts) == false){
                $browsed_posts[$post->id] = $post->id;
                $post->browsed++;
                $post->save();
            }
        } else {
            $browsed_posts = [$post->id => $post->id];
            $post->browsed++;
            $post->save();
        }


        \Cookie::queue('browsed_posts', $browsed_posts, 60*24*30);


        $popular = Post::where('published', '=', 1)
            ->where('category_id', '=', $post->category_id)
            ->orderBy('browsed', 'desc')->limit(10)->get();

        return view('posts.show', compact('post', 'popular'));
    }

    public function search($keyword){
        $posts = Post::where('name', 'LIKE', '%'.$keyword.'%')
                ->orWhere('annotation', 'LIKE', '%'.$keyword.'%')
                ->where('published', '=', 1)->paginate(10);
        return view( 'posts.search', compact( 'keyword', 'posts' ) );
    }

    public function searchRedirect(Request $request){
        if($request->has('search')){
            return redirect()->route('search', $request->search);
        }
        return redirect()->back();
    }
}
