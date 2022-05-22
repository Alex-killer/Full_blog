<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'BlogController@index')->name('home');

Route::group(['namespace' => 'Blog'], function () {
    Route::get('/posts', 'PostController@index')->name('blog.post.index');
    Route::get('/post/{post:title}', 'PostController@show')->name('blog.post.show');

    Route::get('/category/{category:title}', 'PostController@getPostsByCategory')->name('blog.category.index');

    Route::get('posts/tag/{tag:title}', 'PostController@getTagsByCategory')->name('blog.tag');
});

