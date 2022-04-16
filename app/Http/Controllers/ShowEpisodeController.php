<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Episode;
use App\Models\Payment;

class ShowEpisodeController extends Controller
{
    public function show(Course $course, Episode $episode){
        $most_student = $course->orderByDesc('student_count')->take(6)->get();
        if (auth()->user()){
            $download_link = Payment::where('user_id',auth()->user()->id)->where('course_id',$course->id)->where('status_code',100)->first();
        } else {
            $download_link = '';
        }
        $episode->load(['comments' => function($query){
            return $query->where('comment_id',null)->where('is_approved',true);
        }])->loadCount('comments');
        return view('episode',compact(['course','episode','most_student','download_link']));
    }
}
