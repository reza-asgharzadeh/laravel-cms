<x-panel-layout>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>
                        <small>لیست دوره های من</small>
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
                            <small>دوره های ثبت نام شده</small>
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
                                    <th>نام دوره</th>
                                    <th>مدرس</th>
                                    <th>بنر دوره</th>
                                    <th>پیش نیاز</th>
                                    <th>مدت زمان</th>
                                    <th>وضعیت</th>
                                    <th>سطح</th>
                                    <th>تاریخ شروع</th>
                                    <th>تاریخ آخرین آپدیت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        @foreach($order->courses as $course)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$course->name}}</td>
                                                <td>{{$course->user->name}}</td>
                                                <td><img src="{{$course->getBanner()}}" alt="" height="52"></td>
                                                <td>{{$course->pre_course}}</td>
                                                <td>{{$course->time}}</td>
                                                <td>{{$course->getStatus()}}</td>
                                                <td>{{$course->getLevel()}}</td>
                                                <td>{{$course->created_at}}</td>
                                                <td>{{$course->updated_at}}</td>
                                                <td>
                                                    <div><a href="{{route('courses.show',$course->slug)}}" target="_blank"><i class="fa-x fa-eye text-primary" title="نمایش"></i></a></div>
                                                </td>
                                            </tr>
                                        @endforeach
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
</x-panel-layout>
