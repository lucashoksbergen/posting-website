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

Route::get('/projects', function () {
    return view('projects');

});