<?php

namespace App\Http\Controllers\Blog\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Personal\Comment\UpdateRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = auth()->user()->comments;
        return view('blog.personal.comment.index', compact('comments'));
    }

    public function edit(Comment $comment)
    {

        return view('blog.personal.comment.edit', compact('comment'));
    }

    public function update(UpdateRequest $request, Comment $comment)
    {
        $input = $request->all();
        $comment->update($input);

        return redirect()->route('blog.personal.comment.index');
    }

    public function delete(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('blog.personal.comment.index');
    }
}
