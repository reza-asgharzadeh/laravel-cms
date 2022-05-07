<x-landing-layout>
<div class="container mt-5">
    <h3 class="text-center main-color h2 mb-4">تمامی مقالات</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($posts as $post)
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="card h-100 custom-box-shadow">
                    <a href="{{route('posts.show',$post->slug)}}"><img src="{{$post->getBanner()}}" class="card-img-top" alt="..." height="170"></a>
                    <div class="card-body text-center">
                        <a class="card-title text-xl" href="{{route('posts.show',$post->slug)}}">{{$post->title}}</a>
                        <p class="card-text">{!! \Illuminate\Support\Str::limit($post->content, 60, $end='...') !!}</p>
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
    <div class="d-flex justify-content-center mt-5">
        {!! $posts->links() !!}
    </div>
</div>
</x-landing-layout>
