<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
   public function store(Request $request)
   {

      $validater = Validator::make(
         $request->all(),
         [
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'required|image'
         ]
      );

      if ($validater->fails()) {
         return back()->with('status', 'Something went wrong!');
      } else {
         $imageName = time().".".$request->thumbnail->extension();

         $request->thumbnail->move(public_path('thumbnails'),$imageName);
         Post::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => $imageName
         ]);
         return redirect(route('posts.all'))->with('status', 'Post Created Successfully');
      }
   }

   public function show($postId)
   {
      $post = Post::findOrFail($postId);
      return view('posts.show', compact('post'));
   }

   public function edit($postId)
   {
      $post = Post::findOrFail($postId);
      return view('posts.edit', compact('post'));
   }

   public function update(Request $request, $postId)
   {

      // $post = Post::find($postId);
      // $post->update([
      //    'title' => $request->title,
      //    'description' => $request->description
      // ]);

      Post::findOrFail($postId)->update($request->all());

      return redirect(route('posts.all'))->with('status', 'Post Updated');
   }

   public function delete($postId)
   {
      Post::findOrFail($postId)->delete();
      return redirect(route('posts.all'));
   }
}
