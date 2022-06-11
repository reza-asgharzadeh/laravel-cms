<x-landing-layout title="{{$post->title}}"
                  description="{{$post->description}}"
                  keywords="{{$post->keywords}}"
                  pageUrl="{{route('posts.show',$post->slug)}}">
    <x-slot name="links">
        <link rel="stylesheet" href="{{asset('assets/landing/css/post-course.css')}}">
        <link rel="stylesheet" href="{{asset('assets/landing/css/comments.css')}}">
        <link rel="stylesheet" href="{{asset('assets/landing/css/comment-avatar.css')}}">
        <link rel="stylesheet" href="{{asset('assets/landing/css/related-posts-carousel.css')}}">
        <link rel="stylesheet" href="{{asset('assets/landing/css/owl.carousel.min.css')}}">
    </x-slot>
<!-- Page Content -->
    <div id="app" class="container mt-3">

        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-md-8 shadow-lg rounded-4">

                <article class="mt-3">
                <!-- Blog Post -->
                <img src="{{$post->getBanner()}}" class="img-fluid" alt="banner">

                <!-- Author -->
                <div class="d-flex justify-content-evenly mt-2">
                    <div class="d-flex flex-column flex-xxl-row">
                        <span class="mx-3 h6"><i class="fa fa-clock-o"></i> زمان مطالعه: {{round(App\Http\phpCountWordPersian::string(htmlspecialchars(trim(strip_tags($post->content)))) / 215)}} دقیقه</span>
                        <span class="h6"><i class="fa fa-eye"></i> تعداد بازدید: {{$post->view_count}}</span>
                    </div>

                    <div class="d-flex flex-column flex-xxl-row">
                        <span class="mx-3 h6"><i class="fa fa-calendar"></i> انتشار: {{$post->getCreatedAtInJalali()}}</span>
                        <span class="h6"><i class="fa fa-calendar"></i> بروزرسانی: {{$post->getUpdatedAtInJalali()}}</span>
                    </div>
                </div>
                <!-- Date/Time -->

                <!-- Title -->
                <h2 class="mt-3 mb-3 h2">{{$post->title}}</h2>

                <!-- Post Content -->
                {!! $post->content !!}
                <div class="d-flex mt-4">
                    <span>برچسب‌ها:</span>
                    @foreach($post->tags as $tag)
                        <span><a class="tags mx-2" href="{{route('post.tag.show',$tag->slug)}}">{{$tag->name}}</a></span>
                    @endforeach
                </div>
                <p class="text-center h5 mt-4 mb-4">میخوای این مقاله رو به دوستاتم بفرستی؟</p>
                @include('_partials.landing.social_share')
                <hr>
                @include('_partials.landing.author_information.post_author')
                </article>

                <!-- Related Posts -->
                <h4 class="text-center">مقالات مرتبط</h4>
                <section class="user-blog">
                    <div id="demo1">
                        <div class="span12">
                            <div id="owl-demo1" class="owl-carousel">
                                @foreach($post->related_posts as $relatedPost)
                                <div class="item">
                                    <div class="blog-grid">
                                        <div class="img-date">
                                            <img src="{{$relatedPost->getBanner()}}" height="120px">
                                        </div>
                                        <div class="discretion-blog">
                                            <h5>{{$relatedPost->title}}</h5>
                                            <a class="btn btn-outline-primary" href="{{route('posts.show',$relatedPost->slug)}}">خواندن</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>


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
                        <div class="alert alert-danger" role="alert">
                            برای ارسال نظر، اول باید وارد سایت شوید.
                        </div>
                    @endauth
                    <div class="comments__list">
                        @foreach($post->comments as $comment)
                            @include('client.landing_comments.post',['comment' => $comment,'post_id' => $post->id])
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- Blog Sidebar Widgets Column -->

            <div class="col-md-4">
                <div class="sticky-top">
                    <div class="well shadow rounded-4">
                        <h4 class="text-center">دوره‌های محبوب</h4>
                        <hr>
                        @foreach($most_student as $course)
                            <div class="bg-light p-2 border-start border-primary mb-3">
                                <div class="d-flex mb-2">
                                    <a class="text-dark" href="{{route('courses.show',$course->slug)}}">{{$course->name}}</a>
                                </div>

                                <div class="d-flex justify-content-evenly">
                                    <span class="text-muted small-txt"><i class="fa fa-users"></i> تعداد دانشجو: {{$course->student_count}}</span>
                                    <span class="text-muted small-txt"><i class="fa fa-user"></i> مدرس: {{$course->user->name}}</span>
                                </div>
                            </div>
                        @endforeach
                        <a class="btn btn-outline-primary d-block w-50 m-auto" href="{{route('courses')}}">مشاهده همه دوره‌ها</a>
                    </div>

                    <div class="well shadow rounded-4">
                        <h4 class="text-center">مقالات پر بازدید</h4>
                        <hr>
                        @foreach($most_visited as $post)
                            <div class="bg-light p-2 border-start border-primary mb-3">
                                <div class="d-flex mb-2">
                                    <a class="text-dark" href="{{route('posts.show',$post->slug)}}">{{$post->title}}</a>
                                </div>

                                <div class="d-flex justify-content-evenly">
                                    <span class="text-muted small-txt"><i class="fa fa-eye"></i> تعداد بازدید: {{$post->view_count}}</span>
                                    <span class="text-muted small-txt"><i class="fa fa-clock-o"></i> زمان مطالعه: {{round(App\Http\phpCountWordPersian::string(htmlspecialchars(trim(strip_tags($post->content)))) / 215)}} دقیقه</span>
                                </div>
                            </div>
                        @endforeach
                        <a class="btn btn-outline-primary d-block w-50 m-auto" href="{{route('blog')}}">مشاهده همه مقالات</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
    <x-slot name="scripts">
        <script src="{{asset('assets/landing/js/comment-replies.js')}}"></script>
        <script src="{{asset('assets/landing/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/landing/js/carousel-jquery.js')}}"></script>
    </x-slot>
</x-landing-layout>
