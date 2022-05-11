<x-landing-layout title="{{$post->title}}" description="{{$post->meta_description}}" keywords="salam,khubi" imageUrl="{{$post->getBanner()}}" pageUrl="{{$post->slug}}">
    <x-slot name="links">
        <link rel="stylesheet" href="{{asset('assets/landing/css/post-course.css')}}">
        <link rel="stylesheet" href="{{asset('assets/landing/css/comments.css')}}">
        <link rel="stylesheet" href="{{asset('assets/landing/css/comment-avatar.css')}}">
    </x-slot>
<!-- Page Content -->
    <div id="app" class="container mt-2">

        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-md-8 shadow-lg">

                <!-- Blog Post -->

                <!-- Title -->
                <h1 class="mt-2 mb-3 h2">{{$post->title}}</h1>

                <!-- Author -->
                <div class="d-flex justify-content-between">
                    <p><i class="fa fa-user"></i> نویسنده: <a href="#">{{$post->user->name}}</a></p>
                    <p><i class="fa fa-calendar"></i> تاریخ انتشار: {{$post->getCreatedAtInJalali()}}</p>
                    <p><i class="fa fa-eye"></i> تعداد بازدید: {{$post->view_count}}</p>
                </div>
                <!-- Date/Time -->

                <img src="{{$post->getBanner()}}" class="img-fluid" alt="...">
                <hr>
                <!-- Post Content -->
                <article>
                    {!! $post->content !!}
                </article>
                <hr>
                <p class="text-center h5 mb-4">میخوای این مقاله رو به دوستاتم بفرستی؟</p>
                @include('_partials.landing.social_share')
                <hr>
                <!-- Blog Comments -->
                <div class="comments" id="comments">
                    @auth
                        <div class="comments__send">
                            <div class="comments__title">
                                <h3 class="comments__h3"> دیدگاه خود را بنویسید </h3>
                                <span class="comments__count">  نظرات ( {{$post->comments_count}} ) </span>
                            </div>
                            @error('content')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                            <form action="{{route('comment.post.store',$post->id)}}" method="post">
                                @csrf
                                <textarea class="comments__textarea" name="content" placeholder="محتوای نظر خود را بنویسید..."></textarea>
                                <button class="btn btn-purple">ارسال نظر</button>
                                <button type="reset" class="btn btn-gray">انصراف</button>
                            </form>
                        </div>
                    @else
                        <p class="text-danger">برای ارسال نظر، اول باید وارد سایت شوید.</p>
                    @endauth
                    <div class="comments__list">
                        @foreach($post->comments as $comment)
                            @include('panel.landing_comments.post',['comment' => $comment,'post_id' => $post->id])
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- Blog Sidebar Widgets Column -->

            <div class="col-md-4">
            <!-- Blog Search Well -->
                <div class="well shadow">
                    <hp>جستجو در سایت</hp>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="fa-x fa-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Side Widget Well -->
                <div class="well shadow">
                    <p>مقالات پر بازدید</p>
                    @foreach($most_visited as $visit)
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <p>{{$visit->title}}</p>
                            <p>{{$visit->user->name}}</p>
                            <p>{{$visit->getCreatedAtInJalali()}}</p>
                        </div>
                        <div class="flex-grow-1 ms-5">
                            <img src="{{$visit->getBanner()}}" alt="banner" class="rounded" height="82">
                        </div>
                    </div><br>
                    @endforeach

                </div>

            </div>
        </div>

    </div>
    <!-- /.container -->
    <x-slot name="scripts">
        <script src="{{asset('assets/landing/js/comment-replies.js')}}"></script>
    </x-slot>
</x-landing-layout>
