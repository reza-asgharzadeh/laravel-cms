<x-landing-layout>
    <x-slot name="links">
        <link rel="stylesheet" href="{{asset('assets/landing/css/neumorphism-auth.css')}}">
    </x-slot>
    <div class="segment">
        <form action="{{route('password.update')}}" method="post">
            @csrf
            <div class="segment">
                <img src="{{asset('assets/landing/img/logo.png')}}" alt="">
            </div>
            <label>
                <input name="token" type="hidden" value="{{$request->route('token')}}">
            </label>
            <label>
                <input name="email" type="hidden" value="{{$request->email}}">
            </label>
            <label>
                <input name="password" type="password" placeholder="رمز عبور جدید">
                @error('password')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </label>
            <label>
                <input name="password_confirmation" type="password" placeholder="تکرار رمز عبور جدید">
            </label>
            <button class="purple">تغییر رمز عبور</button>
        </form>
    </div>
</x-landing-layout>
