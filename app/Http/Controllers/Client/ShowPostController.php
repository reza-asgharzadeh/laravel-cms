<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Post;

class ShowPostController extends Controller
{
    public function show(Post $post)
    {
        if($post->is_approved){
            $post->increment('view_count');
            $most_visited = Post::where('is_approved',true)->orderByDesc('view_count')->take(6)->get();
            $most_student = Course::where('is_approved',true)->orderByDesc('student_count')->take(6)->get();

            $post->load(['comments' => function($query){
                return $query->where('comment_id',null)->where('is_approved',true);
            }])->loadCount('comments');

            return view('client.post',compact(['post','most_student','most_visited']));
        }
        abort(404);
    }
}
