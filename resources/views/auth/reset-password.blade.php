<x-landing-layout>
    <x-slot name="links">
        <link rel="stylesheet" href="{{asset('assets/landing/css/neumorphism-auth.css')}}">
    </x-slot>
    <div class="container text-center h-400">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-4">
                <div class="mt-3 mb-3">
                    <img src="{{env('APP_URL') . env('LOGO_PATH')}}" alt="">
                </div>
                <form action="{{route('password.update')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input name="token" type="hidden" value="{{$request->route('token')}}">
                    </div>
                    <div class="input-group mb-3">
                        <input name="email" type="hidden" value="{{$request->email}}">
                    </div>
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
                    <button class="main">تغییر رمز عبور</button>
                </form>
            </div>
        </div>
    </div>
    <x-slot name="scripts">
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
