<x-landing-layout title="جستجوی مقالات"
                  description="در این قسمت می‌توانید تمامی مقالات جستجو شده را مشاهده کنید."
                  keywords="مقالات">
<div class="container mt-3">
    @include('_partials.landing.search_filter')
    <h3 class="text-center main-color h2 mb-4">تعداد مقالات یافت شده: <span class="text-primary">{{$postsCount}}</span></h3>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($posts as $post)
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
        @empty
            <div style="width: 100%; min-height: 500px" class="text-center">
                <p class="mt-5 text-danger h5">در حال حاضر مقاله‌ای با جستجوی شما پیدا نشد !</p>
            </div>
        @endforelse
    </div>
    @if($posts)
        <div class="d-flex justify-content-center mt-5">
            {!! $posts->appends(request()->query())->links() !!}
        </div>
    @endif
</div>
</x-landing-layout>
