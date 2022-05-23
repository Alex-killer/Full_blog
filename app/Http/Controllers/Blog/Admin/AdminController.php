<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $categories_count = Category::all()->count();
        return view('blog.admin.index', compact('categories_count'));
    }
}
