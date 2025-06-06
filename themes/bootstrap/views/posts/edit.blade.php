@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Post') }}</div>

                <div class="card-body">


                    <form method="post" action="{{ route('posts.update',$post->id) }}">
                        @csrf
                        <div class="form-group ">
                            <label>Post Title</label>
                            <input type="text" name="title" class="form-control" aria-describedby="emailHelp" placeholder="Please enter post title" value="{{ $post->title }}" required>

                        </div>
                        <div class="form-group mt-2">
                            <label>Post Description</label>
                            <textarea name="description" class="form-control" placeholder="Please enter post description" rows="10" required>{{ $post->description }}</textarea>


                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Edit Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection