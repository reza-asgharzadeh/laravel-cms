<x-landing-layout>
    <x-slot name="links">
        <link rel="stylesheet" href="{{asset('assets/landing/css/neumorphism-auth.css')}}">
    </x-slot>
    <div class="segment">
        <div class="text-success">شما با موفقیت در سایت ثبت نام کرده اید. یک لینک تاییدیه به ایمیل شما ارسال شد. جهت ورود به سایت باید روی لینک تایید کلیک کنید.</div>
        @if (session('status') == 'verification-link-sent')
            <div class="text-danger">لینک تاییدیه جدید برای ایمیل شما ارسال شد.</div>
        @endif
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button class="main">ارسال مجدد لینک تاییدیه</button>
        </form>
    </div>
</x-landing-layout>
