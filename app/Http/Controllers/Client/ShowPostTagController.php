<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class ShowPostTagController extends Controller
{
    public function show(Tag $tag)
    {
        $posts = $tag->posts()->paginate();
        return view('client.tag',compact('posts'));
    }
}
