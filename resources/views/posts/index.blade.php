@extends('layouts.app')

@section('content')
    <h1 class="mb-4">All Posts</h1>

    @foreach ($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $post->title }}</h5>
                <p>{{ $post->content }}</p>
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary">View Comments</a>
            </div>
        </div>
    @endforeach
@endsection
