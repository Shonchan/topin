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

Route::prefix('api')->group(function (){
    Route::get('post/{url}', 'Admin\PostController@checkUrl');
    Route::get('category/{url}', 'Admin\CategoryController@checkUrl');
});

Route::middleware('construct')->group(function (){
    Route::get('/', 'HomeController@index');


    Route::get('search/{keyword}', 'Views\PostView@search')->name('search');
    Route::post('search/', 'Views\PostView@searchRedirect')->name('search.redirect');

    Route::get('imager/{src?}', function ($src)
    {

        $cacheimage = Image::cache(function($image) use ($src) {
            return $image->make("files/images/".$src)->resize(100,50);
        }, 10, true);

        return Response::make($cacheimage, 200, array('Content-Type' => 'image/jpeg'));
    });

    Route::get( '/{url}', 'Views\PostView@index' )->name('category');

    Route::get('/{cat_url}/{url}', 'Views\PostView@show')->name('post');
});










