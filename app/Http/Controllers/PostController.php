<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::withCount('comments')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::with('comments')->findOrFail($id);

        $a = rand(1, 9);
        $b = rand(1, 9);

        session(['captcha_answer' => $a + $b]);

        return view('posts.show', compact('post', 'a', 'b'));
    }
}
