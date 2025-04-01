<?php


use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

class Posts
{
    public static function all(): array
    {
        return Posts::all();
    }
}


Route::get('/', function () {
    return view('home');

});

// Index
Route::get('/posts', function () {

    return view('posts.index', ['posts' => Post::all()]);

});

// Individual Posts
Route::get('/posts/{id}', function ($id) {

    $post = Post::find($id);

    return view('posts.show', ['post' => $post]);

});

// Update Post
Route::patch('/posts/{id}', function ($id) {
    request()->validate([
        'title' => ['required'],
        'content' => ['required']
    ]);


    $post = Post::findOrFail($id);

    $post->update([
        'title' => request('title'),
        'content' => request('content'),
        'updated_at' => now(),
    ]);

    return redirect('/posts/' . $post->id);

});

// Create Comment
Route::post('/posts/{id}', function ($id) {

    request()->validate([
        'content' => ['required'],
    ]);

    Comment::Create([
        'content' => request('content'),
        // Needs to get updated once actual users can happen
        'user_id' => 1,
        'post_id' => $id,
        'created_at' => now(),
        'updated_at' => now(),

    ]);

    return redirect('/posts/' . $id);
});


// Destroy Post
Route::delete('/posts/{id}', function ($id) {

    Post::findOrFail($id)->delete();

    return redirect('/posts');

});

// Need to make system to delete comments