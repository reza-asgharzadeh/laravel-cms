<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_approved',true)->paginate(9);
        return view('client.blog',compact('posts'));
    }
}
