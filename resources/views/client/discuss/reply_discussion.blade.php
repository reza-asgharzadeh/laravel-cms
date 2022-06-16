<x-landing-layout title="سوال برنامه نویسی"
                  description="در این قسمت می‌توانید مشکل برنامه نویسی خود را بیان کنید."
                  keywords="بحث  و گفتگوی برنامه نویسی، مشکلات برنامه نویسی، ایجاد پرسش برنامه نویسی"
                  pageUrl="{{route('discuss.create')}}">
    <x-slot name="links">
        <style>
            .ck-editor__editable {
                min-height: 200px;
            }
        </style>
    </x-slot>
    <div class="container mt-4">
        <h2 class="text-center main-color h2 mb-3">پرسش و پاسخ</h2>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="mb-3 text-end">
                    <a class="btn btn-primary p-2" href="{{route('discuss.index')}}"><i class="fa fa-lg fa-question-circle mx-2"></i>مشاهده همه پرسش‌ها</a>
                </div>
                <div class="bg-sky mb-3 p-3 shadow rounded-4">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="d-flex">
                                <img class="border rounded-circle mx-3" src="{{$question->user->getProfile()}}" width="80px" height="80px" alt="{{$question->user->name}}">
                                <div class="d-flex flex-column justify-content-around">
                                    <div>
                                        {{$question->user->name}}
                                    </div>
                                    <div>
                                        {{$question->created_at->diffForHumans()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a class="btn btn-sm btn-warning" href="{{route('reply.discussion',$question->slug)}}"><i class="fa fa-x fa-warning mx-2"></i>گزارش تخلف</a>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="h5 mb-3"><a href="">{{$question->title}}</a></h3>
                        {!! $question->content !!}
                    </div>
                </div>

                @forelse($question->children as $child)
                    <div class="bg-light mb-3 p-3 shadow rounded-4">
                        <div class="d-flex justify-content-between">
                            <div>
                                <div class="d-flex">
                                    <img class="border rounded-circle mx-3" src="{{$child->user->getProfile()}}" width="80px" height="80px" alt="{{$child->user->name}}">
                                    <div class="d-flex flex-column justify-content-around">
                                        <div>
                                            {{$child->user->name}}
                                        </div>
                                        <div>
                                            {{$child->created_at->diffForHumans()}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a class="btn btn-sm btn-warning mx-2" href="{{route('reply.discussion',$question->slug)}}"><i class="fa fa-x fa-warning mx-2"></i>گزارش تخلف</a>
                                <a class="btn btn-sm btn-success" href=""><i class="fa fa-x fa-check mx-2"></i>ثبت بهترین پاسخ</a>
                            </div>
                        </div>

                        <div class="mt-4">
                            {!! $child->content !!}
                        </div>
                    </div>
                @empty
                    <div class="alert alert-danger" role="alert">
                        تا کنون پاسخی برای این پرسش ثبت نشده است.
                    </div>
                @endforelse

                <form action="{{route('answer.discussion',$question->slug)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="content" class="form-label">متن پاسخ
                            <span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control" id="content" name="content" placeholder="متن مورد نظر را اینجا بنویسید...">{{old('content')}}</textarea>
                        @error('content')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">ثبت سوال</button>
                    <a href="{{route('discuss.index')}}" class="btn btn-danger">انصراف</a>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/panel/js/ckeditor.js')}}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
</x-landing-layout>
