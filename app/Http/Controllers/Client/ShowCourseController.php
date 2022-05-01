<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;

class ShowCourseController extends Controller
{
    public function show(Course $course)
    {
        $course->increment('view_count');
        $most_student = $course->orderByDesc('student_count')->take(6)->get();
        $course->load(['comments' => function($query){
           return $query->where('comment_id',null)->where('is_approved',true);
        }])->loadCount('comments');


        $display = false;

        if(session('cart')) {
            foreach (session('cart') as $id => $details) {
                if ($course->id === $id) {
                    $display = true;
                }
            }
        }

        return view('client.course',compact(['course','most_student','display']));
    }
}
