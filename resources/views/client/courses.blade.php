<x-landing-layout>
<div class="container mt-5">
    <h3 class="text-center main-color h2 mb-4">تمامی دوره ها</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($courses as $course)
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="card h-100 custom-box-shadow">
                    <a href="{{route('courses.show',$course->slug)}}"><img src="{{$course->getBanner()}}" class="card-img-top" alt="..." height="170"></a>
                    <div class="card-body text-center">
                        <a class="card-title text-xl" href="{{route('courses.show',$course->slug)}}">{{$course->name}}</a>
                        <p class="card-text">{!! \Illuminate\Support\Str::limit($course->content, 60, $end='...') !!}</p>
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
    <div class="d-flex justify-content-center mt-5">
        {!! $courses->links() !!}
    </div>
</div>
</x-landing-layout>