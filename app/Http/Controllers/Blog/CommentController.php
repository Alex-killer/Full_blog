<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\CommentRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Post $post)
    {
        $input = $request->all();
        $input['post_id'] = $post->id;
        $post->comments()->create($input);

        return redirect()->route('blog.post.show', $post->title);
    }
}
