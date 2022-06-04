<x-landing-layout title="همه مقالات با دسته بندی {{$category->name}}"
                  description="در این قسمت می‌توانید تمامی مقالات با دسته بندی {{$category->name}} را مشاهده کنید"
                  keywords="دسته بندی مقالات"
                  pageUrl="{{route('category.post.show',$category->slug)}}">
<div class="container mt-5">
    <h3 class="text-center main-color h2 mb-3">تمامی مقالات با دسته بندی "{{$category->name}}"</h3>
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
                <p class="mt-5 text-danger h5">مقاله ای برای دسته بندی "{{$category->name}}" یافت نشد !</p>
                <a class="mt-2 btn btn-video" href="{{route('blog')}}">مشاهده همه مقالات</a>
            </div>
        @endforelse
    </div>
    @if(!$posts->isEmpty())
        <div class="d-flex justify-content-center mt-5">
            {!! $posts->links() !!}
        </div>
    @endif
</div>
</x-landing-layout>
