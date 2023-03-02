@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Blog</h1>
                <hr>
            </div>
        </div>

        <div class="row justify-content-between">
            <div class="col-auto">
                <a href="{{ route('posts.create') }}" class="btn btn-primary float-left">Create Post</a>
            </div>
            <div class="col-auto d-flex align-items-center">
                <form method="GET" action="{{ route('posts.index') }}" class="d-flex align-items-center">
                    <div class="form-group mb-0 flex-grow-1">
                        <input type="text" name="q" class="form-control" placeholder="Search..." value="{{ request('q') }}">
                    </div>
                    <button type="submit" class="btn btn-primary ml-2 flex-shrink-0">Search <i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <hr>
            </div>
        </div>

        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="card mb-4">
                        @if ($post->image)
                            <img src="{{ asset('storage/images/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                        @else
                            <img src="https://via.placeholder.com/640x360.png?text=No+Image" class="card-img-top" alt="{{ $post->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->body }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                <div class="btn-group">
                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-md-12">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
