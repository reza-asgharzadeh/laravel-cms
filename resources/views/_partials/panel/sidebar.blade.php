<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">
            <li><a href="{{route('panel')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
            <li><a href="{{route('landing')}}" target="_blank"><i class="fa fa-eye"></i> مشاهده سایت</a></li>
            <li><a href="{{route('profiles.index')}}"><i class="fa fa-user"></i> ویرایش پروفایل</a></li>
            <li><a><i class="fa fa-user-circle"></i> کاربران <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('users.index')}}">مدیریت کاربران</a></li>
                    <li><a href="{{route('users.create')}}">ایجاد کاربر جدید</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-ticket"></i> تیکت ها <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('tickets.create')}}">ایجاد تیکت جدید</a></li>
                    <li><a href="{{route('tickets.index')}}">مدیریت تیکت ها</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-lock"></i> سطح دسترسی <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('roles.index')}}">ایجاد نقش</a></li>
                    <li><a href="{{route('permissions.index')}}">ایجاد دسترسی</a></li>
                    <li><a href="{{route('setpermissions.index')}}">مدیریت نقش و دسترسی</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-edit"></i> مقالات <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('posts.create')}}">ایجاد مقاله جدید</a></li>
                    <li><a href="{{route('posts.index')}}">مدیریت مقالات</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-graduation-cap"></i> دوره ها <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('courses.create')}}">ایجاد دوره جدید</a></li>
                    <li><a href="{{route('courses.index')}}">مدیریت دوره ها</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-television"></i> جلسات دوره <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('episodes.create')}}">ایجاد جلسه جدید</a></li>
                    <li><a href="{{route('episodes.index')}}">مدیریت جلسات</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-list"></i> دسته بندی ها <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('categories.index')}}">ایجاد و مدیریت دسته بندی</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-tags"></i> برچسب ها <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('tags.index')}}">ایجاد و مدیریت برچسب</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-comments"></i> نظرات <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('comments.index')}}">مدیریت نظرات</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-money"></i> امور مالی <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('comments.index')}}">پرداخت های موفق</a></li>
                    <li><a href="{{route('comments.index')}}">پرداخت های ناموفق</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
