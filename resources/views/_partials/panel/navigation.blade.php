<div class="top_nav hidden-print">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="javascript:" class="user-profile dropdown-toggle" data-toggle="dropdown"
                       aria-expanded="false">
                            <img class="navigation-pic" src="{{auth()->user()->getProfile()}}" alt="">{{auth()->user()->name}}
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:"> نمایه</a></li>
                        <li>
                            <a href="javascript:">
                                <span class="badge bg-red pull-right">50%</span>
                                <span>تنظیمات</span>
                            </a>
                        </li>
                        <li><a href="javascript:">کمک</a></li>
                        <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> خروج</a></li>
                        <form action="{{route('logout')}}" method="post" id="logout-form">
                            @csrf
                        </form>
                    </ul>
                </li>

                <li role="presentation" class="dropdown">
                    <a href="javascript:" class="dropdown-toggle info-number" data-toggle="dropdown"
                       aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">1</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                            <a>
                                        <span class="image"><img src="{{auth()->user()->getProfile()}}"
                                                                 alt="Profile Image"/></span>
                                <span>
                          <span>{{auth()->user()->name}}</span>
                          <span class="time">3 دقیقه پیش</span>
                        </span>
                                <span class="message">
                          فیلمای فستیوال فیلمایی که اجرا شده یا راجع به لحظات مرده ایه که فیلمسازا میسازن. آنها جایی بودند که....
                        </span>
                            </a>
                        </li>

                        <li>
                            <div class="text-center">
                                <a>
                                    <strong>مشاهده تمام اعلان ها</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
