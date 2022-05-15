<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class ShowCourseTagController extends Controller
{
    public function show(Tag $tag)
    {
        $courses = $tag->courses()->paginate(9);
        return view('client.course_tag',compact('tag','courses'));
    }
}
