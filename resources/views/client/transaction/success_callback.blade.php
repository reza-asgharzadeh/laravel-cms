<x-landing-layout title="تماس با ما"
                  description="جهت تماس با ما از طریق این صفحه می‌توانید با ما ارتباط برقرار کنید."
                  keywords="تماس با ما"
                  pageUrl="{{route('contact')}}">
    <div class="container mt-5 bg-light rounded-3 h-400">
        <div class="d-flex flex-column text-center mb-3">
            <h2 class="mt-3 text-success">پرداخت شما با موفقیت انجام شد.</h2>
            <h5 class="text-muted mt-2">اکنون در پنل خود، لیست دوره‌های ثبت نام شده را در قسمت "دوره‌های من" مشاهده کنید.</h5>
        </div>
        <div class="d-flex justify-content-evenly text-center">
            <div>
                <h4>مبلغ پرداختی:</h4>
                <h3>{{$record->total}} تومان</h3>
            </div>
        </div>
    </div>
</x-landing-layout>
