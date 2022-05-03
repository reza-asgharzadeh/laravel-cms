<x-panel-layout>
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
            <div class="clearfix"></div>

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
                                    <th style="text-align: center">ردیف</th>
                                    <th>شناسه سفارش</th>
                                    <th style="text-align: center">آتوریتی</th>
                                    <th style="text-align: center">شناسه مرجع</th>
                                    <th style="text-align: center">نوع پرداخت</th>
                                    <th style="text-align: center">نام درگاه</th>
                                    <th style="text-align: center">وضعیت پرداخت</th>
                                    <th style="text-align: center">تاریخ ایجاد</th>
                                    <th style="text-align: center">تاریخ آپدیت</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($payments as $payment)
                                    <tr>
                                        <th style="text-align: center;vertical-align: middle" scope="row">{{$loop->iteration}}</th>
                                        <td>{{$payment->order_id}}</td>
                                        <td>{{$payment->authority}}</td>
                                        <td style="text-align: center;vertical-align: middle">{{$payment->RefID}}</td>
                                        <td style="text-align: center;vertical-align: middle">{{$payment->payment_type}}</td>
                                        <td style="text-align: center;vertical-align: middle">{{$payment->gateway_name}}</td>
                                        <td style="text-align: center;vertical-align: middle" class="{{$payment->status_code == 100 ? 'text-success' : 'text-danger'}}">{{$payment->statusCode()}}</td>
                                        <td style="text-align: center;vertical-align: middle">{{$payment->created_at}}</td>
                                        <td style="text-align: center;vertical-align: middle">{{$payment->updated_at}}</td>
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
</x-panel-layout>
