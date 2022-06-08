<x-landing-layout title="{{$course->name}}"
                  description="{{$course->description}}"
                  keywords="{{$course->keywords}}"
                  pageUrl="{{route('courses.show',$course->slug)}}">
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
                <img src="{{$course->getBanner()}}" class="img-fluid" alt="banner">

                <!-- Date/Time -->
                    <div class="d-flex justify-content-between mt-2">
                        <span class="mx-3 h6"><i class="fa fa-user"></i> مدرس: {{$course->user->name}}</span>
                        <span class="mx-3 h6"><i class="fa fa-calendar"></i> انتشار: {{$course->getCreatedAtInJalali()}}</span>
                        <span class="h6"><i class="fa fa-calendar"></i> بروزرسانی: {{$course->getUpdatedAtInJalali()}}</span>
                    </div>

                <!-- Title -->
                <h2 class="mt-3 mb-3 h2">{{$course->name}}</h2>

                <!-- Post Content -->
                {!! $course->content !!}

                @include('_partials.landing.chapters')

                <div class="d-flex mt-4">
                    <span>برچسب‌ها:</span>
                    @foreach($course->tags as $tag)
                        <span><a class="tags mx-2" href="{{route('course.tag.show',$tag->slug)}}">{{$tag->name}}</a></span>
                    @endforeach
                </div>
                <p class="text-center h5 mt-4 mb-4">میخوای این دوره رو به دوستاتم بفرستی؟</p>
                @include('_partials.landing.social_share')
                <hr>
                <div class="d-flex align-items-center mb-4">
                    <img class="border rounded-circle" src="{{$course->user->getProfile()}}" width="80px" height="80px" alt="{{$course->user->name}}">
                    <div class="d-flex flex-column mx-2">
                        <div>
                            <span><strong>{{$course->user->name}}</strong></span>
                            <span>{{$course->user->role_id == 1 ? '(مدیر سایت)' : ''}}</span>
                        </div>
                        <span>برنامه نویس و توسعه دهنده وب</span>
                    </div>
                </div>
                </article>

                <!-- Related Posts -->
                <h4 class="text-center">دوره‌های مرتبط</h4>
                <section class="user-blog">
                    <div id="demo1">
                        <div class="span12">
                            <div id="owl-demo1" class="owl-carousel">
                                @foreach($course->related_courses as $relatedCourse)
                                    <div class="item">
                                        <div class="blog-grid">
                                            <div class="img-date">
                                                <img src="{{$relatedCourse->getBanner()}}" height="120px">
                                            </div>
                                            <div class="discretion-blog">
                                                <h5>{{$relatedCourse->name}}</h5>
                                                <a class="btn btn-outline-primary" href="{{route('courses.show',$relatedCourse->slug)}}">مشاهده</a>
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
                        <div class="alert alert-danger" role="alert">
                            برای ارسال نظر، اول باید وارد سایت شوید.
                        </div>
                    @endauth
                    <div class="comments__list">
                        @foreach($course->comments as $comment)
                            @include('client.landing_comments.course',['comment' => $comment,'course_id' => $course->id])
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- Blog Sidebar Widgets Column -->

            <div class="col-md-4">
                <div class="sticky-top">
                    <div class="well bg shadow rounded-4">
                        <div class="d-flex">
                            <div><i class="fa fa-money text-purple"></i> <p class="d-inline-block h6">قیمت دوره:</p></div>
                            @if($course->offer && $course->offer->type == 'percent' && $course->offer->expiry_date >= Carbon\Carbon::now() && $course->offer->is_approved == true)
                                <div class="mx-1"><p class="text-decoration-line-through text-danger">{{$course->price}} تومان</p></div>
                                <div class="mx-1"><p class="h6 text-success">{{$course->getPrice() - ($course->getPrice() * $course->offer->value / 100)}} {{$course->price == 0 ? '' : 'تومان'}}</p></div>
                            @elseif($course->offer && $course->offer->type == 'fixed' && $course->offer->expiry_date >= Carbon\Carbon::now() && $course->offer->is_approved == true)
                                <div class="mx-1"><p class="text-decoration-line-through text-danger">{{$course->price}} تومان</p></div>
                                <div class="mx-1"><p class="h6 text-success">{{$course->getPrice() - ($course->offer->value)}} {{$course->price == 0 ? '' : 'تومان'}}</p></div>
                            @else
                                <div class="mx-1"><p class="h6">{{$course->getPrice()}} {{$course->price == 0 ? '' : 'تومان'}}</p></div>
                            @endif
                        </div>
                        <p class="h6"><i class="fa fa-user text-purple"></i> مدرس: {{$course->user->name}}</p>
                        <p class="h6"><i class="fa fa-eye text-purple"></i> تعداد بازدید: {{$course->view_count}}</p>
                        <p class="h6"><i class="fa fa-users text-purple"></i> تعداد دانشجویان: {{$course->student_count}}</p>
                        <p class="h6"><i class="fa fa-calendar text-purple"></i> تعداد فصل‌ها: {{count($course->chapters)}}</p>
                        <p class="h6"><i class="fa fa-calendar text-purple"></i> تعداد جلسات: {{count($course->episodes)}}</p>
                        <p class="h6"><i class="fa fa-clock-o text-purple"></i> مدت زمان حدودی دوره: {{$course->time}} ساعت</p>
                        <p class="h6"><i class="fa fa-clock-o text-purple"></i> مدت زمان دوره تا این لحظه: {{$courseTime < 60 ? $courseTime : $courseTime/60}} {{$courseTime < 60 ? 'دقیقه' : 'ساعت'}}</p>
                        <p class="h6"><i class="fa fa-info text-purple"></i> وضعیت دوره: {{$course->getStatus()}}</p>
                        <p class="h6"><i class="fa fa-level-up text-purple"></i> سطح دوره: {{$course->getLevel()}}</p>
                        <p class="h6"><i class="fa fa-asterisk text-purple"></i> پیش نیاز دوره: {{$course->pre_course}}</p>
                        <p class="h6"><i class="fa fa-calendar text-purple"></i> تاریخ شروع: {{$course->getCreatedAtInJalali()}}</p>
                        <p class="h6"><i class="fa fa-calendar text-purple"></i> آخرین بروزرسانی: {{$course->getUpdatedAtInJalali()}}</p>
                        @auth
                            @if($registeredButton)
                                <p class="btn btn-purple w-100">شما دانشجوی این دوره هستید.</p>
                            @else
                                @if($display)
                                    <a href="{{ route('cart') }}" class="btn btn-purple w-100">نهایی سازی خرید</a>
                                @else
                                    <a href="{{ route('add.to.cart', $course->id) }}" class="btn btn-purple w-100">{{$course->price == 0 ? 'رایگان' : 'ثبت نام در دوره'}}</a>
                                @endif
                            @endif
                        @else
                            <a href="{{ route('login')}}" class="btn btn-purple w-100">برای ثبت نام ابتدا باید وارد سایت شوید.</a>
                        @endauth
                    </div>

                    <!-- Side Widget Well -->
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
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
    <x-slot name="scripts">
        <script src="{{asset('assets/landing/js/comment-replies.js')}}"></script>
        <script src="{{asset('assets/landing/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/landing/js/carousel-jquery.js')}}"></script>
        @if(Session::has('add-remove-cart'))
            <script src="{{asset('assets/panel/js/sweetalert2.all.min.js')}}"></script>
            <script>
                Swal.fire({
                    title: "{{Session::get('add-remove-cart')}}",
                    icon: "success",
                    button: "باشه",
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
        @endif
    </x-slot>
</x-landing-layout>
