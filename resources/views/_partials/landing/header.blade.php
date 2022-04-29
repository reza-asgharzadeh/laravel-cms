<header>
    <nav class="navbar navbar-expand-lg shadow p-3 mb-5 bg-body rounded">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{asset('assets/landing/img/logo.png')}}" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{route('landing')}}"> خانه </a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> مقالات </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            @foreach($categories as $category)
                            <li><a class="dropdown-item" href="#">  </a></li>
                            <li><a class="dropdown-item" href="{{route('category.post.show',$category->slug)}}"> {{$category->name}} &raquo; </a>
                                <ul class="submenu submenu-left dropdown-menu">
                                    @foreach($category->children as $child)
                                    <li><a class="dropdown-item" href="{{route('category.post.show',$child->slug)}}">{{$child->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> دوره ها </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            @foreach($categories as $category)
                                <li><a class="dropdown-item" href="#">  </a></li>
                                <li><a class="dropdown-item" href="{{route('category.course.show',$category->slug)}}"> {{$category->name}} &raquo; </a>
                                    <ul class="submenu submenu-left dropdown-menu">
                                        @foreach($category->children as $child)
                                            <li><a class="dropdown-item" href="{{route('category.course.show',$child->slug)}}">{{$child->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#"> درباره ما </a></li>
                    <li class="nav-item"><a class="nav-link" href="#"> تماس با ما </a></li>
                </ul>


                <div class="dropdown">
                    <button type="button" class="btn-cart" data-toggle="dropdown">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> سبد خرید <span id="count-basket" class="badge bg-danger">{{ count((array) session('cart')) }}</span>
                    </button>
                    <div class="dropdown-menu">
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


                <a href="{{route('register')}}" class="btn btn-gray m-1">ثبت نام</a>
                <a href="{{route('login')}}" class="btn btn-purple">ورود</a>
            </div>
        </div>
    </nav>
</header>
