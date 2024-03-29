<x-panel-layout>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>
                        <a class="btn btn-primary" href="{{route('chapters.create')}}"><i class="fa fa-plus"></i> ایجاد فصل جدید</a>
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
                            فصل‌های دوره
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
                                    <th>نام فصل</th>
                                    <th>متعلق به دوره</th>
                                    <th>تاریخ ایجاد</th>
                                    <th>تاریخ آخرین بروزرسانی</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($chapters as $chapter)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$chapter->name}}</td>
                                        <td>{{$chapter->course->name}}</td>
                                        <td>{{$chapter->getCreatedAtInJalali()}}</td>
                                        <td>{{$chapter->getUpdatedAtInJalali()}}</td>
                                        <td>
                                            <div style="display: flex; justify-content: space-evenly">
                                                <div><a href="{{route('courses.show',$chapter->course->slug)}}" target="_blank"><i class="fa-x fa-eye text-primary" title="نمایش"></i></a></div>
                                                <div><a href="{{route('show.chapter.episodes',$chapter->id)}}"><i class="fa-x fa-television text-primary" title="جلسات فصل"></i></a></div>
                                                <div><a href="{{route('show.chapter.course',$chapter)}}"><i class="fa-x fa-graduation-cap text-primary" title="دوره‌ی فصل"></i></a></div>
                                                <div><a href="{{route('chapters.edit',$chapter->id)}}"><i class="fa-x fa-edit text-primary" title="ویرایش"></i></a></div>
                                                <div>
                                                    <a href="{{route('chapters.destroy',$chapter->id)}}" onclick="destroyChapter(event, {{ $chapter->id }})"><i class="fa-x fa-trash text-danger" title="حذف"></i></a>
                                                    <form action="{{route('chapters.destroy',$chapter->id)}}" method="post" id="destroy-chapter-{{ $chapter->id }}">
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
                                {!! $chapters->links() !!}
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
            function destroyChapter(event, id) {
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
                        document.getElementById(`destroy-chapter-${id}`).submit()
                    }
                })
            }
        </script>
    </x-slot>
</x-panel-layout>
