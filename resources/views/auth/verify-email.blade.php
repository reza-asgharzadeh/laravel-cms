<x-landing-layout>
    <x-slot name="links">
        <link rel="stylesheet" href="{{asset('assets/landing/css/neumorphism-auth.css')}}">
    </x-slot>
    <div class="container text-center h-400">
        <div class="row justify-content-center">
            <div class="mt-3 mb-3">
                <img src="{{env('APP_URL') . env('LOGO_PATH')}}" alt="">
            </div>
            <div class="text-success mt-2 mb-5">شما با موفقیت در سایت ثبت نام کرده اید. یک لینک تاییدیه به ایمیل شما ارسال شد. جهت ورود به سایت باید روی لینک تایید کلیک کنید.</div>
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-4">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button class="main">ارسال مجدد لینک تاییدیه</button>
                </form>
            </div>
        </div>
    </div>
</x-landing-layout>
