<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">
            @can('display-dashboard')
                <li><a href="{{route('panel')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
            @endcan
            @can('display-site')
                <li><a href="{{route('landing')}}" target="_blank"><i class="fa fa-eye"></i> مشاهده سایت</a></li>
            @endcan
            @can('display-edit-profile')
                <li><a href="{{route('profiles.index')}}"><i class="fa fa-user"></i> ویرایش پروفایل</a></li>
            @endcan
            @can('display-activities')
                <li><a href="{{route('activities.index')}}"><i class="fa fa-calendar"></i> فعالیت های من</a></li>
            @endcan

                <li><a href="{{route('my.courses.index')}}"><i class="fa fa-graduation-cap"></i> دوره های من</a></li>

            @can('display-wallet')
                <li><a href="{{route('wallets.index')}}"><i class="fa fa-shopping-bag"></i> کیف پول</a></li>
            @endcan
            @can('display-users')
                <li><a><i class="fa fa-user-circle"></i> کاربران <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('users.index')}}">مدیریت کاربران</a></li>
                        <li><a href="{{route('users.create')}}">ایجاد کاربر جدید</a></li>
                    </ul>
                </li>
            @endcan
            @can('display-tickets')
                <li><a><i class="fa fa-ticket"></i> تیکت ها <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('tickets.create')}}">ایجاد تیکت جدید</a></li>
                        <li><a href="{{route('tickets.index')}}">مدیریت تیکت ها</a></li>
                    </ul>
                </li>
            @endcan
            @can('display-questions-answers')
                <li><a><i class="fa fa-question-circle"></i> پرسش و پاسخ من <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('questions.create')}}">ایجاد پرسش جدید</a></li>
                        <li><a href="{{route('questions.index')}}">مدیریت پرسش و پاسخ</a></li>
                    </ul>
                </li>
            @endcan
            @can('display-roles-permissions')
                <li><a><i class="fa fa-lock"></i> سطح دسترسی <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('roles.index')}}">ایجاد نقش و تعیین دسترسی</a></li>
                        <li><a href="{{route('permissions.index')}}">ایجاد دسترسی</a></li>
                    </ul>
                </li>
            @endcan
                <li><a><i class="fa fa-file"></i> صفحات تکی <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('pages.create')}}">ایجاد صفحه تکی جدید</a></li>
                        <li><a href="{{route('pages.index')}}">مدیریت صفحات تکی</a></li>
                    </ul>
                </li>
            @can('display-posts')
                <li><a><i class="fa fa-edit"></i> مقالات <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('posts.create')}}">ایجاد مقاله جدید</a></li>
                        <li><a href="{{route('posts.index')}}">مدیریت مقالات</a></li>
                    </ul>
                </li>
            @endcan
            @can('display-courses')
            <li><a><i class="fa fa-graduation-cap"></i> دوره ها <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('courses.create')}}">ایجاد دوره جدید</a></li>
                    <li><a href="{{route('courses.index')}}">مدیریت دوره ها</a></li>
                </ul>
            </li>
            @endcan
            @can('display-episodes')
            <li><a><i class="fa fa-television"></i> جلسات دوره <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('episodes.create')}}">ایجاد جلسه جدید</a></li>
                    <li><a href="{{route('episodes.index')}}">مدیریت جلسات</a></li>
                </ul>
            </li>
            @endcan
            @can('display-categories')
                <li><a><i class="fa fa-list"></i> دسته بندی ها <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('categories.index')}}">ایجاد و مدیریت دسته بندی</a></li>
                    </ul>
                </li>
            @endcan
            @can('display-tags')
            <li><a><i class="fa fa-tags"></i> برچسب ها <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('tags.index')}}">ایجاد و مدیریت برچسب</a></li>
                </ul>
            </li>
            @endcan
            @can('display-comments')
                <li><a><i class="fa fa-comments"></i> نظرات <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('comments.index')}}">مدیریت نظرات</a></li>
                    </ul>
                </li>
            @endcan
                <li><a><i class="fa fa-percent"></i> نوار اطلاع رسانی <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('alerts.create')}}">ایجاد نوار اطلاع رسانی</a></li>
                        <li><a href="{{route('alerts.index')}}">مدیریت نوارهای اطلاع رسانی</a></li>
                    </ul>
                </li>
            @can('display-coupons')
                <li><a><i class="fa fa-percent"></i> کد تخفیف <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('coupons.create')}}">ایجاد کد تخفیف</a></li>
                        <li><a href="{{route('coupons.index')}}">مدیریت کد تخفیف ها</a></li>
                    </ul>
                </li>
            @endcan
            @can('display-offers')
                <li><a><i class="fa fa-gift"></i> تخفیف پیشنهادی <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('offers.create')}}">ایجاد تخفیف پیشنهادی</a></li>
                        <li><a href="{{route('offers.index')}}">مدیریت تخفیف پیشنهادی</a></li>
                    </ul>
                </li>
            @endcan
            @can('display-orders')
                <li><a><i class="fa fa-shopping-basket"></i> لیست سفارشات <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('orders.index')}}">همه سفارشات</a></li>
                        <li><a href="{{route('orders.index',['order_status'=>1])}}">سفارشات موفق</a></li>
                        <li><a href="{{route('orders.index',['order_status'=>0])}}">سفارشات ناموفق</a></li>
                    </ul>
                </li>
            @endcan
            @can('display-payments')
                <li><a><i class="fa fa-money"></i> لیست پرداخت ها <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('payments.index')}}">همه پرداخت ها</a></li>
                        <li><a href="{{route('payments.index',['status_code'=>true])}}">پرداخت های موفق</a></li>
                        <li><a href="{{route('payments.index',['status_code'=>false])}}">پرداخت های ناموفق</a></li>
                    </ul>
                </li>
            @endcan
        </ul>
    </div>
</div>
