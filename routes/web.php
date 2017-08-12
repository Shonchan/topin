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

        $latest_posts = \App\Post::latest()->limit(5)->get();
        $posts = \App\Post::latest()->limit(15)->get();


        return view('index', compact('latest_posts', 'posts'));
    });

    Route::get('search/{keyword}', 'Views\PostView@search')->name('search');
    Route::post('search/', 'Views\PostView@searchRedirect')->name('search.redirect');

    Route::get( '/{url}', 'Views\PostView@index' )->name('category');

    Route::get('/{cat_url}/{url}', 'Views\PostView@show')->name('post');
});










