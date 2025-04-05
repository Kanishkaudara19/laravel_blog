@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allPost as $post)
                    <tr>
                        <th scope="row" class="w-10">{{ $post->id }}</th>
                        <td class="w-30">{{ $post->title }}</td>
                        <td class="w-50">{{ $post->description }}</td>
                        <td class="w-10" ><a href="{{ route('posts.edit',$post->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{ route('posts.delete',$post->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                    </tr>      
                    @endforeach
                </tbody>
            </table>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection