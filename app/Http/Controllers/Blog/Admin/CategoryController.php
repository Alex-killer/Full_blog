<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\CategoryRequest;
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

    public function store(CategoryRequest $request, Category $category)
    {
        $input = $request->all();
        $category->create($input);

        return redirect()->route('blog.admin.category.index');
    }

    public function edit(Category $category)
    {
        return view('blog.admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $input = $request->all();
        $category->update($input);

        return redirect()->route('blog.admin.category.index');
    }

    public function delete(Category $category)
    {
        $category->delete();

        return redirect()->route('blog.admin.category.index');
    }
}
