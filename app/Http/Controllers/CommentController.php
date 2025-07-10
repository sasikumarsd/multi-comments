<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'post_id' => 'required|exists:posts,id',
            'parent_comment_id' => 'nullable|exists:comments,id',
        ]);

        $depth = 1;
        if ($request->parent_comment_id) {
            $parent = Comment::find($request->parent_comment_id);
            $depth = $parent->depth + 1;

            
            if ($depth > 3) {
                return back()->withErrors(['Too many nesting levels.']);
            }
        }

        Comment::create([
            'content' => $request->content,
            'post_id' => $request->post_id,
            'parent_comment_id' => $request->parent_comment_id,
            'depth' => $depth,
        ]);

        return back();
    }
}
