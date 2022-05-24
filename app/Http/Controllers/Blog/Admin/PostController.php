<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

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
        $tags = Tag::all();

        return view('blog.admin.post.create', compact('categories', 'tags'));
    }

    public function store(PostRequest $request, Post $post)
    {
        $input = $request->all();
        $tagIds = $input['tag_ids'];
        unset($input['tag_ids']);
        $post->create($input)->tags()->attach($tagIds);

        return redirect()->route('blog.admin.post.index');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('blog.admin.post.edit', compact('categories', 'post', 'tags'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $input = $request->all();
        $tagIds = $input['tag_ids'];
        unset($input['tag_ids']);
        $post->update($input);
        $post->tags()->sync($tagIds);

        return redirect()->route('blog.admin.post.index');
    }

    public function delete(Post $post)
    {
        $post->delete();

        return redirect()->route('blog.admin.post.index');
    }
}
