<a href="#" class="top"><i class="fa fa-3x fa-chevron-circle-up"></i></a>
<footer class="shadow-lg">
    <div class="container">
        <div class="d-flex justify-content-between">
            <img  class="mt-3" src="{{env('APP_URL') . env('LOGO_PATH')}}" alt="logo">
            <span class="mt-3">
                @include('_partials.landing.social')
            </span>
        </div>
        <div class="row">
            <div class="col-md-4 mt-5">
                <div class="d-flex flex-column">
                    <h4 class="text-center">هدف ما</h4>
                    <p class="text-justify">یکی از پرتلاش‌ترین و بروزترین وبسایت های آموزشی در سطح ایران است که همیشه تلاش کرده تا بتواند جدیدترین و بروزترین مقالات و دوره‌های آموزشی را در اختیار علاقه‌مندان ایرانی قرار دهد. تبدیل کردن برنامه نویسان ایرانی به بهترین برنامه نویسان جهان هدف ماست.</p>
                    <div class="d-flex">
                        <input id="input-newsletter" type="email" class="form-control form-control-sm" placeholder="برای اطلاع از جدیدترین دوره‌ها و مقالات ایمیل خود را وارد کنید...">
                        <input id="btn-newsletter" type="submit" class="btn btn-sm btn-primary" value="ثبت ایمیل">
                    </div>
                    <span id="message"></span>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="d-flex flex-column align-items-center">
                    <h4>بخش‌های سایت</h4>
                    <ul>
                        <li><a class="footer-color" href="{{route('about')}}">درباره ما</a></li>
                        <li><a class="footer-color" href="{{route('contact')}}">تماس با ما</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="d-flex flex-column">
                    <h4 class="text-center">ارتباط با ما</h4>
                    <ul class="list-group">
                        <li class="d-flex justify-content-between align-items-center mt-2 mb-2">
                            <span><i class="fa fa-lg fa-envelope text-muted mx-2"></i>ایمیل:</span>
                            <span>info@podera.com</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center mt-2 mb-2">
                            <span><i class="fa fa-lg fa-telegram text-muted mx-2"></i>آی‌دی تلگرام:</span>
                            <span>podera@</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center mt-2 mb-2">
                            <span><i class="fa fa-lg fa-phone text-muted mx-2"></i>شماره تماس:</span>
                            <span>09141234567</span>
                        </li>
                    </ul>
                    <span class="mt-2">
                        <script src="https://www.zarinpal.com/webservice/TrustCode" type="text/javascript"></script>
                        <img src="{{asset('assets/landing/img/samandehi.png')}}" alt="samandehi">
                    </span>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <span class="mb-3 mt-3">2022 &copy کلیه حقوق مادی و معنوی این وب‌سایت متعلق به رضا اصغرزاده می باشد.</span>
        </div>
    </div>
</footer>
