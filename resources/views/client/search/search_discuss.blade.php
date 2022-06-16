<x-landing-layout title="جستجوی سوالات برنامه نویسی"
                  description="در این قسمت می‌توانید تمامی سوالات برنامه نویسی جستجو شده را مشاهده کنید."
                  keywords="سوالات برنامه نویسی">
<div class="container mt-4">
    @include('_partials.landing.search_filter')
    <h3 class="text-center main-color h2 mb-4">تعداد سوالات یافت شده: <span class="text-primary">{{$discussCount}}</span></h3>
    <div class="row">
        <div class="col-md-12">
            @forelse($discuss as $discussion)
                <div class="bg-light mb-3 p-3 shadow rounded-4">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="d-flex">
                                <img class="border rounded-circle mx-3" src="{{$discussion->user->getProfile()}}" width="80px" height="80px" alt="{{$discussion->user->name}}">
                                <div class="d-flex flex-column justify-content-around">
                                    <div>
                                        {{$discussion->user->name}}
                                    </div>
                                    <div>
                                        {{$discussion->created_at->diffForHumans()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a class="btn btn-secondary" href=""><i class="fa fa-x fa-reply mx-2"></i>2 پاسخ</a>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="h5 mb-3"><a href="">{{$discussion->title}}</a></h3>
                        {!! \Illuminate\Support\Str::limit($discussion->content, 300, $end='...') !!}
                    </div>
                </div>
            @empty
                <div style="width: 100%; min-height: 500px" class="text-center">
                    <p class="mt-5 text-danger h5">در حال حاضر پرسشی با جستجوی شما پیدا نشد !</p>
                </div>
            @endforelse
        </div>
    </div>
    @if($discuss)
        <div class="d-flex justify-content-center mt-5">
            {!! $discuss->appends(request()->query())->links() !!}
        </div>
    @endif
</div>
</x-landing-layout>
