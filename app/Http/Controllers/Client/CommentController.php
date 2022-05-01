<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Comment\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Episode;
use App\Models\Post;

class CommentController extends Controller
{
    public function CourseStore(CreateCommentRequest $request, Course $course)
    {
        $course->comments()->create([
            'content' => $request->get('content'),
            'comment_id' => $request->comment_id,
            'user_id' => auth()->user()->id
        ]);
        return back();
    }

    public function PostStore(CreateCommentRequest $request, Post $post)
    {
        $post->comments()->create([
            'content' => $request->get('content'),
            'comment_id' => $request->comment_id,
            'user_id' => auth()->user()->id
        ]);
        return back();
    }

    public function EpisodeStore(CreateCommentRequest $request, Episode $episode)
    {
        $episode->comments()->create([
            'content' => $request->get('content'),
            'comment_id' => $request->comment_id,
            'user_id' => auth()->user()->id
        ]);
        return back();
    }

    public function ReplyCourseStore(CreateCommentRequest $request, Course $course, Comment $comment){
        $course->comments()->create([
            'content' => $request->get('content'),
            'comment_id' => $comment->id,
            'user_id' => auth()->user()->id
        ]);
        return back();
    }

    public function ReplyPostStore(CreateCommentRequest $request, Post $post, Comment $comment){
        $post->comments()->create([
            'content' => $request->get('content'),
            'comment_id' => $comment->id,
            'user_id' => auth()->user()->id
        ]);
        return back();
    }

    public function ReplyEpisodeStore(CreateCommentRequest $request, Episode $episode, Comment $comment){
        $episode->comments()->create([
            'content' => $request->get('content'),
            'comment_id' => $comment->id,
            'user_id' => auth()->user()->id
        ]);
        return back();
    }
}
