<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;

class CommentList extends Component
{
    public $postId;

    protected $listeners = ['comment-added' => '$refresh'];

    public function mount($postId)
    {
        $this->postId = $postId;
    }

    public function render()
    {
        $comments = Comment::where('post_id', $this->postId)
            ->whereNull('parent_comment_id')
            ->with('replies.replies.replies')
            ->get();

        return view('livewire.comment-list', [
            'comments' => $comments,
        ]);
    }
}



