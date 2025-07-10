<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $post->load(['comments' => function ($query) {
            $query->whereNull('parent_comment_id')
                ->with('replies.replies.replies'); 
        }]);

        return view('posts.show', compact('post'));
    }

}
