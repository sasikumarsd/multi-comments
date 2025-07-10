@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <a href="/" class="btn btn-sm btn-secondary">← Back</a>
    </div>

    <hr>

    <h4>Add a Comment</h4>
    <livewire:comment-form :postId="$post->id" />

    <hr>

    <livewire:comment-list :postId="$post->id" />
@endsection
