<x-landing-layout>
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

<div class="container mt-5">
    <h3 class="text-center main-color mb-4">خدمات ما</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col-sm-4">
            <div class="card h-100 custom-box-services">
                <img src="{{asset('assets/landing/img/course.png')}}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title card-title-color">دوره‌های آموزشی</h5>
                    <p class="card-text text-muted">آموزش برنامه‌نویسی برای آماده سازی شما برای ورود به بازار کار</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card h-100 custom-box-services">
                <img src="{{asset('assets/landing/img/article.png')}}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title card-title-color">مقالات تخصصی</h5>
                    <p class="card-text text-muted">ارائه مقالات آموزشی در جهت یادگیری شما</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card h-100 custom-box-services">
                <img src="{{asset('assets/landing/img/services.png')}}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title card-title-color">برنامه نویسی و طراحی سایت</h5>
                    <p class="card-text text-muted">طراحی انواع سایت‌ها و فروشگاه‌ها برای رونق کسب‌وکار شما</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <h3 class="text-center main-color mb-4">دوره‌های اخیر</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($courses as $course)
        <div class="col-xs-12 col-sm-6 col-lg-3">
            <div class="card h-100 custom-box-shadow">
                <img src="{{$course->getBanner()}}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">{{$course->name}}</h5>
                    <p class="card-text">{!! \Illuminate\Support\Str::limit($course->content, 150, $end='...') !!}</p>
                    <a href="{{route('courses.show',$course->slug)}}" class="btn btn-more">{{$course->getPrice()}} {{$course->price == 0 ? '' : 'تومان'}}</a>
                </div>
                <div class="card-footer text-center">
                    <small class="text-success">مدرس دوره: {{$course->user->name}}</small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="btn all-courses m-auto mt-5 mb-5">
        <a href="course">مشاهده تمامی دوره‌ها</a>
    </div>
</div>


<div class="container mt-5">
    <h3 class="text-center main-color mb-4">مقالات اخیر</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($posts as $post)
        <div class="col-xs-12 col-sm-6 col-lg-3">
            <div class="card h-100 custom-box-shadow">
                <img src="{{$post->getBanner()}}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{!! \Illuminate\Support\Str::limit($post->content, 150, $end='...') !!}</p>
                    <a href="{{route('posts.show',$post->slug)}}" class="btn btn-more">ادامه مطلب</a>
                </div>
                <div class="card-footer text-center">
                    <small class="text-success">{{$post->created_at->diffForHumans()}}</small>
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
