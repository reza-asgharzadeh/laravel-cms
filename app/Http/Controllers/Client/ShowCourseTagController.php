<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class ShowCourseTagController extends Controller
{
    public function show(Tag $tag)
    {
        $courses = $tag->courses()->paginate();
        return view('client.tag',compact('courses'));
    }
}
