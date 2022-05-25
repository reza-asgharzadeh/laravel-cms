<x-panel-layout>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>
                        <small>خبرنامه</small>
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
                                <small>لیست اعضای خبرنامه</small>
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
                                        <th>ایمیل</th>
                                        <th>تاریخ ایجاد</th>
                                        <th>تاریخ آپدیت وضعیت</th>
                                        <th>وضعیت خبرنامه</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($newsletters as $newsletter)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$newsletter->email}}</td>
                                            <td>{{$newsletter->getCreatedAtInJalali()}}</td>
                                            <td>{{$newsletter->getUpdatedAtInJalali()}}</td>
                                            <td class="{{$newsletter->status ? 'text-success' : 'text-danger'}}">{{$newsletter->status()}}</td>
                                            <td>
                                                <div style="display: flex; justify-content: space-evenly">
                                                    <div>
                                                        @if($newsletter->status)
                                                            <div>
                                                                <a href="{{route('newsletters.status',$newsletter->id)}}" onclick="updateIsApproved(event, {{ $newsletter->id }})"><i class="fa-x fa-times" title="عدم تایید"></i></a>
                                                                <form action="{{route('newsletters.status',$newsletter->id)}}" method="post" id="update-isApproved-{{ $newsletter->id }}">
                                                                    @csrf
                                                                    @method('put')
                                                                </form>
                                                            </div>
                                                        @else
                                                            <div>
                                                                <a href="{{route('newsletters.status',$newsletter->id)}}" onclick="updateIsApproved(event, {{ $newsletter->id }})"><i class="fa-x fa-check" title="تایید"></i></a>
                                                                <form action="{{route('newsletters.status',$newsletter->id)}}" method="post" id="update-isApproved-{{ $newsletter->id }}">
                                                                    @csrf
                                                                    @method('put')
                                                                </form>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div><a href="{{route('newsletters.edit',$newsletter->id)}}"><i class="fa-x fa-edit text-primary" title="ویرایش"></i></a></div>
                                                    <div>
                                                        <a href="{{route('newsletters.destroy',$newsletter->id)}}" onclick="destroyNewsLetter(event, {{ $newsletter->id }})"><i class="fa-x fa-trash text-danger" title="حذف"></i></a>
                                                        <form action="{{route('newsletters.destroy',$newsletter->id)}}" method="post" id="destroy-newsletter-{{ $newsletter->id }}">
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
                                    {!! $newsletters->links() !!}
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
            function destroyNewsLetter(event, id) {
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
                        document.getElementById(`destroy-newsletter-${id}`).submit()
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
