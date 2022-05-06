<x-panel-layout>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>
                        <small>نوارهای اطلاع رسانی</small>
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
                                <small>لیست نوارهای اطلاع رسانی</small>
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
                                        <th>متن اطلاع رسانی</th>
                                        <th>متن دکمه اطلاع رسانی</th>
                                        <th>لینک</th>
                                        <th>تاریخ انقضا</th>
                                        <th>رنگ متن</th>
                                        <th>رنگ متن دکمه</th>
                                        <th>رنگ پس زمینه دکمه</th>
                                        <th>رنگ پس زمینه نشانگر دکمه</th>
                                        <th>رنگ پس زمینه نوار</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($alerts as $alert)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$alert->title}}</td>
                                            <td>{{$alert->btn_txt}}</td>
                                            <td>{{$alert->link}}</td>
                                            <td>{{$alert->expiry_date}}</td>
                                            <td style="direction:ltr;text-align:center;color:{{$alert->title_color}}">{{$alert->title_color}}</td>
                                            <td style="direction:ltr;text-align:center;color:{{$alert->btn_color}}">{{$alert->btn_color}}</td>
                                            <td style="direction:ltr;text-align:center;color:{{$alert->btn_bg_color}}">{{$alert->btn_bg_color}}</td>
                                            <td style="direction:ltr;text-align:center;color:{{$alert->btn_bg_hover_color}}">{{$alert->btn_bg_hover_color}}</td>
                                            <td style="direction:ltr;text-align:center;color:{{$alert->bg_color}}">{{$alert->bg_color}}</td>
                                            <td class="{{$alert->is_approved ? 'text-success' : 'text-danger'}}">{{$alert->is_approved()}}</td>
                                            <td>
                                                <div style="display: flex; justify-content: space-evenly">
                                                    <div>
                                                        @if($alert->is_approved)
                                                            <div>
                                                                <a href="{{route('alerts.status',$alert->id)}}" onclick="updateIsApproved(event, {{ $alert->id }})"><i class="fa-x fa-times" title="عدم تایید"></i></a>
                                                                <form action="{{route('alerts.status',$alert->id)}}" method="post" id="update-isApproved-{{ $alert->id }}">
                                                                    @csrf
                                                                    @method('put')
                                                                </form>
                                                            </div>
                                                        @else
                                                            <div>
                                                                <a href="{{route('alerts.status',$alert->id)}}" onclick="updateIsApproved(event, {{ $alert->id }})"><i class="fa-x fa-check" title="تایید"></i></a>
                                                                <form action="{{route('alerts.status',$alert->id)}}" method="post" id="update-isApproved-{{ $alert->id }}">
                                                                    @csrf
                                                                    @method('put')
                                                                </form>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div><a href="{{route('alerts.edit',$alert->id)}}"><i class="fa-x fa-edit text-primary" title="ویرایش"></i></a></div>
                                                    <div>
                                                        <a href="{{route('alerts.destroy',$alert->id)}}" onclick="destroyAlert(event, {{ $alert->id }})"><i class="fa-x fa-trash text-danger" title="حذف"></i></a>
                                                        <form action="{{route('alerts.destroy',$alert->id)}}" method="post" id="destroy-alert-{{ $alert->id }}">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    {!! $alerts->links() !!}
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
            function destroyAlert(event, id) {
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
                        document.getElementById(`destroy-alert-${id}`).submit()
                    }
                })
            }

            function updateIsApproved(event, id) {
                event.preventDefault();
                document.getElementById(`update-isApproved-${id}`).submit()
            }
        </script>
    </x-slot>
</x-panel-layout>
