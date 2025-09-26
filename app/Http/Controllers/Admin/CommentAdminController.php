<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentAdminController extends Controller
{
    public function index()
    {
        $comments = Comment::with('post')->orderBy('created_at','desc')->get();
        return view('admin.comments.index', compact('comments'));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comments.index')->with('success', 'Komentārs izdzēsts!');
    }
}
