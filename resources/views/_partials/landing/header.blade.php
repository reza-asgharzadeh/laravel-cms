{{--@include('client.offer_alert')--}}
{{--<header>--}}
{{--    <nav class="navbar navbar-expand-lg shadow p-3 bg-body rounded">--}}
{{--        <div class="container">--}}
{{--            <a class="navbar-brand" href="#"><img src="{{asset('assets/landing/img/logo.png')}}" alt="logo"></a>--}}
{{--            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>--}}
{{--            </button>--}}
{{--            <div class="collapse navbar-collapse" id="navbarScroll">--}}
{{--                <ul class="navbar-nav me-auto my-2 my-lg-0">--}}
{{--                    <li class="nav-item"><a class="nav-link" href="{{route('landing')}}"> خانه </a></li>--}}
{{--                    <li class="nav-item"><a class="nav-link" href="{{route('blog')}}"> مقالات </a></li>--}}
{{--                    <li class="nav-item"><a class="nav-link" href="{{route('courses')}}"> دوره ها </a></li>--}}
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> مقالات </a>--}}
{{--                        <ul class="dropdown-menu dropdown-menu-right">--}}
{{--                            @foreach($categories as $category)--}}
{{--                            <li><a class="dropdown-item" href="#">  </a></li>--}}
{{--                            <li><a class="dropdown-item" href="{{route('category.post.show',$category->slug)}}"> {{$category->name}} &raquo; </a>--}}
{{--                                <ul class="submenu submenu-left dropdown-menu">--}}
{{--                                    @foreach($category->children as $child)--}}
{{--                                    <li><a class="dropdown-item" href="{{route('category.post.show',$child->slug)}}">{{$child->name}}</a></li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> دوره ها </a>--}}
{{--                        <ul class="dropdown-menu dropdown-menu-right">--}}
{{--                            @foreach($categories as $category)--}}
{{--                                <li><a class="dropdown-item" href="#">  </a></li>--}}
{{--                                <li><a class="dropdown-item" href="{{route('category.course.show',$category->slug)}}"> {{$category->name}} &raquo; </a>--}}
{{--                                    <ul class="submenu submenu-left dropdown-menu">--}}
{{--                                        @foreach($category->children as $child)--}}
{{--                                            <li><a class="dropdown-item" href="{{route('category.course.show',$child->slug)}}">{{$child->name}}</a></li>--}}
{{--                                        @endforeach--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </li>--}}


{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> لینک های مفید </a>--}}
{{--                        <ul class="dropdown-menu dropdown-menu-right">--}}
{{--                            <li class="nav-item"><a class="nav-link" href="#"> درباره ما </a></li>--}}
{{--                            <li class="nav-item"><a class="nav-link" href="#"> تماس با ما </a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                </ul>--}}


{{--                <div class="dropdown">--}}
{{--                    <button type="button" class="btn-cart" data-toggle="dropdown">--}}
{{--                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> سبد خرید <span id="count-basket" class="badge bg-danger">{{ count((array) session('cart')) }}</span>--}}
{{--                    </button>--}}
{{--                    <div class="dropdown-menu">--}}
{{--                        <div class="row total-header-section">--}}
{{--                            <div class="col-lg-6 col-sm-6 col-6">--}}
{{--                                تعداد: <span id="badge-total" class="badge bg-danger">{{ count((array) session('cart')) }}</span>--}}
{{--                            </div>--}}
{{--                            @php $total = 0 @endphp--}}
{{--                            @foreach((array) session('cart') as $id => $details)--}}
{{--                                @php $total += $details['price'] @endphp--}}
{{--                            @endforeach--}}
{{--                            <div class="col-lg-6 col-sm-6 col-6 total-section text-right">--}}
{{--                                مبلغ کل:<span id="basket-total" class="text-info"> {{ $total }} </span>تومان--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        @if(session('cart'))--}}
{{--                            @foreach(session('cart') as $id => $details)--}}
{{--                                <div id="{{ $id }}" class="row cart-detail">--}}
{{--                                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">--}}
{{--                                        <img src="{{ $details['image'] }}" alt="course" class="w-100">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">--}}
{{--                                        <p>{{ $details['name'] }}</p>--}}
{{--                                        <span class="price text-info"> تومان{{ $details['price'] }}</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        @endif--}}

{{--                        <div class="row">--}}
{{--                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">--}}
{{--                                <a href="{{ route('cart') }}" class="btn btn-success">مشاهده همه</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                @auth--}}
{{--                    <ul class="navbar-nav mx-2">--}}
{{--                        <li>--}}
{{--                            <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown"--}}
{{--                               aria-expanded="false">--}}
{{--                                {{auth()->user()->name}}--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu pull-right p-2 shadow-lg">--}}
{{--                                <li><a class="h6" href="{{route('panel')}}"><i class="fa fa-dashboard"></i> پنل کاربری</a></li>--}}
{{--                                <li><a class="h6" href="{{route('my.courses.index')}}"><i class="fa fa-graduation-cap"></i> دوره های من</a></li>--}}
{{--                                <li><a class="h6" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> خروج</a></li>--}}
{{--                                <form action="{{route('logout')}}" method="post" id="logout-form">--}}
{{--                                    @csrf--}}
{{--                                </form>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                @else--}}
{{--                    <a href="{{route('register')}}" class="btn btn-gray m-1">ثبت نام</a>--}}
{{--                    <a href="{{route('login')}}" class="btn btn-purple">ورود</a>--}}
{{--                @endauth--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--</header>--}}

@include('_partials.landing.offer_alert')
<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <i class="fa fa-lg fa-close js-menu-toggle"></i>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>


<header class="site-navbar site-navbar-target shadow p-3" role="banner">
    <nav class="site-navigation position-relative text-right" role="navigation">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <a class="navbar-brand m-0" href="{{route('landing')}}"><img src="{{asset('assets/landing/img/logo.png')}}" alt="logo"></a>
                    <ul class="site-menu main-menu js-clone-nav d-none d-lg-inline-block m-0 p-0">
                        <li><a href="{{route('landing')}}" class="nav-link">خانه</a></li>
                        <li><a href="{{route('blog')}}" class="nav-link">مقالات</a></li>
                        <li><a href="{{route('courses')}}" class="nav-link">دوره ها</a></li>
                        <li class="has-children">
                            <a href="#" class="nav-link">دسته بندی مقالات</a>
                            <ul class="dropdown">
                                @foreach($categories as $category)
                                    @if(!$category->posts->isEmpty())
                                    <li class="{{!$category->children->isEmpty() ? 'has-children' : ''}}">
                                        <a href="{{route('category.post.show',$category->slug)}}">{{$category->name}}</a>
                                        @foreach($category->children as $child)
                                            <ul class="dropdown">
                                                <li><a href="{{route('category.post.show',$child->slug)}}">{{$child->name}}</a></li>
                                            </ul>
                                        @endforeach
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="#" class="nav-link">دسته بندی دوره ها</a>
                            <ul class="dropdown">
                                @foreach($categories as $category)
                                    @if(!$category->courses->isEmpty())
                                    <li class="{{!$category->children->isEmpty() ? 'has-children' : ''}}">
                                        <a href="{{route('category.course.show',$category->slug)}}">{{$category->name}}</a>
                                        @foreach($category->children as $child)
                                            <ul class="dropdown">
                                                <li><a href="{{route('category.course.show',$child->slug)}}">{{$child->name}}</a></li>
                                            </ul>
                                        @endforeach
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="#" class="nav-link">لینک های مفید</a>
                            <ul class="dropdown">
                                <li><a href="#" class="nav-link">درباره ما</a></li>
                                <li><a href="#" class="nav-link">تماس با ما</a></li>
                            </ul>
                        </li>

                        @auth
                            <div class="btn-group dropdown">
                                <button type="button" class="btn-cart" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> سبد خرید <span id="count-basket" class="badge bg-danger">{{ count((array) session('cart')) }}</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="row total-header-section">
                                        <div class="col-lg-6 col-sm-6 col-6">
                                            تعداد: <span id="badge-total" class="badge bg-danger">{{ count((array) session('cart')) }}</span>
                                        </div>
                                        @php $total = 0 @endphp
                                        @foreach((array) session('cart') as $id => $details)
                                            @php $total += $details['price'] @endphp
                                        @endforeach
                                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                            مبلغ کل:<span id="basket-total" class="text-info"> {{ $total }} </span>تومان
                                        </div>
                                    </div>
                                    @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                            <div id="{{ $id }}" class="row cart-detail">
                                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                    <img src="{{ $details['image'] }}" alt="course" class="w-100">
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                    <p>{{ $details['name'] }}</p>
                                                    <span class="price text-info"> تومان{{ $details['price'] }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                            <a href="{{ route('cart') }}" class="btn btn-success">مشاهده همه</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endauth
                    </ul>
                </div>

                @auth
                    <div class="btn-group">
                        <button type="button" class="dropdown-toggle border-0 bg-body" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{auth()->user()->name}}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item h6" href="{{route('panel')}}"><i class="fa fa-dashboard me-1"></i>پنل کاربری</a>
                            <a class="dropdown-item h6" href="{{route('my.courses.index')}}"><i class="fa fa-graduation-cap me-1"></i>دوره های من</a>
                            <a class="dropdown-item h6" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out me-1"></i>خروج</a>
                            <form action="{{route('logout')}}" method="post" id="logout-form">
                                @csrf
                            </form>
                        </div>
                        <span class="d-lg-none mx-3">
                            <a href="#" class="site-menu-toggle js-menu-toggle"><i class="fa fa-lg fa-bars"></i></a>
                        </span>
                    </div>
                @else
                    <div>
                        <a href="{{route('register')}}" class="btn btn-gray m-1">ثبت نام</a>
                        <a href="{{route('login')}}" class="btn btn-purple">ورود</a>
                        <span class="d-lg-none mx-3">
                            <a href="#" class="site-menu-toggle js-menu-toggle"><i class="fa fa-lg fa-bars"></i></a>
                        </span>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
</header>
