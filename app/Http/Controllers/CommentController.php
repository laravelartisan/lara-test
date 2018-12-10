<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();

        return view('comments.index', compact('comments'));
    }

    public function store(CommentRequest $request)
    {
        Comment::create([
            'user_id' => auth()->user(),
            'post_id' => $request->post_id,
            'comments' => $request->comments,
        ]);

        return redirect()->route('comments.index');
    }

    public function show($id)
    {
        $comment = Comment::findOrFail($id);

        return view('comments.show', compact('comment'));
    }
}
