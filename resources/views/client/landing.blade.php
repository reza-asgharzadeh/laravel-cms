<x-landing-layout title="{{env('APP_NAME')}}"
                  description="صفحه اصلی سایت {{env('APP_NAME')}}"
                  keywords="صفحه اصلی"
                  pageUrl="{{route('landing')}}">

{{--  Header  --}}
<div class="container mt-5">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <h2 class="main-color display-3 mb-3">آکادمی برنامه نویسی</h2>
            <p class="text-muted h5 mb-5">پلتفرمی برای یادگیری برنامه نویسی وب</p>
            <a class="btn-color-purple" href="{{route('courses')}}">برای شروع کلیک کنید</a>
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
                        <a class="text-dark" href="{{route('courses')}}">
                            <img src="{{asset('assets/landing/img/course.png')}}" alt="...">
                            <h4>دوره های آموزشی</h4>
                            <p>آموزش برنامه‌نویسی برای آماده سازی شما برای ورود به بازار کار</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-services">
                <div class="box">
                    <div class="content">
                        <a class="text-dark" href="{{route('blog')}}">
                            <img src="{{asset('assets/landing/img/article.png')}}" alt="...">
                            <h4>مقالات تخصصی</h4>
                            <p>ارائه مقالات آموزشی در جهت یادگیری شما</p>
                        </a>
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
        <div class="col-xs-12 col-md-6 col-xl-4">
            <div class="card h-100 custom-box-shadow beauty-radius">
                <a href="{{route('courses.show',$course->slug)}}"><img src="{{$course->getBanner()}}" class="card-img-top beauty-radius" alt="..." height="270"></a>
                <div class="card-body text-center">
                    <a class="card-title text-xl" href="{{route('courses.show',$course->slug)}}">{{$course->name}}</a>
                    <p class="card-text">{!! \Illuminate\Support\Str::limit($course->content, 80, $end='...') !!}</p>
                    <a href="{{route('courses.show',$course->slug)}}" class="btn btn-more mx-auto">مشاهده جزئیات دوره</a>
                </div>
                <div class="card-footer text-center">
                    <div class="d-flex justify-content-between">
                        <div><p class="d-inline-block card-txt mx-1">{{$course->user->name}}</p> <img class="card-profile img-fluid" src="{{$course->user->getProfile()}}" alt="profile"></div>
                        <div><i class="fa fa-clock-o text-muted"></i> <p class="d-inline-block card-txt">{{$course->episodes()->sum('time')}} {{$course->episodes()->sum('time') > 60 ? 'ساعت' : 'دقیقه'}}</p></div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div><i class="fa fa-money text-muted"></i> <p class="d-inline-block card-txt mx-1">قیمت دوره:</p></div>
                        @if($course->offer && $course->offer->type == 'percent' && $course->offer->expiry_date >= Carbon\Carbon::now() && $course->offer->is_approved == true)
                            <div><p class="text-decoration-line-through text-danger">{{$course->price}} تومان</p></div>
                            <div><p class="card-txt text-success">{{$course->getPrice() - ($course->getPrice() * $course->offer->value / 100)}} {{$course->price == 0 ? '' : 'تومان'}}</p></div>
                        @elseif($course->offer && $course->offer->type == 'fixed' && $course->offer->expiry_date >= Carbon\Carbon::now() && $course->offer->is_approved == true)
                            <div><p class="text-decoration-line-through text-danger">{{$course->price}} تومان</p></div>
                            <div><p class="card-txt text-success">{{$course->getPrice() - ($course->offer->value)}} {{$course->price == 0 ? '' : 'تومان'}}</p></div>
                        @else
                            <div><p class="card-txt">{{$course->getPrice()}} {{$course->price == 0 ? '' : 'تومان'}}</p></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="btn all-courses m-auto mt-5 mb-5">
        <a href="{{route('courses')}}">مشاهده تمامی دوره‌ها</a>
    </div>
</div>

{{--  blogs card  --}}
<div class="container mt-5">
    <h3 class="text-center main-color h2 mb-4">مقالات اخیر</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($posts as $post)
        <div class="col-xs-12 col-md-6 col-xl-4">
            <div class="card h-100 custom-box-shadow beauty-radius">
                <a href="{{route('posts.show',$post->slug)}}"><img src="{{$post->getBanner()}}" class="card-img-top beauty-radius" alt="..." height="270"></a>
                <div class="card-body text-center">
                    <a class="card-title text-xl" href="{{route('posts.show',$post->slug)}}">{{$post->title}}</a>
                    <p class="card-text">{!! \Illuminate\Support\Str::limit($post->content, 80, $end='...') !!}</p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <div><p class="d-inline-block card-txt mx-1">{{$post->user->name}}</p> <img class="card-profile img-fluid" src="{{$post->user->getProfile()}}" alt="profile"></div>
                        <div><i class="fa fa-eye text-muted"></i> <p class="d-inline-block card-txt mx-1">{{$post->view_count}} بازدید</p></div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div><i class="fa fa-clock-o text-muted"></i> <p class="d-inline-block card-txt">زمان مطالعه: {{round(App\Http\phpCountWordPersian::string(htmlspecialchars(trim(strip_tags($post->content)))) / 215)}} دقیقه</p></div>
                        <div><i class="fa fa-calendar text-muted"></i> <p class="d-inline-block card-txt">{{$post->created_at->diffForHumans()}}</p></div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="btn all-blog m-auto mt-5 mb-5">
        <a href="{{route('blog')}}">مشاهده تمامی مقالات</a>
    </div>
</div>

</x-landing-layout>
