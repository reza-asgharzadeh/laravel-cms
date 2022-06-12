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
                <form action="{{route('password.email')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input class="form-control" name="email" type="text" placeholder="ایمیل">
                    </div>
                    @error('email')
                    <p class="text-start text-danger">{{$message}}</p>
                    @enderror
                    <button class="main">بازیابی رمز عبور</button>
                </form>
            </div>
        </div>
    </div>
</x-landing-layout>
