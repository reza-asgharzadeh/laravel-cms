<x-landing-layout>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">ردیف</th>
        <th scope="col">دوره ها</th>
        <th scope="col">کد تخفیف</th>
        <th scope="col">مبلغ کل</th>
        <th scope="col">عملیات</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>
                <ul>
                    @foreach($order->courses as $course)
                        <li><img src="{{$course->getBanner()}}" alt="banner" width="50" height="50"> {{$course->name}}</li>
                    @endforeach
                </ul>
            </td>
            <td>کد تخفیف دارید؟</td>
            <td>{{$order->total}}</td>
            <td>
                <div class="d-flex">
                    <div>
                        <form action="{{route('payment',$order->id)}}" method="post">
                            @csrf
                            <button class="btn btn-success"><i class="fa fa-shopping-bag"></i> پرداخت</button>
                        </form>
                    </div>
                    <div class="mx-2">
                        <form action="{{route('payment',$order->id)}}" method="post">
                            @csrf
                            <button class="btn btn-danger"><i class="fa fa-trash"></i> حذف</button>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<x-slot name="scripts">
    <script type="text/javascript">

        $(".update-cart").change(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function (response) {
                    ele.parents("tr").find("[data-th=Subtotal]").text('تومان' + response.price);
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
                    // ele.parents("tr").find("[data-th=Total]").innerHTML = response.totals;
                    document.getElementById("total").innerHTML = '<h3><strong>قیمت کل: ' + response.totals + ' تومان</strong></h3>'
                    // document.getElementById("badge-total").innerHTML = response.totals;
                    document.getElementById("basket-total").innerHTML = '<p id="basket-total">مبلغ کل: <span class="text-info">تومان' + response.totals + '</span></p>'
                    document.getElementById("alert").innerHTML = '<p id="alert" class="alert alert-success">' + response.successs + '</p>';
                    console.log(response.successs);
                }
            });
        });

    </script>
</x-slot>
</x-landing-layout>
