<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function Index(){
        $posts = Post::all();
        return view('welcome',compact('posts'));
    }
}
