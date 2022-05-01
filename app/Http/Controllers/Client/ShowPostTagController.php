<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class ShowPostTagController extends Controller
{
    public function show(Tag $tag)
    {
        $posts = $tag->posts()->paginate();
        return view('tag',compact('posts'));
    }
}
