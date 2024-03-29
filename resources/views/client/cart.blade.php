<x-landing-layout title="سبد خرید"
                  description="لیست خریدهای شما"
                  keywords="سبد خرید"
                  pageUrl="{{route('cart')}}">
    <div class="container">
        <div class="row">
            @if(session('cart'))
                <div class="col-md-8 p-3 mt-4">
                    <div class="table-responsive">
                        <table id="cart" class="table table-hover">
                            <thead class="bg-light">
                            <tr>
                                <th style="width:50%; text-align: center; font-size: 1.25rem">دوره</th>
                                <th style="width:10%; font-size: 1.25rem">قیمت</th>
                                <th style="width:10%; font-size: 1.25rem">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $total = 0 @endphp
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                    @php $total += $details['price'] @endphp
                                    <tr data-id="{{ $id }}">
                                        <td data-th="Course">
                                            <div class="row">
                                                <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
                                                <div class="col-sm-9">
                                                    <p class="h6">{{ $details['name'] }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price">{{ $details['price'] }} تومان</td>
                                        <td data-th="Quantity">
                                            <div class="d-flex">
                                                <div><button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o" title="حذف"></i></button></div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-4 bg-light p-5 mt-5">
                    <h3 class="text-center">اطلاعات پرداخت</h3>
                    <hr>
                    <div data-id="coupon">
                        <p class="h5">کد تخفیف:</p>
                        <input class="w-75 coupon-input" type="text" placeholder="اگر کد تخفیف دارید اینجا وارد کنید">
                        <button class="btn-sm btn-primary update-cart">اعمال کد</button>
                        <p id="coupon">{{ session()->get("coupon") ?? '' }}</p>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div><p class="h5">جمع کل:</p></div>
                        <div><span id="total" class="h5">{{ $total }}</span><span class="h5"> تومان</span></div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div><p class="h5 text-danger">موجودی کیف پول شما:</p></div>
                        <div><span id="wallet-value" class="h5 text-danger">{{ session()->get("newWalletValue") ?? auth()->user()->wallet->value }}</span><span class="h5 text-danger"> تومان</span></div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div><p class="h5 text-danger">تخفیف:</p></div>
                        <div><span id="discount" class="h5 text-danger">{{ session()->get("discount") ?? 0 }}</span><span class="h5 text-danger"> تومان</span></div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div><p class="h5">مبلغ قابل پرداخت:</p></div>
                        <div><span id="payable" class="h5">{{ session()->get("payable") ?? $total}}</span><span class="h5"> تومان</span></div>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('courses') }}" class="btn btn-sm btn-primary"><i class="fa fa-angle-left"></i> افزودن دوره جدید</a>
                        @if(auth()->user()->wallet->value > 0)
                            <button id="update-wallet" class="btn btn-sm btn-warning">اعمال کیف</button>
                        @endif
                        <form action="{{route('new.order')}}" method="post">
                            @csrf
                            <button class="btn btn-sm btn-success">پرداخت سفارش</button>
                        </form>
                    </div>
                </div>
            @else
                <div style="width: 100%; min-height: 500px" class="text-center">
                    <h3 class="mt-5 text-danger h2">سبد خرید شما خالی است !</h3>
                    <a class="mt-2 btn btn-video" href="{{route('courses')}}">مشاهده دوره ها</a>
                </div>
            @endif
        </div>
    </div>
<x-slot name="scripts">
    <script src="{{asset('assets/landing/js/sweetalert2.all.min.js')}}"></script>
    <script type="text/javascript">
        $("#update-wallet").on('click', function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('update.wallet') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: {{auth()->user()->wallet->id}}
                },
                success: function (response) {
                    $("#payable").html(response.payable);
                    $("#wallet-value").html(response.newWalletValue);
                }
            });
        });


        $(".update-cart").on('click', function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("div").attr("data-id"),
                    coupon_code: ele.parents("div").find(".coupon-input").val()
                },
                success: function (response) {
                    $("#coupon").html(response.coupon);
                    $("#discount").html(response.discount);
                    $("#payable").html(response.payable);
                    if (response.newWalletValue){
                        $("#wallet-value").html(response.newWalletValue);
                    }
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    ele.parents("tr").remove();
                    $('#' + response.idCart).remove();
                    $("#total").html(response.total);
                    $("#count-basket").html(response.count);
                    $("#badge-total").html(response.count);
                    $("#basket-total").html(response.total);
                    $("#coupon").html(response.coupon);
                    $("#discount").html(response.discount);
                    $("#payable").html(response.payable);
                    $("#wallet-value").html(response.wallet);
                    Swal.fire({
                        title: "دوره با موفقیت از سبد خرید پاک شد.",
                        icon: "success",
                        button: "باشه",
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            });
        });

    </script>
</x-slot>
</x-landing-layout>
