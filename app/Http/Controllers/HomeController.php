<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = [];
        $latest_posts = [];
        $main_posts = Post::where('published', '=', 1)->latest()->limit(15)->get();
        for ($i=0; $i < count($main_posts); $i++) {
            if (isset($main_posts[$i])) {
                if ($i > 4)
                    $posts[] = $main_posts[$i];
                else
                    $latest_posts[] = $main_posts[$i];
            }
        }

        $popular = Post::where('published', '=', 1)->orderBy('browsed', 'desc')->limit(10)->get();


        return view('index', compact('latest_posts', 'posts', 'popular'));
    }
}
