<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Order;

class ShowCourseController extends Controller
{
    public function show(Course $course)
    {
        if($course->is_approved){
            $course->increment('view_count');
            $most_student = Course::where('is_approved',true)->orderByDesc('student_count')->take(6)->get();
            $course->load(['comments' => function($query){
                return $query->where('comment_id',null)->where('is_approved',true);
            }])->loadCount('comments');

            $courseTime = $course->episodes()->sum('time');

            $display = false;

            if(session('cart')) {
                foreach (session('cart') as $id => $details) {
                    if ($course->id === $id) {
                        $display = true;
                    }
                }
            }

            $registeredButton = false;

            if (auth()->user()){
                $orders = Order::where('user_id',auth()->user()->id)->where('order_status',1)->get();
                foreach ($orders as $order){
                    foreach ($order->courses as $myCourse){
                        if ($myCourse->id == $course->id){
                            $registeredButton = true;
                        }
                    }
                }
            }

            $relatedCourses = $course->whereHas('tags', function ($q) use ($course) {
                return $q->whereIn('name', $course->tags->pluck('name'));
            })
                ->where('id', '!=', $course->id) // So you won't fetch same post
                ->get();

            return view('client.course',compact(['course','most_student','courseTime','display','registeredButton','relatedCourses']));
        }
        abort(404);
    }
}
