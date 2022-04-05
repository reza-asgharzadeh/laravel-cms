<x-landing-layout>

{{--  Header  --}}
<div class="container mt-5">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <h2 class="main-color display-3 mb-3">آکادمی برنامه نویسی</h2>
            <p class="text-muted h5 mb-5">پلتفرمی برای یادگیری برنامه نویسی وب</p>
            <a class="btn-color-purple" href="#">برای شروع کلیک کنید</a>
        </div>
        <div class="col-xs-12 col-md-6">
            <img class="img-fluid" src="{{asset('assets/landing/img/banner.webp')}}" alt="programmer">
        </div>
    </div>
</div>

{{--  services card  --}}
<div class="container mt-5">
    <h3 class="text-center main-color h2 mb-4">خدمات ما</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col-md-4">
            <div class="card-services">
                <div class="box">
                    <div class="content">
                        <img src="{{asset('assets/landing/img/course.png')}}" alt="...">
                        <h4>دوره‌های آموزشی</h4>
                        <p>آموزش برنامه‌نویسی برای آماده سازی شما برای ورود به بازار کار</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-services">
                <div class="box">
                    <div class="content">
                        <img src="{{asset('assets/landing/img/article.png')}}" alt="...">
                        <h4>مقالات تخصصی</h4>
                        <p>ارائه مقالات آموزشی در جهت یادگیری شما</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-services">
                <div class="box">
                    <div class="content">
                        <img src="{{asset('assets/landing/img/services.png')}}" alt="...">
                        <h4>برنامه نویسی سایت</h4>
                        <p>طراحی انواع سایت‌ها و فروشگاه‌ها برای رونق کسب‌وکار شما</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--  courses card  --}}
<div class="container mt-5">
    <h3 class="text-center main-color h2 mb-4">دوره‌های اخیر</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($courses as $course)
        <div class="col-xs-12 col-sm-6 col-lg-3">
            <div class="card h-100 custom-box-shadow">
                <a href="{{route('courses.show',$course->slug)}}"><img src="{{$course->getBanner()}}" class="card-img-top" alt="..."></a>
                <div class="card-body text-center">
                    <a class="card-title text-xl" href="{{route('courses.show',$course->slug)}}">{{$course->name}}</a>
                    <p class="card-text">{!! \Illuminate\Support\Str::limit($course->content, 60, $end='...') !!}</p>
                    <a href="{{route('courses.show',$course->slug)}}" class="btn btn-more">{{$course->getPrice()}} {{$course->price == 0 ? '' : 'تومان'}}</a>
                </div>
                <div class="card-footer text-center">
                    <div class="d-flex justify-content-between">
                        <div><p class="d-inline-block card-txt mx-1">{{$course->user->name}}</p> <img class="card-profile img-fluid" src="{{$course->user->getProfile()}}" alt="profile"></div>
                        <div><i class="fa fa-clock-o text-muted"></i> <p class="d-inline-block card-txt">{{$course->time}} ساعت</p></div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div><i class="fa fa-info text-muted"></i> <p class="d-inline-block card-txt mx-1">{{$course->getStatus()}}</p></div>
                        <div><i class="fa fa-level-up text-muted"></i> <p class="d-inline-block card-txt">{{$course->getLevel()}}</p></div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="btn all-courses m-auto mt-5 mb-5">
        <a href="course">مشاهده تمامی دوره‌ها</a>
    </div>
</div>

{{--  blogs card  --}}
<div class="container mt-5">
    <h3 class="text-center main-color h2 mb-4">مقالات اخیر</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($posts as $post)
        <div class="col-xs-12 col-sm-6 col-lg-3">
            <div class="card h-100 custom-box-shadow">
                <a href="{{route('posts.show',$post->slug)}}"><img src="{{$post->getBanner()}}" class="card-img-top" alt="..."></a>
                <div class="card-body text-center">
                    <a class="card-title text-xl" href="{{route('posts.show',$post->slug)}}">{{$post->title}}</a>
                    <p class="card-text">{!! \Illuminate\Support\Str::limit($post->content, 60, $end='...') !!}</p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <div><p class="d-inline-block card-txt mx-1">{{$post->user->name}}</p> <img class="card-profile img-fluid" src="{{$post->user->getProfile()}}" alt="profile"></div>
                        <div><i class="fa fa-clock-o text-muted"></i> <p class="d-inline-block card-txt">مطالعه در: 10 دقیقه</p></div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div><i class="fa fa-eye text-muted"></i> <p class="d-inline-block card-txt mx-1">{{$post->view_count}}</p></div>
                        <div><i class="fa fa-calendar text-muted"></i> <p class="d-inline-block card-txt">{{$post->created_at->diffForHumans()}}</p></div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="btn all-blog m-auto mt-5 mb-5">
        <a href="course">مشاهده تمامی مقالات</a>
    </div>
</div>

</x-landing-layout>
