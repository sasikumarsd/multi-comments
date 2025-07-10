<div>
    @foreach ($comments as $comment)
        @include('components.comment', ['comment' => $comment, 'postId' => $postId])
    @endforeach
</div>
