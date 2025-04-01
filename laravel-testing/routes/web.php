<?php


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


Route::get('/posts', function () {


    return view('posts', ['posts' => Post::all()]);

});

Route::get('/posts/{id}', function ($id) {

    $post = Post::find($id);

    return view('post', ['post' => $post]);

});

Route::get('/projects', function () {
    return view('projects');

});