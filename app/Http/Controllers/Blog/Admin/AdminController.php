<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $categories_count = Category::all()->count();
        $posts_count = Post::all()->count();
        $tags_count = Tag::all()->count();
        $user_count = User::all()->count();
        return view('blog.admin.index', compact('categories_count', 'posts_count', 'user_count'));
    }
}
