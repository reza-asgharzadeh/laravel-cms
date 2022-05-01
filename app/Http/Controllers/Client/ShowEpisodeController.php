<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Episode;
use App\Models\Order;

class ShowEpisodeController extends Controller
{
    public function show(Course $course, Episode $episode){
        $most_student = $course->orderByDesc('student_count')->take(6)->get();

        $downloadLink = false;
        foreach ($course->orders as $order){
            $downloadLink = Order::where('user_id',auth()->user()->id)->where('id',$order->id)->where('order_status',1)->first();
            if($downloadLink){
                $downloadLink = true;
            }
        }

        $display = false;

        if(session('cart')) {
            foreach (session('cart') as $id => $details) {
                if ($course->id === $id) {
                    $display = true;
                }
            }
        }

        $episode->load(['comments' => function($query){
            return $query->where('comment_id',null)->where('is_approved',true);
        }])->loadCount('comments');

        return view('episode',compact(['course','episode','most_student','downloadLink','display']));
    }
}
