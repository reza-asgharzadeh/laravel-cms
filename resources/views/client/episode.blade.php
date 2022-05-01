<x-landing-layout>
    <x-slot name="links">
        <link rel="stylesheet" href="{{asset('assets/landing/css/post-course.css')}}">
        <link rel="stylesheet" href="{{asset('assets/landing/css/comments.css')}}">
        <link rel="stylesheet" href="{{asset('assets/landing/css/comment-avatar.css')}}">
    </x-slot>
<!-- Page Content -->
    <div id="app" class="container mb-5">

        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-md-8 shadow-lg">

                <!-- Blog Post -->

                <!-- Title -->
                <h1 class="mt-2 mb-3 h2">{{$episode->name}}</h1>

                <!-- Date/Time -->
                <div class="d-flex justify-content-between">
                    <p><i class="fa fa-calendar"></i> تاریخ انتشار: {{$episode->getCreatedAtInJalali()}}</p>
                </div>
                @auth
                    @if($downloadLink)
                        <video controls class="w-100">
                            <source src="{{$episode->downloadUrl}}"
                                    type="video/mp4">
                            Sorry, your browser doesn't support embedded videos.
                        </video>
                    @else
                        <img src="" alt="خریداری کنید">
                    @endif
                @else
                    <img src="" alt="لاگین شوید">
                @endauth
                <div class="d-flex justify-content-between">
                    <div class="btn-video"><a href="{{route('courses.show',$course->slug)}}"><i class="fa fa-eye"></i> مشاهده جزئیات این دوره</a></div>
                    @auth
                        @if($downloadLink)
                            <div class="btn-video"><a href="{{$episode->downloadUrl}}" target="_blank"><i class="fa fa-download"></i> دانلود این جلسه</a></div>
                        @else
                            <div class="btn-video">
                                <a href="{{ route('add.to.cart', $course->id) }}"><i class="fa fa-money"></i> برای دانلود ابتدا باید در این دوره ثبت نام کنید</a>
                            </div>
                        @endif
                    @else
                        <div class="btn-video"><a href="{{route('login')}}"><i class="fa fa-sign-in"></i> برای دانلود ابتدا باید وارد سایت شوید</a></div>
                    @endauth
                </div>
                <hr>

                <!-- Post Content -->
                {!! $episode->content !!}
                <hr>
                <div class="alert alert-danger" role="alert">برای مشاهده تمامی قسمت ها باید این دوره را خریداری کنید</div>

                <!-- Blog Comments -->
                <div class="comments" id="comments">
                    @auth
                        <div class="comments__send">
                            <div class="comments__title">
                                <h3 class="comments__h3"> دیدگاه خود را بنویسید </h3>
                                <span class="comments__count">  نظرات ( {{$episode->comments_count}} ) </span>
                            </div>
                            @error('content')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                            <form action="{{route('comment.episode.store',$episode->id)}}" method="post">
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
                        @foreach($episode->comments as $comment)
                            @include('panel.landing_comments.episode',['comment' => $comment,'episode_id' => $episode->id])
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- Blog Sidebar Widgets Column -->

            <div class="col-md-4">

                <div class="well shadow">
                    <p class="h5">سر فصل ها:</p>
                    <ul class="catalogue">
                    @foreach($course->episodes as $episode)
                        <li class="{{Request::path() == "course/" . $episode->course->slug . "/episode/" . $episode->slug ? 'bg-info bg-gradient p-2' : ''}}"><i class="fa fa-check mx-1"></i><a href="{{route('episodes.show',[$episode->course,$episode->slug])}}">{{$episode->name}}</a></li>
                    @endforeach
                    </ul>
                </div>

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
                    @if($display)
                        <a href="{{ route('cart') }}" class="btn btn-purple w-100">نهایی سازی خرید</a>
                    @else
                        <a href="{{ route('add.to.cart', $course->id) }}" class="btn btn-purple w-100">{{$course->price == 0 ? 'رایگان' : 'ثبت نام در دوره'}}</a>
                    @endif
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
        <script src="{{asset('assets/landing/js/comment-replies.js')}}"></script>
    </x-slot>
</x-landing-layout>
