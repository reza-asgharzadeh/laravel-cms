<?php

namespace App\Http\Controllers;

use App\Http\Requests\Panel\Comment\CreateCommentRequest;
use App\Models\Course;
use App\Models\Post;

class CommentController extends Controller
{
    public function CourseStore(CreateCommentRequest $request, Course $course)
    {
        $course = Course::where('id',$course->id)->first();

        $course->comments()->create([
            'content' => $request->content,
            'comment_id' => $request->comment_id,
            'user_id' => auth()->user()->id
        ]);
        return back();
    }

    public function PostStore(CreateCommentRequest $request, Post $post)
    {
        $post = Post::where('id',$post->id)->first();

        $post->comments()->create([
            'content' => $request->content,
            'comment_id' => $request->comment_id,
            'user_id' => auth()->user()->id
        ]);
        return back();
    }
}
