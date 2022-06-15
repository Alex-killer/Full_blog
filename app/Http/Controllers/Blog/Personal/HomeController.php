<?php

namespace App\Http\Controllers\Blog\Personal;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $comments_count = auth()->user()->comments->count();
        $likes_count = auth()->user()->likedPosts->count();

        return view('blog.personal.index', compact('comments_count', 'likes_count'));
    }
}
