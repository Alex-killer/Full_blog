<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(9);
        $categories = Category::all();
        return view('blog.post.index', compact('posts', 'categories'));
    }

    public function getPostsByCategory(Category $category)
    {
        $categories = Category::all();
        return view('blog.post.index', [
            'posts' => $category->posts()->paginate(9),
            'categories' => $categories]);
    }

    public function getTagsByCategory(Tag $tag)
    {
        $categories = Category::all();
        return view('blog.post.index', [
            'posts' => $tag->posts()->paginate(9),
            'categories' => $categories]);
    }

    public function show(Post $post)
    {
        return view('blog.post.show', compact('post'));
    }
}
