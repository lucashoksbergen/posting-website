<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function storecomment(Post $post)
    {
        request()->validate([
            'content' => ['required'],
        ]);

        Comment::Create([
            'content' => request('content'),
            'user_id' => Auth::id(),
            'post_id' => $post->id,
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        return redirect('/posts/' . $post->id);
    }

    public function destroycomment(Post $post, Comment $comment)
    {
        // Authorize

        if ($comment->post_id !== $post->id) {
            abort(404);
        }

        $comment->delete();

        return back();

    } 
}
