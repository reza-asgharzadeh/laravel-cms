<div id="comment-{{ $comment->id }}">
    <div class="comments__box">
        <div class="comments__inner">
            <div class="comments__header">
                <div class="comments__row">
                    <div class="d-flex flex-grow-1">
                        <img class="comment-pic" src="{{$comment->getProfile()}}" alt="">
                        <div class="comments__details">
                            <h5 class="comments__author"><span class="comments__author-name">{{ $comment->user->name }} <small>{{$comment->user->role_id == 3 ? '(مدیر سایت)' : ''}}</small></span></h5>
                            <span class="comments_date">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                <!-- Reply form start -->
                    <div class="d-flex flex-column">
                        <a class="reply-color" onclick="{{$comment->id}}.style.display='block'" id="display-button" data-toggle="reply-form" data-target="{{$comment->id}}">پاسخ</a>
                        @if(isset($post))
                        <form action="{{route('users.comment.post.store',$post_id)}}" method="post" class="reply-form d-none" id="{{$comment->id}}">
                            @csrf
                            <input type="hidden" name="comment_id" value="{{$comment->id}}">
                            <textarea placeholder="متن پاسخ خود را بنویسید..." rows="4" name="content"></textarea>
                            <button class="btn btn-purple" type="submit">ثبت پاسخ</button>
                            <button class="btn btn-gray" type="button" data-toggle="reply-form" data-target="{{$comment->id}}">لغو</button>
                        </form>
                        @else
                            <form action="{{route('users.comment.course.store',$course_id)}}" method="post" class="reply-form d-none" id="{{$comment->id}}">
                                @csrf
                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                <textarea placeholder="متن پاسخ خود را بنویسید..." rows="4" name="content"></textarea>
                                <button class="btn btn-purple" type="submit">ثبت پاسخ</button>
                                <button class="btn btn-gray" type="button" data-toggle="reply-form" data-target="{{$comment->id}}">لغو</button>
                            </form>
                        @endif
                    </div>
                <!-- Reply form end -->

                </div>
            </div>
            <p class="comments__body">
                {{ $comment->content }}
            </p>
        </div>
        @if($comment->approvedReplies->count() > 0)
            <div class="comments__subset">
                @foreach($comment->approvedReplies as $reply)
                    @include('comments', ['comment' => $reply])
                @endforeach
            </div>
        @endif
    </div>
</div>
