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
                <form class="p-3" action="{{route('register.store')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input class="form-control" name="name" type="text" placeholder="نام و نام خانوادگی (فارسی)" value="{{old('name')}}">
                    </div>
                    @error('name')
                    <p class="text-start text-danger mt-2">{{$message}}</p>
                    @enderror
                    <div class="input-group mb-3">
                        <input class="form-control" name="email" type="text" placeholder="ایمیل" value="{{old('email')}}">
                    </div>
                    @error('email')
                    <p class="text-start text-danger mt-2">{{$message}}</p>
                    @enderror
                    <div class="input-group mb-3">
                        <input class="form-control" name="mobile" type="text" placeholder="شماره موبایل" value="{{old('mobile')}}">
                    </div>
                    @error('mobile')
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
                    <div class="input-group mb-3">
                        <input id="password_confirmation" class="form-control" name="password_confirmation" type="password" placeholder="تکرار رمز عبور">
                        <span class="span-show-password-confirmation btn">
                            <i class="i-show-password-confirmation fa fa-lg fa-eye"></i>
                        </span>
                    </div>
                    <div class="text-center d-inline-block mb-3">
                        <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}"></div>
                    </div>
                    @if(Session::has('g-recaptcha-response'))
                        <p class="text-danger">{{Session::get('g-recaptcha-response')}}</p>
                    @endif
                    <a class="btn btn-danger google-btn mb-3" href="{{route('auth.google')}}"><i class="fa fa-google-plus mx-2"></i>ورود با اکانت گوگل</a>
                    <button class="main">ثبت نام</button>
                </form>
                <a href="{{route('login')}}">قبلا ثبت نام کرده اید؟ ورود</a>
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

            $(".span-show-password-confirmation").on('click', function () {
                var passwordConfirmationInput = document.getElementById('password_confirmation');
                var i = $(".i-show-password-confirmation");

                if (passwordConfirmationInput.type === 'password') {
                    passwordConfirmationInput.type = 'text';
                    i.removeClass("fa-eye")
                    i.addClass("fa-eye-slash");
                } else {
                    passwordConfirmationInput.type = 'password';
                    i.removeClass("fa-eye-slash")
                    i.addClass("fa-eye");
                }
            });
        </script>
    </x-slot>
</x-landing-layout>
