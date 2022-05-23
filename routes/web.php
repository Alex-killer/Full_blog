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

Route::group(['prefix' => 'admin/categories', 'namespace' => 'Blog\Admin'], function () {
    Route::get('/', 'CategoryController@index')->name('blog.admin.category.index');
    Route::get('/create', 'CategoryController@create')->name('blog.admin.category.create');
    Route::post('/', 'CategoryController@store')->name('blog.admin.category.store');
    Route::get('/{category}/edit', 'CategoryController@edit')->name('blog.admin.category.edit');
    Route::patch('/{category}', 'CategoryController@update')->name('blog.admin.category.update');
    Route::delete('/{category}', 'CategoryController@delete')->name('blog.admin.category.delete');
});

Route::group(['prefix' => 'admin/posts', 'namespace' => 'Blog\Admin'], function () {
    Route::get('/', 'PostController@index')->name('blog.admin.post.index');
    Route::get('/create', 'PostController@create')->name('blog.admin.post.create');
    Route::post('/', 'PostController@store')->name('blog.admin.post.store');
    Route::get('/{post}/edit', 'PostController@edit')->name('blog.admin.post.edit');
    Route::patch('/{post}', 'PostController@update')->name('blog.admin.post.update');
    Route::delete('/{post}', 'PostController@delete')->name('blog.admin.post.delete');
});


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');
//
//require __DIR__.'/auth.php';
