<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
// Route::get('/', function () {
//     return view('welcome');
// });

use App\Models\Post;

Route::get('/', function () {
    $posts = Post::all();
    return view('posts.index', compact('posts'));
});


Route::get('/run-schedule', function (Request $request) {
    abort_unless($request->query('key') === env('CRON_KEY'), 403);
    Artisan::call('schedule:run');
    return 'Schedule triggered.';
});


Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');



Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');


