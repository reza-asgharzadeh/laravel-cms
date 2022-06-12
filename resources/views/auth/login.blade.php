<x-landing-layout>
    <x-slot name="links">
        <link rel="stylesheet" href="{{asset('assets/landing/css/neumorphism-auth.css')}}">
    </x-slot>
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-4">
                <div class="mt-3 mb-3">
                    <img src="{{env('APP_URL') . env('LOGO_PATH')}}" alt="">
                </div>
                <form class="p-3" action="{{route('login.store')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input class="form-control" name="email" type="text" placeholder="ایمیل">
                    </div>
                    @error('email')
                    <p class="text-start text-danger mt-2">{{$message}}</p>
                    @enderror
                    <div class="input-group mb-3">
                        <input id="password" class="form-control" name="password" type="password" placeholder="رمز عبور">
                        <span class="span-show-password btn">
                            <i class="i-show-password fa fa-lg fa-eye"></i>
                        </span>
                    </div>
                    @error('password')
                    <p class="text-start text-danger mt-2">{{$message}}</p>
                    @enderror
                    <div class="mb-3">
                        <input class="form-check-input" type="checkbox" name="remember"> <span class="remember-color mx-1">مرا بخاطر بسپار</span>
                    </div>
                    <div class="text-center d-inline-block mb-3">
                        <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}"></div>
                    </div>
                    @if(Session::has('g-recaptcha-response'))
                        <p class="text-danger">{{Session::get('g-recaptcha-response')}}</p>
                    @endif
                    <a class="btn btn-danger google-btn mb-3" href="{{route('auth.google')}}"><i class="fa fa-google-plus mx-2"></i>ورود با اکانت گوگل</a>
                    <button class="main">ورود</button>
                </form>
                <a class="d-block mb-3" href="{{route('password.request')}}">رمز عبور خود را فراموش کرده‌اید؟ بازیابی</a>
                <a class="d-block" href="{{route('register')}}">عضو سایت نیستید؟ عضویت</a>
            </div>
        </div>
    </div>
    <x-slot name="scripts">
        <script src="https://www.google.com/recaptcha/api.js?hl=fa" async defer></script>
        <script>
            $(".span-show-password").on('click', function () {
                var passwordInput = document.getElementById('password');
                var i = $(".i-show-password");

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    i.removeClass("fa-eye");
                    i.addClass("fa-eye-slash");
                } else {
                    passwordInput.type = 'password';
                    i.removeClass("fa-eye-slash");
                    i.addClass("fa-eye");
                }
            });
        </script>
    </x-slot>
</x-landing-layout>
