<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\PostRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('blog.admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('blog.admin.category.create');
    }

    public function store(PostRequest $request, Category $category)
    {
        $input = $request->all();
        $category->create($input);

        return redirect()->route('blog.admin.category.index');
    }

    public function edit(Category $category)
    {
        return view('blog.admin.category.edit', compact('category'));
    }
}
