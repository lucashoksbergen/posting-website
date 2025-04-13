<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    public function edit(User $user, Post $post)
    {
        return $post->user->is($user);
    }

    public function editcomment(User $user, Comment $comment)
    {
        return $comment->user->is($user);
    }
}
