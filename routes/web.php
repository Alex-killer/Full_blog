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

Route::get('/admin', 'Blog\Admin\AdminController@index')->name('admin.home');

Route::group(['prefix' => 'admin', 'namespace' => 'Blog\Admin'], function () {
    Route::get('/categories', 'CategoryController@index')->name('blog.admin.category.index');
    Route::get('/categories/create', 'CategoryController@create')->name('blog.admin.category.create');
    Route::get('/categories/{category}/edit', 'CategoryController@edit')->name('blog.admin.category.edit');
    Route::post('/categories', 'CategoryController@store')->name('blog.admin.category.store');
    Route::get('/categories/{category:title}', 'CategoryController@show')->name('blog.admin.category.show');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Blog\Admin'], function () {
    Route::get('/posts', 'PostController@index')->name('blog.post.index');
    Route::get('/posts', 'PostController@create')->name('blog.post.create');
    Route::get('/posts/{post:title}', 'PostController@show')->name('blog.post.show');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');
//
//require __DIR__.'/auth.php';
