<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class ShowCourseTagController extends Controller
{
    public function show(Tag $tag)
    {
        $courses = $tag->courses()->paginate();
        return view('tag',compact('courses'));
    }
}
