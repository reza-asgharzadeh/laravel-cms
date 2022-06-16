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
        <h2 class="text-center main-color h2 mb-3">ایجاد پرسش برنامه نویسی جدید</h2>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="mb-3 text-end">
                    <a class="btn btn-primary p-2" href="{{route('discuss.index')}}"><i class="fa fa-lg fa-question-circle mx-2"></i>مشاهده همه پرسش‌ها</a>
                </div>
                <form action="{{route('discuss.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">عنوان سوال
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="عنوان را اینجا وارد کنید." value="{{old('title')}}">
                        @error('title')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">متن سوال
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
