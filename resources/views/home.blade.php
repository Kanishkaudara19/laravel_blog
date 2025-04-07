@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Post') }}</div>

                <div class="card-body">


                    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group ">
                            <label>Post Title</label>
                            <input type="text" name="title" class="form-control" aria-describedby="emailHelp" placeholder="Please enter post title" required>

                        </div>
                        <div class="form-group mt-2">
                            <label>Post Description</label>
                            <textarea name="description" class="form-control" placeholder="Please enter post description" rows="10" required></textarea>


                        </div>
                        @if (session('status'))
                    <div class="alert alert-success mt-2" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                        <div class="form-group mt-2">
                            <input type="file" class="form-control" name="thumbnail">
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Post</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection