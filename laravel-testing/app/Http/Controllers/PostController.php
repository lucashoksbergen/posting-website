<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::orderByDesc('updated_at')->get(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }



    // Not functional yet

    public function store()
    {
        request()->validate([
            'content' => ['required'],
        ]);

        Post::Create([
            'title' => request('title'),
            'content' => request('content'),
            // Needs to get updated once actual users can happen
            'user_id' => Auth::id(),
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        return back();
    }

    public function update(Post $post)
    {
        request()->validate([
            'title' => ['required'],
            'content' => ['required']
        ]);

        $post->update([
            'title' => request('title'),
            'content' => request('content'),
            'updated_at' => now(),
        ]);

        return redirect('/posts/' . $post->id);
    }

    public function destroy(Post $post)
    {

        $post->delete();

        return redirect('/posts');

    }





}
