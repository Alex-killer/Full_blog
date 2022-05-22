<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::limit(9)->latest()->get();
        return view('blog.index', compact('posts'));
    }
}
