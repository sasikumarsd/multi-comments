<div class="card mb-2" style="margin-left: {{ ($comment->depth - 1) * 30 }}px;">
    <div class="card-body">
        <p>{{ $comment->content }}</p>
        
        @if ($comment->depth < 3)
            <form method="POST" action="{{ route('comments.store') }}" class="mt-2">
                @csrf
                <input type="hidden" name="post_id" value="{{ $comment->post_id }}">
                <input type="hidden" name="parent_comment_id" value="{{ $comment->id }}">
                <div class="mb-2">
                    <textarea name="content" class="form-control" placeholder="Reply..." required></textarea>
                </div>
                <button class="btn btn-sm btn-secondary">Reply</button>
            </form>
        @endif
    </div>

    {{-- Recursive load of replies --}}
    @foreach ($comment->replies as $reply)
        @include('comments._comment', ['comment' => $reply])
    @endforeach
</div>
