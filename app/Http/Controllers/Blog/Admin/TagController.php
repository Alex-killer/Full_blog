<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('blog.admin.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('blog.admin.tag.create');
    }

    public function store(TagRequest $request, Tag $tag)
    {
        $input = $request->all();
        $tag->create($input);

        return redirect()->route('blog.admin.tag.index');
    }

    public function edit(Tag $tag)
    {
        return view('blog.admin.tag.edit', compact('tag'));
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $input = $request->all();
        $tag->update($input);

        return redirect()->route('blog.admin.tag.index');
    }

    public function delete(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('blog.admin.tag.index');
    }
}
