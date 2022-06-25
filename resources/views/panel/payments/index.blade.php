<x-panel-layout>
    <x-slot name="links">
        <link href="{{asset('assets/panel/css/profile.css')}}" rel="stylesheet">
    </x-slot>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>
                        <small>لیست پرداخت ها</small>
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
                    <div class="mx-2"><a class="d-block border-light text-center p-1 rounded-4 {{Request::getRequestUri() == "/panel/payments" ? 'active-tab' : ''}}" href="{{route('payments.index')}}"><i class="fa fa-lg fa-money mx-3"></i>همه پرداخت‌ها</a></div>
                    <div class="mx-2"><a class="d-block border-light text-center p-1 rounded-4 {{Request::getRequestUri() == "/panel/payments?status=1" ? 'active-tab' : ''}}" href="{{route('payments.index',['status'=>true])}}"><i class="fa fa-lg fa-check mx-3"></i>پرداخت‌های موفق</a></div>
                    <div class="mx-2"><a class="d-block border-light text-center p-1 rounded-4 {{Request::getRequestUri() == "/panel/payments?status=0" ? 'active-tab' : ''}}" href="{{route('payments.index',['status'=>false])}}"><i class="fa fa-lg fa-times mx-3"></i>پرداخت‌های ناموفق</a></div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                                <small>پرداخت های سایت</small>
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
                                        <th>شناسه مرجع</th>
                                        <th>مبلغ پرداختی</th>
                                        <th>نوع پرداخت</th>
                                        <th>نام درگاه</th>
                                        <th>پرداخت جهت</th>
                                        <th>شناسه</th>
                                        <th>نام پرداخت کننده</th>
                                        <th>تاریخ ایجاد</th>
                                        <th>تاریخ پرداخت</th>
                                        <th>وضعیت</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($payments as $payment)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$payment->RefID}}</td>
                                            <td>{{$payment->total}} تومان</td>
                                            <td>{{$payment->paymentType()}}</td>
                                            <td>{{$payment->gatewayName()}}</td>
                                            <td>{{$payment->paymentable_type == 'App\Models\Order' ? 'خرید دوره'  : 'شارژ کیف پول'}}</td>
                                            <td>{{$payment->paymentable_id}}</td>
                                            <td>{{$payment->paymentable->user->name}}</td>
                                            <td>{{$payment->created_at}}</td>
                                            <td>{{$payment->updated_at}}</td>
                                            <td class="{{$payment->status == 1 ? 'text-success' : 'text-danger'}}">{{$payment->statusCode()}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    {!! $payments->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-panel-layout>
