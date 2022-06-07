<x-panel-layout>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>
                        <small>فرم‌های تماس سایت</small>
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
                            <small>فرم‌های تماس</small>
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
                                    <th>شناسه</th>
                                    <th>نام و نام خانوادگی</th>
                                    <th>ایمیل</th>
                                    <th>تاریخ و ساعت ارسال</th>
                                    <th>شناسه‌های پاسخ</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($parentContacts as $contact)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$contact->id}}</td>
                                        <td>{{$contact->name}}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->getCreatedAtInJalali()}}</td>
                                        <td>
                                            <ul>
                                                @forelse($contact->replies as $reply)
                                                    <li>{{$reply->id}}</li>
                                                @empty
                                                    <p>ندارد</p>
                                                @endforelse
                                            </ul>
                                        </td>
                                        <td>
                                            <div style="display: flex; justify-content: space-evenly">
                                                <div><a href="{{route('contact-us.edit',$contact->id)}}"><i class="fa-x fa-edit text-primary" title="ویرایش"></i></a></div>
                                                <div>
                                                    <a href="{{route('contacts.reply',$contact->id)}}" onclick="replyContact(event, {{ $contact->id }})"><i class="fa-x fa-reply text-primary" title="پاسخ"></i></a>
                                                    <form action="{{route('contacts.reply',$contact->id)}}" method="post" id="reply-contact-{{ $contact->id }}">
                                                        @csrf
                                                    </form>
                                                </div>
                                                <div>
                                                    <a href="{{route('contact-us.destroy',$contact->id)}}" onclick="destroyContact(event, {{ $contact->id }})"><i class="fa-x fa-trash text-danger" title="حذف"></i></a>
                                                    <form action="{{route('contact-us.destroy',$contact->id)}}" method="post" id="destroy-contact-{{ $contact->id }}">
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
                                {!! $parentContacts->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            <small>پاسخ فرم‌های تماس</small>
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
                                    <th>شناسه</th>
                                    <th>نام پاسخ دهنده</th>
                                    <th>پاسخ به شناسه</th>
                                    <th>تاریخ پاسخ</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($childrenContacts as $contact)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$contact->id}}</td>
                                        <td>{{$contact->getUserName()}}</td>
                                        <td>{{$contact->getParentId()}}</td>
                                        <td>{{$contact->getCreatedAtInJalali()}}</td>
                                        <td>
                                            <div style="display: flex; justify-content: space-evenly">
                                                <div><a href="{{route('contact-us.edit',$contact->id)}}"><i class="fa-x fa-edit text-primary" title="ویرایش"></i></a></div>
                                                <div>
                                                    <a href="{{route('contact-us.destroy',$contact->id)}}" onclick="destroyContact(event, {{ $contact->id }})"><i class="fa-x fa-trash text-danger" title="حذف"></i></a>
                                                    <form action="{{route('contact-us.destroy',$contact->id)}}" method="post" id="destroy-contact-{{ $contact->id }}">
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
                                {!! $childrenContacts->links() !!}
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
            function destroyContact(event, id) {
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
                        document.getElementById(`destroy-contact-${id}`).submit()
                    }
                })
            }

            function replyContact(event, id) {
                event.preventDefault();
                document.getElementById(`reply-contact-${id}`).submit()
            }
        </script>
    </x-slot>
</x-panel-layout>
