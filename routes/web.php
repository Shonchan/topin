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



Route::get('/', function () {

    $posts = array([
            "id" => 1,
            "name" => "test1",
            "url" => "test1",
            "desc" => "asdasdasdas"
        ],
        [
            "id" => 2,
            "name" => "test2",
            "url" => "test2",
            "desc" => "werwerwefwefwef"
        ]);



    return view('index', array(
        'name' => 'Alex',
        'posts' => $posts,
    ));
});

Auth::routes();



Route::namespace('Admin')->prefix('admin')->middleware('admin')->group(function (){
    Route::get( '/', function () {
        return view('admin.parts.panel');
    } );
    Route::resource('posts', 'PostController');
    Route::resource('users', 'UserController');
    Route::resource('categories', 'CategoryController');
});

Route::get('search/{keyword}', 'Views\PostView@search')->name('search');
Route::post('search/', 'Views\PostView@searchRedirect')->name('search.redirect');

Route::get( '/{url}', 'Views\PostView@index' )->name('category');

Route::get('/{cat_url}/{url}', 'Views\PostView@show')->name('post');








