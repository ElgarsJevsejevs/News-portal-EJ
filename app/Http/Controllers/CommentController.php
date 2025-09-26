<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'author_name' => 'required|string|max:255',
            'content'     => 'required|string',
            'captcha'     => 'required|numeric',
        ]);

        if ((int)$request->captcha !== session('captcha_answer')) {
            return back()->with('error', 'Nepareiza CAPTCHA atbilde!');
        }

        \App\Models\Comment::create([
            'post_id'     => $id,
            'author_name' => $request->author_name,
            'content'     => $request->content,
        ]);

        return redirect()->back()->with('success', 'Komentārs pievienots!');
    }

    public function destroy(\App\Models\Comment $comment)
    {
        $postId = $comment->post_id;

        $comment->delete();

        return redirect()
            ->route('posts.show', $postId)
            ->with('success', 'Komentārs izdzēsts!');
    }
}
