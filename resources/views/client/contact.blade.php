<x-landing-layout title="تماس با ما"
                  description="جهت تماس با ما از طریق این صفحه می‌توانید با ما ارتباط برقرار کنید."
                  keywords="تماس با ما"
                  pageUrl="{{route('contact')}}">
    <div class="container mt-5 bg-light rounded-3">
        <div class="d-flex flex-column text-center">
            <h2 class="mt-3 text-success">تماس با ما</h2>
            <h5 class="text-muted">در این صفحه می‌توانید اطلاعات ارتباطی را مشاهده کنید.</h5>
        </div>
        <h3 class="text-center text-primary mt-5 mb-5">روش اول: تماس با ما در شبکه‌های اجتماعی</h3>
        <div class="d-flex justify-content-evenly text-center">
            <div>
                <h6>تماس با ما در تلگرام</h6>
                <a class="h4 mx-3" href=""><i class="fa fa-telegram telegram-color social-icon-bg"></i></a>
            </div>
            <div>
                <h6>شبکه‌های اجتماعی ما</h6>
                @include('_partials.landing.social')
            </div>
        </div>
        <h3 class="text-center text-primary mt-5 mb-5">روش دوم: تماس با ما از طریق فرم زیر</h3>
        <div class="row">
            <div class="col-md-6 offset-3 mb-5">
                <form action="{{route('contact.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="InputName" class="form-label">نام و نام خانوادگی</label>
                        <input type="text" class="form-control" name="name" id="InputName" placeholder="نام و نام خانوادگی خود را وارد کنید.">
                    </div>
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    <div class="mb-3">
                        <label for="InputEmail" class="form-label">ایمیل</label>
                        <input type="email" class="form-control" name="email" id="InputEmail" placeholder="ایمیل خود را وارد کنید.">
                    </div>
                    @error('email')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    <div class="mb-3">
                        <label for="Textarea" class="form-label">متن پیام</label>
                        <textarea class="form-control" name="content" id="Textarea" rows="3" placeholder="متن خود را بنویسید..."></textarea>
                    </div>
                    @error('content')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    <button type="submit" class="btn btn-primary">ارسال پیام</button>
                </form>
            </div>
        </div>
    </div>
</x-landing-layout>
