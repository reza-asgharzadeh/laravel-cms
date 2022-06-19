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
                <li><a href="{{route('account.information')}}"><i class="fa fa-user"></i> اطلاعات پروفایل</a></li>
            @endcan
            @can('display-my-courses')
                <li><a href="{{route('my.courses.index')}}"><i class="fa fa-graduation-cap"></i> دوره‌های من</a></li>
            @endcan
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
                <li><a><i class="fa fa-ticket"></i> تیکت‌ها <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('tickets.create')}}">ایجاد تیکت جدید</a></li>
                        <li><a href="{{route('tickets.index')}}">مدیریت تیکت‌ها</a></li>
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
            @can('display-pages')
            <li><a><i class="fa fa-file"></i> صفحه سایت <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('pages.create')}}">ایجاد صفحه جدید</a></li>
                    <li><a href="{{route('pages.index')}}">مدیریت صفحات</a></li>
                </ul>
            </li>
            @endcan
            @can('display-posts')
                <li><a><i class="fa fa-edit"></i> مقالات <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('posts.create')}}">ایجاد مقاله جدید</a></li>
                        <li><a href="{{route('posts.index')}}">مدیریت مقالات</a></li>
                    </ul>
                </li>
            @endcan
            @can('display-courses')
                <li><a><i class="fa fa-graduation-cap"></i> دوره‌ها <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('courses.index')}}">ایجاد و مدیریت دوره‌ها</a></li>
                        <li><a href="{{route('chapters.index')}}">ایجاد و مدیریت فصل‌های دوره</a></li>
                        <li><a href="{{route('episodes.index')}}">ایجاد و مدیریت جلسات فصل</a></li>
                        <li><a href="{{route('faq-courses.index')}}">ایجاد و مدیریت سوالات متداول دوره</a></li>
                    </ul>
                </li>
            @endcan
            @can('display-categories')
                <li><a><i class="fa fa-list-alt"></i> دسته‌بندی‌ها <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('categories.index')}}">ایجاد و مدیریت دسته‌بندی</a></li>
                    </ul>
                </li>
            @endcan
            @can('display-tags')
                <li><a><i class="fa fa-tags"></i> برچسب‌ها <span class="fa fa-chevron-down"></span></a>
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
            @can('display-contact-forms')
                <li><a><i class="fa fa-wpforms"></i> فرم تماس با ما <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('contact-us.index')}}">پاسخ و مدیریت تماس‌ها</a></li>
                    </ul>
                </li>
            @endcan
            @can('display-newsletters')
                <li><a><i class="fa fa-newspaper-o"></i> خبرنامه‌ها <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('newsletters.index')}}">مدیریت خبرنامه‌ها</a></li>
                    </ul>
                </li>
            @endcan
            @can('display-alert-bars')
                <li><a><i class="fa fa-info"></i> نوارهای اطلاع‌رسانی <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('alerts.create')}}">ایجاد نوار اطلاع‌رسانی</a></li>
                        <li><a href="{{route('alerts.index')}}">مدیریت نوارهای اطلاع‌رسانی</a></li>
                    </ul>
                </li>
            @endcan
            @can('display-discounts')
                <li><a><i class="fa fa-percent"></i> جشنواره و کد تخفیف <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('coupons.index')}}">ایجاد و مدیریت کدهای تخفیف</a></li>
                        <li><a href="{{route('offers.index')}}">ایجاد و مدیریت جشنواره‌های تخفیف</a></li>
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
                <li><a><i class="fa fa-money"></i> لیست پرداخت‌ها <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('payments.index')}}">همه پرداخت‌ها</a></li>
                        <li><a href="{{route('payments.index',['status_code'=>true])}}">پرداخت‌های موفق</a></li>
                        <li><a href="{{route('payments.index',['status_code'=>false])}}">پرداخت‌های ناموفق</a></li>
                    </ul>
                </li>
            @endcan
        </ul>
    </div>
</div>
