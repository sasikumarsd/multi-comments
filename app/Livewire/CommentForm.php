<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;

class CommentForm extends Component
{
    public $postId;
    public $parentId = null;
    public $depth = 1;
    public $content = '';

    public function submit()
    {
        $this->validate([
            'content' => 'required|string',
        ]);

        if ($this->depth > 3) {
            session()->flash('error', 'Maximum comment depth reached.');
            return;
        }

        Comment::create([
            'content' => $this->content,
            'post_id' => $this->postId,
            'parent_comment_id' => $this->parentId,
            'depth' => $this->depth,
        ]);

        $this->reset('content');

        $this->dispatch('comment-added');
    }

    public function render()
    {
        return view('livewire.comment-form');
    }
}
