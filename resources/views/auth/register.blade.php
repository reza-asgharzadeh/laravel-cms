<x-landing-layout>
    <x-slot name="links">
        <link rel="stylesheet" href="{{asset('assets/landing/css/neumorphism-auth.css')}}">
    </x-slot>
    <div class="segment">
        <form action="{{route('register.store')}}" method="post">
            @csrf
            <div class="segment">
                <img src="{{asset('assets/landing/img/logo.png')}}" alt="">
            </div>

            <label>
                <input name="name" type="text" placeholder="نام و نام خانوادگی" value="{{old('name')}}">
                @error('name')
                <p class="text-danger mt-2">{{$message}}</p>
                @enderror
            </label>
            <label>
                <input name="email" type="text" placeholder="ایمیل" value="{{old('email')}}">
                @error('email')
                <p class="text-danger mt-2">{{$message}}</p>
                @enderror
            </label>
            <label>
                <input name="mobile" type="text" placeholder="شماره موبایل" value="{{old('mobile')}}">
                @error('mobile')
                <p class="text-danger mt-2">{{$message}}</p>
                @enderror
            </label>
            <label>
                <input name="password" type="password" placeholder="رمز عبور">
                @error('password')
                <p class="text-danger mt-2">{{$message}}</p>
                @enderror
            </label>
            <label>
                <input name="password_confirmation" type="password" placeholder="تکرار رمز عبور">
            </label>
            <button class="main">ثبت نام</button>
        </form>
        <a href="{{route('login')}}">قبلا ثبت نام کرده اید؟ ورود</a><br><br>
    </div>
</x-landing-layout>
