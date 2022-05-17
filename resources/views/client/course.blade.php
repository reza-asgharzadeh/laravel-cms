<x-landing-layout title="{{$course->name}}"
                  description="{{$course->description}}"
                  keywords="{{$course->keywords}}"
                  pageUrl="{{route('courses.show',$course->slug)}}">
    <x-slot name="links">
        <link rel="stylesheet" href="{{asset('assets/landing/css/post-course.css')}}">
        <link rel="stylesheet" href="{{asset('assets/landing/css/comments.css')}}">
        <link rel="stylesheet" href="{{asset('assets/landing/css/comment-avatar.css')}}">
    </x-slot>
<!-- Page Content -->
    <div id="app" class="container mt-3">

        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-md-8 shadow-lg rounded-4">

                <!-- Blog Post -->

                <!-- Title -->
                <h1 class="mt-3 mb-3 h2">{{$course->name}}</h1>

                <!-- Date/Time -->
                <div class="d-flex justify-content-between">
                    <p><i class="fa fa-calendar"></i> تاریخ انتشار: {{$course->getCreatedAtInJalali()}}</p>
                </div>
                <img src="{{$course->getBanner()}}" class="img-fluid" alt="banner">
                <hr>

                <!-- Post Content -->
                <article>
                    {!! $course->content !!}
                </article>
                <hr>
                <div class="alert alert-danger" role="alert">برای مشاهده تمامی قسمت ها باید این دوره را خریداری کنید</div>

                <div id="accordion">
                    <div class="card mb-3">
                        @foreach($course->episodes as $episode)
                        <div class="card-header">
                            <div class="d-flex bd-highlight mb-3">
                                <div class="p-2 bd-highlight"><a class="collapsed card-link" data-toggle="collapse" href="#{{$episode->slug}}"><span class="circle-number">{{$loop->iteration}}</span> {{$episode->name}} <i class="fa fa-chevron-down"></i></a></div>
                                <div class="ms-auto p-2 bd-highlight">{{$episode->time}} دقیقه</div>
                                <div class="bd-highlight btn-video"><small><a href="{{route('episodes.show',[$episode->course,$episode->slug])}}" target="_blank"><i class="fa fa-eye"></i> مشاهده و دانلود</a></small></div>
                            </div>
                        </div>
                        <div id="{{$episode->slug}}" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                {{$episode->description}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <hr>
                <p class="text-center h5 mb-4">میخوای این دوره رو به دوستاتم بفرستی؟</p>
                @include('_partials.landing.social_share')
                <hr>
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
                    <p class="h6"><i class="fa fa-calendar text-purple"></i> تعداد قسمت: {{count($course->episodes)}} جلسه</p>
                    <p class="h6"><i class="fa fa-clock-o text-purple"></i> مدت زمان حدودی دوره: {{$course->time}} ساعت</p>
                    <p class="h6"><i class="fa fa-clock-o text-purple"></i> مدت زمان دوره تا این لحظه: {{$courseTime}} {{$courseTime > 60 ? 'ساعت' : 'دقیقه'}}</p>
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

            <!-- Blog Search Well -->
                <div class="well shadow rounded-4">
                    <p class="h5">برچسب ها:</p>
                    <div class="input-group">
                        @foreach($course->tags as $tag)
                            <a href="{{route('course.tag.show',$tag->slug)}}">{{$tag->name}}</a>
                        @endforeach
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Side Widget Well -->
                <div class="well shadow rounded-4">
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
