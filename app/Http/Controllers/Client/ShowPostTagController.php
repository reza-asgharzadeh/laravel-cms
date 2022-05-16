<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class ShowPostTagController extends Controller
{
    public function show(Tag $tag)
    {
        $posts = $tag->posts()->where('is_approved',true)->paginate(9);
        return view('client.post_tag',compact('tag','posts'));
    }
}
