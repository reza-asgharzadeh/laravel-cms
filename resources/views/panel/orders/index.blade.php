<x-panel-layout>
    <x-slot name="links">
        <link href="{{asset('assets/panel/css/profile.css')}}" rel="stylesheet">
    </x-slot>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>
                        <small>لیست سفارشات من</small>
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
            <div class="row">
                <div class="clearfix"></div>
                <div class="d-flex mx-3 mb-2">
                    <div class="mx-2"><a class="d-block border-light text-center p-1 rounded-4 {{Request::getRequestUri() == "/panel/orders" ? 'active-tab' : ''}}" href="{{route('orders.index')}}"><i class="fa fa-lg fa-shopping-basket mx-3"></i>همه سفارشات</a></div>
                    <div class="mx-2"><a class="d-block border-light text-center p-1 rounded-4 {{Request::getRequestUri() == "/panel/orders?order_status=1" ? 'active-tab' : ''}}" href="{{route('orders.index',['order_status'=>1])}}"><i class="fa fa-lg fa-check mx-3"></i>سفارشات پرداخت شده</a></div>
                    <div class="mx-2"><a class="d-block border-light text-center p-1 rounded-4 {{Request::getRequestUri() == "/panel/orders?order_status=0" ? 'active-tab' : ''}}" href="{{route('orders.index',['order_status'=>0])}}"><i class="fa fa-lg fa-times mx-3"></i>سفارشات پرداخت نشده</a></div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                                <small>سفارشات من</small>
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
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>دوره های این سفارش</th>
                                        <th>کد سفارش</th>
                                        <th>مبلغ سفارش</th>
                                        <th>تاریخ ایجاد سفارش</th>
                                        <th>تاریخ پرداخت سفارش</th>
                                        <th>وضعیت سفارش</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                            <tr>
                                                <th style="vertical-align: middle" scope="row">{{$loop->iteration}}</th>
                                                <td>
                                                    @foreach($order->courses as $course)
                                                        <div style="margin-top: 1rem;text-align: right"><img src="{{$course->getBanner()}}" alt="" width="52" height="52"> <span style="margin-right: 1rem">{{$course->name}}</span></div>
                                                    @endforeach
                                                </td>
                                                <td style="vertical-align: middle">{{$order->order_code}}</td>
                                                <td style="vertical-align: middle">{{$order->amount}} تومان</td>
                                                <td style="vertical-align: middle">{{$order->created_at}}</td>
                                                <td style="vertical-align: middle">{{$order->updated_at}}</td>
                                                <td style="vertical-align: middle" class="{{$order->order_status ? 'text-success' : 'text-danger'}}"><i class="fa fa-lg {{$order->order_status ? 'fa-check' : 'fa-times'}}"></i> {{$order->getOrderStatus()}}</td>
                                            </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    {!! $orders->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-panel-layout>
