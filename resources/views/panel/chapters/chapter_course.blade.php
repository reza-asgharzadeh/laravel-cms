<x-panel-layout>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>
                        <a class="btn btn-primary" href="{{route('courses.create')}}"><i class="fa fa-plus"></i> ایجاد دوره جدید</a>
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
                            دوره‌ی فصل
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
                                    <th>نام دوره</th>
                                    <th>بنر</th>
                                    <th>قیمت</th>
                                    <th>تعداد دانشجو</th>
                                    <th>تاریخ شروع</th>
                                    <th>تاریخ بروزرسانی</th>
                                    <th>وضعیت انتشار</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{$course->name}}</td>
                                    <td class="text-center"><img src="{{$course->getBanner()}}" alt="" height="52"></td>
                                    <td>{{$course->price}}</td>
                                    <td>{{$course->student_count}}</td>
                                    <td>{{$course->getCreatedAtInJalali()}}</td>
                                    <td>{{$course->getUpdatedAtInJalali()}}</td>
                                    <td class="{{$course->is_approved ? 'text-success' : 'text-danger'}}">{{$course->is_approved()}}</td>
                                    <td>
                                        <div style="display: flex; justify-content: space-evenly">
                                            <div>
                                                @if($course->is_approved)
                                                    <div>
                                                        <a href="{{route('courses.status',$course->id)}}" onclick="updateIsApproved(event, {{ $course->id }})"><i class="fa-x fa-times" title="عدم تایید"></i></a>
                                                        <form action="{{route('courses.status',$course->id)}}" method="post" id="update-isApproved-{{ $course->id }}">
                                                            @csrf
                                                            @method('put')
                                                        </form>
                                                    </div>
                                                @else
                                                    <div>
                                                        <a href="{{route('courses.status',$course->id)}}" onclick="updateIsApproved(event, {{ $course->id }})"><i class="fa-x fa-check" title="تایید"></i></a>
                                                        <form action="{{route('courses.status',$course->id)}}" method="post" id="update-isApproved-{{ $course->id }}">
                                                            @csrf
                                                            @method('put')
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                            <div><a href="{{route('courses.show',$course->slug)}}" target="_blank"><i class="fa-x fa-eye text-primary" title="نمایش"></i></a></div>
                                            <div><a href="{{route('show.course.faq',$course->slug)}}"><i class="fa-x fa-question text-primary" title="سوالات متداول این دوره"></i></a></div>
                                            <div><a href="{{route('show.course.chapters',$course->slug)}}"><i class="fa-x fa-plus text-primary" title="فصل‌های دوره"></i></a></div>
                                            <div><a href="{{route('courses.edit',$course->id)}}"><i class="fa-x fa-edit text-primary" title="ویرایش"></i></a></div>
                                            <div>
                                                <a href="{{route('courses.destroy',$course->id)}}" onclick="destroyCourse(event, {{ $course->id }})"><i class="fa-x fa-trash text-danger" title="حذف"></i></a>
                                                <form action="{{route('courses.destroy',$course->id)}}" method="post" id="destroy-course-{{ $course->id }}">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="scripts">
        <script src="{{asset('assets/panel/js/sweetalert2.all.min.js')}}"></script>
        <script>
            function destroyCourse(event, id) {
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
                        document.getElementById(`destroy-course-${id}`).submit()
                    }
                })
            }
        </script>
    </x-slot>
</x-panel-layout>
