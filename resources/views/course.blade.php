<x-landing-layout>
    <x-slot name="links">
        <link rel="stylesheet" href="{{asset('assets/landing/css/post-course.css')}}">
        <link rel="stylesheet" href="{{asset('assets/landing/css/comments.css')}}">
        <link rel="stylesheet" href="{{asset('assets/landing/css/comment-avatar.css')}}">
        <style>
            .circle-number{
                height: 25px;
                width: 25px;
                background-color: #9400EA;
                color: #fff;
                border-radius: 50%;
                display: inline-block;
                text-align: center;
                font-size: 0.8em;
                padding: 4px;
            }
        </style>
    </x-slot>
<!-- Page Content -->
    <div id="app" class="container mb-5">

        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-md-8 shadow-lg">

                <!-- Blog Post -->

                <!-- Title -->
                <h1 class="mt-2 mb-3 h2">{{$course->name}}</h1>

                <!-- Date/Time -->
                <div class="d-flex justify-content-between">
                    <p><i class="fa fa-calendar"></i> تاریخ انتشار: {{$course->getCreatedAtInJalali()}}</p>
                </div>
                <img src="{{$course->getBanner()}}" class="img-fluid" alt="banner">
                <hr>

                <!-- Post Content -->
                {!! $course->content !!}
                <hr>
                <div class="alert alert-danger" role="alert">برای مشاهده تمامی قسمت ها باید این دوره را خریداری کنید</div>

                <div id="accordion">
                    <div class="card mb-3">
                        @foreach($course->episodes as $episode)
                        <div class="card-header">
                            <div class="d-flex bd-highlight mb-3">
                                <div class="p-2 bd-highlight"><a class="collapsed card-link" data-toggle="collapse" href="#{{$episode->slug}}"><span class="circle-number">{{$loop->iteration}}</span> {{$episode->name}}</a></div>
                                <div class="ms-auto p-2 bd-highlight">{{$episode->time}} دقیقه</div>
                                <div class="bd-highlight btn-video"><small><a href="{{route('episodes.show',[$episode->course,$episode->slug])}}" target="_blank"><i class="fa fa-eye"></i> مشاهده و دانلود</a></small></div>
                            </div>
                        </div>
                        <div id="{{$episode->slug}}" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                {!! $episode->content !!}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Blog Comments -->
                <div class="comments" id="comments">
                    @auth
                        <div class="comments__send">
                            <div class="comments__title">
                                <h3 class="comments__h3"> دیدگاه خود را بنویسید </h3>
                                <span class="comments__count">  نظرات ( {{$course->comments_count}} ) </span>
                            </div>
                            @error('content')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                            <form action="{{route('comment.course.store',$course->id)}}" method="post">
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
                        @foreach($course->comments as $comment)
                            @include('panel.landing_comments.course',['comment' => $comment,'course_id' => $course->id])
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- Blog Sidebar Widgets Column -->

            <div class="col-md-4">

                <div class="well bg shadow">
                    <p><i class="fa fa-money"></i> قیمت دوره: {{$course->price}} تومان</p>
                    <p><i class="fa fa-user"></i> مدرس: {{$course->user->name}}</p>
                    <p><i class="fa fa-eye"></i> تعداد بازدید: {{$course->view_count}}</p>
                    <p><i class="fa fa-users"></i> تعداد دانشجویان: {{$course->student_count}}</p>
                    <p><i class="fa fa-calendar"></i> تعداد قسمت: {{count($course->episodes)}}</p>
                    <p><i class="fa fa-clock-o"></i> مدت زمان آموزش: {{$course->time}}</p>
                    <p><i class="fa fa-info"></i> وضعیت دوره: {{$course->getStatus()}}</p>
                    <p><i class="fa fa-level-up"></i> سطح دوره: {{$course->getLevel()}}</p>
                    <p><i class="fa fa-calendar"></i> تاریخ شروع: {{$course->getCreatedAtInJalali()}}</p>
                    <p><i class="fa fa-calendar"></i> آخرین بروزرسانی: {{$course->getUpdatedAtInJalali()}}</p>
                    <form action="{{route('payment',$course->id)}}" method="post">
                        @csrf
                        <button style="width: 100%;padding: 10px" type="submit" class="btn btn-purple">{{$course->price == 0 ? 'رایگان' : 'ثبت نام در دوره'}}</button>
                    </form>
                </div>

            <!-- Blog Search Well -->
                <div class="well shadow">
                    <p class="h5">برچسب ها:</p>
                    <div class="input-group">
                        @foreach($course->tags as $tag)
                            <a href="{{route('course.tag.show',$tag->slug)}}">{{$tag->name}}</a>
                        @endforeach
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Side Widget Well -->
                <div class="well shadow">
                    <p class="h5">دوره های پر فروش:</p>
                    @foreach($most_student as $student)
                        <img src="{{$student->getBanner()}}" alt="banner" class="img-fluid"> {{$student->name}} <br>
                    @endforeach
                </div>

            </div>
        </div>

    </div>
    <!-- /.container -->
    <x-slot name="scripts">
        {{--    start episode toggle    --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        {{--    end episode toggle    --}}
        <script src="{{asset('assets/landing/js/comment-replies.js')}}"></script>
    </x-slot>
</x-landing-layout>
