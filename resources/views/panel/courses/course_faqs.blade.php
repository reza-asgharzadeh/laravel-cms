<x-panel-layout>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>
                        <a class="btn btn-primary" href="{{route('faq-courses.create')}}"><i class="fa fa-plus"></i> ایجاد سوال متداول جدید</a>
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
                            سوالات متداول دوره
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
                                    <th>سوال متداول دوره</th>
                                    <th>متعلق به دوره</th>
                                    <th>تاریخ ایجاد</th>
                                    <th>تاریخ آخرین بروزرسانی</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($faqCourses as $faqCourse)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$faqCourse->question}}</td>
                                        <td>{{$faqCourse->course->name}}</td>
                                        <td>{{$faqCourse->getCreatedAtInJalali()}}</td>
                                        <td>{{$faqCourse->getUpdatedAtInJalali()}}</td>
                                        <td>
                                            <div style="display: flex; justify-content: space-evenly">
                                                <div><a href="{{route('courses.show',$faqCourse->course->slug)}}" target="_blank"><i class="fa-x fa-eye text-primary" title="نمایش"></i></a></div>
                                                <div><a href="{{route('show.faq.course',$faqCourse)}}"><i class="fa-x fa-graduation-cap text-primary" title="دوره‌ی این سوال"></i></a></div>
                                                <div><a href="{{route('faq-courses.edit',$faqCourse->id)}}"><i class="fa-x fa-edit text-primary" title="ویرایش"></i></a></div>
                                                <div>
                                                    <a href="{{route('faq-courses.destroy',$faqCourse->id)}}" onclick="destroyFaqCourse(event, {{ $faqCourse->id }})"><i class="fa-x fa-trash text-danger" title="حذف"></i></a>
                                                    <form action="{{route('faq-courses.destroy',$faqCourse->id)}}" method="post" id="destroy-faq-course-{{ $faqCourse->id }}">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="text-center alert alert-danger" role="alert">در حال حاضر سوال متداولی برای این دوره ایجاد نشده است.</div>
                                @endforelse
                                </tbody>
                            </table>
                            <div class="text-center">
                                {!! $faqCourses->links() !!}
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
            function destroyFaqCourse(event, id) {
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
                        document.getElementById(`destroy-faq-course-${id}`).submit()
                    }
                })
            }
        </script>
    </x-slot>
</x-panel-layout>
