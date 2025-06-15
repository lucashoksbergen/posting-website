<?php


use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

class Posts
{
    public static function all(): array
    {
        return Posts::all();
        // N+1 problem prob
    }
}


// Route::resource('posts', PostController::class);

Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index');
    Route::get('/posts/{post}', 'show');

    Route::patch('/posts/{post}', 'update')
        ->middleware('auth')
        ->can('edit', 'post');

    Route::delete('/posts/{post}', 'destroy')
        ->name('posts.destroy')
        ->middleware('auth')
        ->can('edit', 'post');

    Route::post('/posts', 'store');
});

Route::controller(CommentController::class)->group(function () {
    Route::post('/posts/{post}', 'storecomment');

    Route::delete('/posts/{post}/comments/{comment}', 'destroycomment')
        ->name('comments.destroy')
        ->middleware('auth')
        ->can('editcomment', 'post');

});

// Auth

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])
    ->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);