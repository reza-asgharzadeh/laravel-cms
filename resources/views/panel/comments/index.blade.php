<x-panel-layout>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>
                        <small>نظرات سایت</small>
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
                            <small>نظرات اصلی</small>
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
                                    <th>شناسه</th>
                                    <th><span class="text-danger">عنوان مقاله</span> - <span class="text-success">نام دوره</span> - <span class="text-warning">نام اپیزود</span></th>
                                    <th>نظر</th>
                                    <th>شناسه پاسخ</th>
                                    <th>نام کاربر</th>
                                    <th>وضعیت</th>
                                    <th>تاریخ</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($parentComments as $comment)
                                    <tr>
                                        <th scope="row">{{$comment->id}}</th>
                                        <td><span class="@if($comment->commentable_type == 'App\Models\Course') text-success @elseif($comment->commentable_type == 'App\Models\Post') text-danger @else text-warning @endif">● </span>{{$comment->commentable->name ?? $comment->commentable->title}}</td>
                                        <td>{!! \Illuminate\Support\Str::limit($comment->content, 20, $end='...') !!}</td>
                                        <td>
                                            <ul>
                                                @forelse($comment->replies as $reply)
                                                    <li>{{$reply->id}}</li>
                                                @empty
                                                    <p>ندارد</p>
                                                @endforelse
                                            </ul>
                                        </td>
                                        <td>{{$comment->user->name}}</td>
                                        <td class="{{$comment->is_approved ? 'text-success' : 'text-danger'}}">{{$comment->is_approved()}}</td>
                                        <td>{{$comment->getCreatedAtInJalali()}}</td>
                                        <td>
                                            <div style="display: flex; justify-content: space-evenly">
                                                <div><a href="{{route('comments.edit',$comment->id)}}"><i class="fa-x fa-edit text-primary" title="ویرایش"></i></a></div>
                                                <div><a href="{{route('comments.reply',$comment->id)}}"><i class="fa-x fa-reply text-primary" title="پاسخ"></i></a></div>
                                                @if($comment->is_approved)
                                                    <div>
                                                        <a href="{{route('comments.display',$comment->id)}}" onclick="updateIsApproved(event, {{ $comment->id }})"><i class="fa-x fa-times" title="عدم تایید"></i></a>
                                                        <form action="{{route('comments.display',$comment->id)}}" method="post" id="update-isApproved-{{ $comment->id }}">
                                                            @csrf
                                                            @method('put')
                                                        </form>
                                                    </div>
                                                @else
                                                    <div>
                                                        <a href="{{route('comments.display',$comment->id)}}" onclick="updateIsApproved(event, {{ $comment->id }})"><i class="fa-x fa-check" title="تایید"></i></a>
                                                        <form action="{{route('comments.display',$comment->id)}}" method="post" id="update-isApproved-{{ $comment->id }}">
                                                            @csrf
                                                            @method('put')
                                                        </form>
                                                    </div>
                                                @endif
                                                <div>
                                                    <a href="{{route('comments.destroy',$comment->id)}}" onclick="destroyComment(event, {{ $comment->id }})"><i class="fa-x fa-trash text-danger" title="حذف"></i></a>
                                                    <form action="{{route('comments.destroy',$comment->id)}}" method="post" id="destroy-comment-{{ $comment->id }}">
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
                                {!! $parentComments->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            <small>پاسخ نظرات</small>
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
                                    <th>شناسه</th>
                                    <th><span class="text-danger">عنوان مقاله</span> - <span class="text-success">نام دوره</span> - <span class="text-warning">نام اپیزود</span></th>
                                    <th>نظر</th>
                                    <th>پاسخ به شناسه</th>
                                    <th>نام کاربر</th>
                                    <th>وضعیت</th>
                                    <th>تاریخ</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($childrenComments as $comment)
                                    <tr>
                                        <th scope="row">{{$comment->id}}</th>
                                        <td><span class="@if($comment->commentable_type == 'App\Models\Course') text-success @elseif($comment->commentable_type == 'App\Models\Post') text-danger @else text-warning @endif">● </span>{{$comment->commentable->name ?? $comment->commentable->title}}</td>
                                        <td>{!! \Illuminate\Support\Str::limit($comment->content, 20, $end='...') !!}</td>
                                        <td>{{$comment->parent->id}}</td>
                                        <td>{{$comment->user->name}}</td>
                                        <td class="{{$comment->is_approved ? 'text-success' : 'text-danger'}}">{{$comment->is_approved ? 'تایید شده' : 'تاییده نشده'}}</td>
                                        <td>{{$comment->getCreatedAtInJalali()}}</td>
                                        <td>
                                            <div style="display: flex; justify-content: space-evenly">
                                                <div><a href="{{route('comments.edit',$comment->id)}}"><i class="fa-x fa-edit text-primary" title="ویرایش"></i></a></div>
                                                <div><a href="{{route('comments.reply',$comment->id)}}"><i class="fa-x fa-reply text-primary" title="پاسخ"></i></a></div>
                                                @if($comment->is_approved)
                                                    <div>
                                                        <a href="{{route('comments.display',$comment->id)}}" onclick="updateIsApproved(event, {{ $comment->id }})"><i class="fa-x fa-times" title="عدم تایید"></i></a>
                                                        <form action="{{route('comments.display',$comment->id)}}" method="post" id="update-isApproved-{{ $comment->id }}">
                                                            @csrf
                                                            @method('put')
                                                        </form>
                                                    </div>
                                                @else
                                                    <div>
                                                        <a href="{{route('comments.display',$comment->id)}}" onclick="updateIsApproved(event, {{ $comment->id }})"><i class="fa-x fa-check" title="تایید"></i></a>
                                                        <form action="{{route('comments.display',$comment->id)}}" method="post" id="update-isApproved-{{ $comment->id }}">
                                                            @csrf
                                                            @method('put')
                                                        </form>
                                                    </div>
                                                @endif
                                                <div>
                                                    <a href="{{route('comments.destroy',$comment->id)}}" onclick="destroyComment(event, {{ $comment->id }})"><i class="fa-x fa-trash text-danger" title="حذف"></i></a>
                                                    <form action="{{route('comments.destroy',$comment->id)}}" method="post" id="destroy-comment-{{ $comment->id }}">
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
                                {!! $childrenComments->links() !!}
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
            function destroyComment(event, id) {
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
                        document.getElementById(`destroy-comment-${id}`).submit()
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
