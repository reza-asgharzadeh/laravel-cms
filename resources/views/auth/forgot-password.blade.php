<x-landing-layout>
    <x-slot name="links">
        <link rel="stylesheet" href="{{asset('assets/landing/css/neumorphism-auth.css')}}">
    </x-slot>
    <div class="segment">
        <form action="{{route('password.email')}}" method="post">
            @csrf
            <div class="segment">
                <img src="{{asset('assets/landing/img/logo.png')}}" alt="">
            </div>

            <label>
                <input name="email" type="text" placeholder="ایمیل">
                @error('email')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </label>
            <button class="purple">بازیابی رمز عبور</button>
        </form>
    </div>
</x-landing-layout>
