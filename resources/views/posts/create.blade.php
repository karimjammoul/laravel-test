@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create Post</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" id="title" value="{{ old('title') }}" required autofocus>
                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body" id="body" rows="10" required>{{ old('body') }}</textarea>
                        @if ($errors->has('body'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="image">Featured Image</label>
                        <input type="file" class="form-control-file {{ $errors->has('image') ? 'is-invalid' : '' }}" name="image" id="image">
                        @if ($errors->has('image'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
