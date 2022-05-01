<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Comment\CreateCommentRequest;
use App\Http\Requests\Panel\Comment\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Episode;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function index()
    {
        Gate::authorize('view-comments');

        $parentComments = Comment::where('comment_id',null)->orderByDesc('id')->paginate(4);
        $childrenComments = Comment::where('comment_id','!=',null)->orderByDesc('id')->paginate(4);
        return view('panel.comments.index',compact(['parentComments','childrenComments']));
    }

    public function save(CreateCommentRequest $request, Comment $comment)
    {
        Gate::authorize('save-comment');

        $model = match ($comment->commentable_type) {
            'App\Models\Course' => Course::where('id',$comment->commentable_id)->first(),
            'App\Models\Post' => Post::where('id',$comment->commentable_id)->first(),
            'App\Models\Episode' => Episode::where('id',$comment->commentable_id)->first(),
        };

        $model->comments()->create([
            'content' => $request->get('content'),
            'comment_id' => $comment->id,
            'user_id' => auth()->user()->id
        ]);
        $request->session()->flash('status','پاسخ کاربر مورد نظر با موفقیت ایجاد شد !');
        return to_route('comments.index');
    }

    public function edit(Comment $comment)
    {
        Gate::authorize('edit-comments');

        return view('panel.comments.edit',compact('comment'));
    }

    public function reply(Comment $comment)
    {
        Gate::authorize('reply-comments');

        return view('panel.comments.reply',compact('comment'));
    }

    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        Gate::authorize('update-comments');

        $comment->update(
            $request->validated()
        );
        $request->session()->flash('status','نظر مورد نظر با موفقیت ویرایش شد !');
        return to_route('comments.index');
    }

    public function display(Request $request, Comment $comment)
    {
        Gate::authorize('is-approved-comments');

        $comment->update([
            'is_approved' => ! $comment->is_approved
        ]);
        $request->session()->flash('status','وضعیت نظر با موفقیت تغییر کرد !');
        return to_route('comments.index');
    }

    public function destroy(Request $request, Comment $comment)
    {
        Gate::authorize('delete-comments');

        $comment->delete();
        $request->session()->flash('status','نظر مورد نظر با موفقیت حذف شد !');
        return back();
    }
}
