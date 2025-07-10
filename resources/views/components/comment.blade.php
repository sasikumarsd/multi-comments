<div class="card mb-2" style="margin-left: {{ ($comment->depth - 1) * 30 }}px;">
    <div class="card-body">
        <p>{{ $comment->content }}</p>

        @if ($comment->depth < 3)
            <livewire:comment-form 
                :postId="$postId" 
                :parentId="$comment->id" 
                :depth="$comment->depth + 1" 
                :key="'form-'.$comment->id" 
            />
        @endif
    </div>

    
    @foreach ($comment->replies as $reply)
        @include('components.comment', ['comment' => $reply, 'postId' => $postId])
    @endforeach
</div>
