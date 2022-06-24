<x-landing-layout title="تماس با ما"
                  description="جهت تماس با ما از طریق این صفحه می‌توانید با ما ارتباط برقرار کنید."
                  keywords="تماس با ما"
                  pageUrl="{{route('contact')}}">
    <div class="container mt-5 bg-light rounded-3 h-400">
        <div class="d-flex flex-column text-center mb-3">
            <h2 class="mt-3 text-danger">خطا در عملیات پرداخت</h2>
            <h5 class="text-muted mt-2">لطفا خطای زیر را از طریق تماس با ما گزارش کنید.</h5>
        </div>
        <div class="d-flex justify-content-evenly text-center">
            <div>
                <h4>پیام خطا:</h4>
                <span>{{$exception->getMessage()}}</span>
            </div>
        </div>
    </div>
</x-landing-layout>
