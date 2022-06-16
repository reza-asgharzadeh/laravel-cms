<x-landing-layout title="حل مشکلات و خطاهای برنامه نویسی"
                  description="در این قسمت می‌توانید مشکلاتی که در برنامه نویسی دارید مطرح کنید و با سایر برنامه نویسان بحث و گفتگو کنید."
                  keywords="بحث  و گفتگوی برنامه نویسی، مشکلات برنامه نویسی، پاسخ سوالات برنامه نویسی"
                  pageUrl="{{route('discuss.index')}}">
    <div class="container mt-4">
        <h2 class="text-center main-color h2 mb-3">همه پرسش و پاسخ‌های برنامه نویسی</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3 text-end">
                    <a class="btn btn-primary p-2" href="{{route('discuss.create')}}"><i class="fa fa-lg fa-plus-square mx-2"></i>ثبت پرسش جدید</a>
                </div>
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
                                <a class="btn btn-secondary" href="{{route('reply.discussion',$discussion->slug)}}"><i class="fa fa-x fa-reply mx-2"></i>پاسخ</a>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h3 class="h5 mb-3"><a href="">{{$discussion->title}}</a></h3>
                            {!! \Illuminate\Support\Str::limit($discussion->content, 300, $end='...') !!}
                        </div>
                    </div>
                @empty
                    <div class="alert alert-danger" role="alert">
                        تا کنون پرسش و پاسخی در سایت مطرح نشده است.
                    </div>
                @endforelse
                <div class="d-flex justify-content-center mt-5">
                    {!! $discuss->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-landing-layout>
