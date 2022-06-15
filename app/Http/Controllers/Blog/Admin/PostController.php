<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Post\StoreRequest;
use App\Http\Requests\Blog\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends BaseController
{
    public function index()
    {
        $posts = Post::paginate(10);
        return view('blog.admin.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('blog.admin.post.create', compact('categories', 'tags'));
    }

    public function store(StoreRequest $request)
    {
        $input = $request->validated();
        $this->service->store($input);

        return redirect()->route('blog.admin.post.index');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('blog.admin.post.edit', compact('categories', 'post', 'tags'));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $input = $request->validated();
        $post = $this->service->update($input, $post);

        return redirect()->route('blog.admin.post.index', compact('post'));
    }

    public function delete(Post $post)
    {
        $post->delete();

        return redirect()->route('blog.admin.post.index');
    }
}
