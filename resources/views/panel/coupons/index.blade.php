<x-panel-layout>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>
                        <small>کد تخفیف ها</small>
                    </h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="جست و جو برای...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">برو!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                                <small>لیست کد تخفیف ها</small>
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">تنظیمات 1</a>
                                        </li>
                                        <li><a href="#">تنظیمات 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>کد تخفیف</th>
                                        <th>نوع (درصد/مقدار)</th>
                                        <th>ارزش</th>
                                        <th>تاریخ انقضا</th>
                                        <th>تاریخ ایجاد</th>
                                        <th>تاریخ آپدیت</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($coupons as $coupon)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$coupon->code}}</td>
                                            <td>{{$coupon->type}}</td>
                                            <td>{{$coupon->value}}</td>
                                            <td>{{$coupon->expiry_date}}</td>
                                            <td>{{$coupon->created_at}}</td>
                                            <td>{{$coupon->updated_at}}</td>
                                            <td>
                                                <a href="{{route('coupons.edit',$coupon->id)}}"><i class="fa-x fa-edit text-primary" title="ویرایش"></i></a>
                                                <a href="{{route('coupons.destroy',$coupon->id)}}" onclick="destroyCoupon(event, {{ $coupon->id }})"><i class="fa-x fa-trash text-danger" title="حذف"></i></a>
                                                <form action="{{route('coupons.destroy',$coupon->id)}}" method="post" id="destroy-coupon-{{ $coupon->id }}">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    {!! $coupons->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <x-slot name="scripts">
        <script src="{{asset('assets/panel/js/sweetalert2.all.min.js')}}"></script>
        <script>
            function destroyCoupon(event, id) {
                event.preventDefault();
                Swal.fire({
                    title: 'آیا از حذف اطمینان دارید؟',
                    text: "اطلاعات بعد از حذف قابل بازیابی نیست !",
                    icon: 'warning',
                    showCancelButton: true,
                    reverseButtons: true,
                    cancelButtonColor: '#EFEFEF',
                    confirmButtonColor: '#D9534F',
                    confirmButtonText: 'حذف',
                    cancelButtonText: 'لغو',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`destroy-coupon-${id}`).submit()
                    }
                })
            }
        </script>
    </x-slot>
</x-panel-layout>
