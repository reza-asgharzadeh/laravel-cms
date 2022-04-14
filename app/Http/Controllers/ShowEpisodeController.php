<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Episode;

class ShowEpisodeController extends Controller
{
    public function show(Course $course, Episode $episode){
        $most_student = $course->orderByDesc('student_count')->take(6)->get();
        $episode->load(['comments' => function($query){
            return $query->where('comment_id',null)->where('is_approved',true);
        }])->loadCount('comments');
        return view('episode',compact(['course','episode','most_student']));
    }
}
