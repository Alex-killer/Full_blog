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

Route::group(['namespace' => 'Blog', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/posts', 'PostController@index')->name('blog.post.index');
    Route::get('/post/{post:title}', 'PostController@show')->name('blog.post.show');
    Route::post('/post/{post:title}/comments', 'CommentController@store')->name('blog.post.comment.store');

    Route::get('/category/{category:title}', 'PostController@getPostsByCategory')->name('blog.category.index');

    Route::get('posts/tag/{tag:title}', 'PostController@getTagsByCategory')->name('blog.tag');
});

Route::get('/admin', 'Blog\Admin\AdminController@index')->name('admin.home');

Route::group(['prefix' => 'admin/categories', 'namespace' => 'Blog\Admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::get('/', 'CategoryController@index')->name('blog.admin.category.index');
    Route::get('/create', 'CategoryController@create')->name('blog.admin.category.create');
    Route::post('/', 'CategoryController@store')->name('blog.admin.category.store');
    Route::get('/{category}/edit', 'CategoryController@edit')->name('blog.admin.category.edit');
    Route::patch('/{category}', 'CategoryController@update')->name('blog.admin.category.update');
    Route::delete('/{category}', 'CategoryController@delete')->name('blog.admin.category.delete');
});

Route::group(['prefix' => 'admin/posts', 'namespace' => 'Blog\Admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::get('/', 'PostController@index')->name('blog.admin.post.index');
    Route::get('/create', 'PostController@create')->name('blog.admin.post.create');
    Route::post('/', 'PostController@store')->name('blog.admin.post.store');
    Route::get('/{post}/edit', 'PostController@edit')->name('blog.admin.post.edit');
    Route::patch('/{post}', 'PostController@update')->name('blog.admin.post.update');
    Route::delete('/{post}', 'PostController@delete')->name('blog.admin.post.delete');
});

Route::group(['prefix' => 'admin/tags', 'namespace' => 'Blog\Admin', 'middleware' => ['admin', 'verified']], function () {
    Route::get('/', 'TagController@index')->name('blog.admin.tag.index');
    Route::get('/create', 'TagController@create')->name('blog.admin.tag.create');
    Route::post('/', 'TagController@store')->name('blog.admin.tag.store');
    Route::get('/{tag:title}/edit', 'TagController@edit')->name('blog.admin.tag.edit');
    Route::patch('/{tag:title}', 'TagController@update')->name('blog.admin.tag.update');
    Route::delete('/{tag}', 'TagController@delete')->name('blog.admin.tag.delete');
});

Route::group(['prefix' => 'admin/users', 'namespace' => 'Blog\Admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::get('/', 'UserController@index')->name('blog.admin.user.index');
    Route::get('/create', 'UserController@create')->name('blog.admin.user.create');
    Route::post('/', 'UserController@store')->name('blog.admin.user.store');
    Route::get('/{user:name}/edit', 'UserController@edit')->name('blog.admin.user.edit');
    Route::patch('/{user:name}', 'UserController@update')->name('blog.admin.user.update');
    Route::delete('/{user}', 'UserController@delete')->name('blog.admin.user.delete');
});


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');
//
//require __DIR__.'/auth.php';

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
