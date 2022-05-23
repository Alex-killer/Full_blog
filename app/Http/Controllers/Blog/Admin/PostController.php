<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\PostRequest;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        return view('blog.admin.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('blog.admin.post.create', compact('categories'));
    }

    public function store(PostRequest $request, Post $post)
    {
        $input = $request->all();
        $post->update($input);
        dd($input);
        return redirect()->route('blog.admin.post.index');
    }

    public function delete(Post $post)
    {
        $post->delete();

        return redirect()->route('blog.admin.post.index');
    }
}
