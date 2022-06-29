<div id="comment-{{ $comment->id }}">
    <div class="comments__box">
        <div class="comments__inner">
            <div class="comments__header">
                <div class="comments__row">
                    <div class="d-flex flex-grow-1">
                        <img class="comment-pic" src="{{$comment->getProfile()}}" alt="">
                        <div class="comments__details">
                            <h5 class="comments__author"><span class="comments__author-name">{{ $comment->user->name }} <small>{{$comment->user->role_id == 1 ? '(مدیر سایت)' : ''}}</small></span></h5>
                            <span class="comments_date">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                <!-- Reply form start -->
                    <div class="d-flex flex-column">
                        @auth
                            <a class="reply-color" onclick="'comment'.{{$comment->id}}.style.display='block'" data-toggle="reply-form" data-target="comment{{$comment->id}}">پاسخ</a>
                        @else
                            <p class="reply-color"><small>برای ارسال پاسخ ابتدا وارد سایت شوید.</small></p>
                        @endauth
                        <form action="{{route('reply.comment.post.store',[$post_id,$comment->id])}}" method="post" class="reply-form d-none" id="comment{{$comment->id}}">
                            @csrf
                            <textarea placeholder="متن پاسخ خود را بنویسید..." rows="4" name="content"></textarea>
                            <div class="mb-3">
                                <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}"></div>
                            </div>
                            @if(Session::has('g-recaptcha-response'))
                                <p class="text-danger">{{Session::get('g-recaptcha-response')}}</p>
                            @endif
                            <button class="btn btn-purple" type="submit">ثبت پاسخ</button>
                            <button class="btn btn-gray" type="button" data-toggle="reply-form" data-target="comment{{$comment->id}}">لغو</button>
                        </form>
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
                    @include('client.landing_comments.post', ['comment' => $reply])
                @endforeach
            </div>
        @endif
    </div>
</div>
