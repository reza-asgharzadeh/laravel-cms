<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <i class="fa fa-lg fa-close js-menu-toggle"></i>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

@include('_partials.landing.offer_alert')

<header class="site-navbar site-navbar-target p-3" role="banner">
    <div class="container">
        <nav class="site-navigation position-relative bg-white shadow p-4 rounded-4" role="navigation">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <a class="navbar-brand m-0 text-dark" href="{{route('landing')}}"><img src="{{env('APP_URL') . env('LOGO_PATH')}}" alt="logo"></a>
                </div>

                <div class="w-50 js-clone-nav d-none d-lg-inline-block">
                    <form class="mt-3 mt-lg-0" action="{{route('search')}}">
                        <button class="btn btn-outline-secondary border-0 position-absolute">
                            <i class="fa fa-search"></i>
                        </button>
                        <input type="text" class="form-control px-5 bg-light" name="search" placeholder="دنبال چی میگردی؟">
                        <input type="hidden" name="type" value="post">
                    </form>
                </div>

                @auth
                    <div>
                        <ul class="site-menu main-menu js-clone-nav d-none d-lg-inline-block mx-5">
                            <div class="btn-group dropdown">
                                <button type="button" class="btn-cart mt-3 mb-2 mb-lg-0 mt-lg-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        </ul>
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
                    </div>
                @else
                    <div>
                        <span class="d-none d-lg-block">
                            <a href="{{route('register')}}" class="btn btn-gray m-1">ثبت نام</a>
                            <a href="{{route('login')}}" class="btn btn-purple">ورود</a>
                        </span>
                        <span class="d-lg-none">
                            <div class="d-inline">
                              <button class="btn-login-register-purple" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ثبت نام | ورود
                              </button>
                              <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="{{route('register')}}">ثبت نام</a></li>
                                  <li><hr class="dropdown-divider"></li>
                                  <li><a class="dropdown-item" href="{{route('login')}}">ورود</a></li>
                              </ul>
                            </div>
                        </span>
                        <span class="d-lg-none mx-3">
                            <a href="#" class="site-menu-toggle js-menu-toggle"><i class="fa fa-lg fa-bars"></i></a>
                        </span>
                    </div>
                @endauth
            </div>
        </nav>

        <nav class="site-navigation position-relative text-center m-auto w-93 bg-second-nav shadow p-lg-2 rounded-second-nav" role="navigation">
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
                        <li><a href="{{route('about')}}" class="nav-link">درباره ما</a></li>
                        <li><a href="{{route('contact')}}" class="nav-link">تماس با ما</a></li>
                    </ul>
                </li>
                <li><a href="{{route('discuss.index')}}" class="nav-link">پرسش و پاسخ برنامه نویسی</a></li>
            </ul>
        </nav>
    </div>

</header>
