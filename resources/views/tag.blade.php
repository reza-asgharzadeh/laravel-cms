<x-landing-layout>
    <div class="container mb-5">
        <p class="text-center h5 text-primary mb-3">برچسب های یافت شده:</p>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @if(isset($posts))
                @forelse($posts as $post)
                <div class="col-xs-12 col-sm-6 col-lg-3">
                    <div class="card h-100 custom-box-shadow">
                            <img src="{{$post->getBanner()}}" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{$post->title}}</h5>
                                <p class="card-text">{!! \Illuminate\Support\Str::limit($post->content, 150, $end='...') !!}</p>
                                <a href="{{route('posts.show',$post->slug)}}" class="btn btn-more">ادامه مطلب</a>
                            </div>
                            <div class="card-footer text-center">
                                <small class="text-success">{{$post->created_at}}</small>
                            </div>
                    </div>
                </div>
                @empty
                    <p class="m-auto mt-5 text-center text-danger">مقاله ای برای این برچسب یافت نشد !</p>
                @endforelse
            @else
                @forelse($courses as $course)
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
                @empty
                    <p class="m-auto mt-5 text-center text-danger">دوره ای برای این برچسب یافت نشد !</p>
                @endforelse
            @endif
        </div>
    </div>
</x-landing-layout>
