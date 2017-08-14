<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Auth::routes();



Route::namespace('Admin')->prefix('admin')->middleware('admin')->group(function (){
    Route::get( '/', function () {
        return view('admin.parts.panel');
    } );
    Route::resource('posts', 'PostController');
    Route::resource('users', 'UserController');
    Route::resource('categories', 'CategoryController');
});

Route::middleware('construct')->group(function (){
    Route::get('/', function () {

        //$latest_posts = \App\Post::latest()->limit(5)->get();
        $posts = [];
        $latest_posts = [];
        $main_posts = \App\Post::where('published', '=', 1)->latest()->limit(15)->get();
        for ($i=0; $i < count($main_posts); $i++) {
            if (isset($main_posts[$i])) {
                if ($i > 4)
                    $posts[] = $main_posts[$i];
                else
                    $latest_posts[] = $main_posts[$i];
            }
        }

        $popular = \App\Post::where('published', '=', 1)->orderBy('browsed', 'desc')->limit(10)->get();


        return view('index', compact('latest_posts', 'posts', 'popular'));
    });

    Route::get('search/{keyword}', 'Views\PostView@search')->name('search');
    Route::post('search/', 'Views\PostView@searchRedirect')->name('search.redirect');

    Route::get( '/{url}', 'Views\PostView@index' )->name('category');

    Route::get('/{cat_url}/{url}', 'Views\PostView@show')->name('post');
});










