<?php

namespace App\Http\Controllers\Blog\Personal;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $liked_post = auth()->user()->likedPosts;

        return view('blog.personal.post.index', compact('liked_post'));
    }

    public function show(Post $post)
    {
        return view('blog.personal.post.show', compact('post'));
    }
}
