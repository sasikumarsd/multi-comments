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
    if ($request->input('key') !== env('CRON_KEY')) {
        abort(403, 'Unauthorized');
    }

    Artisan::call('schedule:run');
    return 'Schedule executed.';
});


Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');



Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');


