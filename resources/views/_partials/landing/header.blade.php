<header>
    <nav class="navbar navbar-expand-lg shadow p-3 mb-5 bg-body rounded">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{asset('assets/landing/img/logo.png')}}" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
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
                <a href="{{route('register')}}" class="btn btn-gray m-1">ثبت نام</a>
                <a href="{{route('login')}}" class="btn btn-purple">ورود</a>
            </div>
        </div>
    </nav>
</header>
