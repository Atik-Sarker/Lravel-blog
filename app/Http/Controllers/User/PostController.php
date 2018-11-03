<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    public function index($id){
        $post = Post::findOrFail($id);
        return view('fontEnd.include.post', compact('post'));
    }
}
