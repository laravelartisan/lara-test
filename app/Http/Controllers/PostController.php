<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'comments'])->get();

        return view('posts.index', compact('posts'));
    }

    public function store(PostRequest $request)
    {
        Post::create([
            'user_id' => auth()->user(),
            'title' => $request->title,
            'post' => $request->post,
        ]);

        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $post = Post::with(['comments', 'user'])->findOrFail($id);

        return view('posts.show', compact('post'));
    }
}
