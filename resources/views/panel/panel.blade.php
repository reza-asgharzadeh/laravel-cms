<x-panel-layout>
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row tile_count text-center">
            @if(auth()->user()->role_id == 1)
            <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
                <span class="count_top"><i class="fa-x fa-users"></i> تعداد کاربران</span><br><br>
                <div class="count green">{{$users_count}}</div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
                <span class="count_top"><i class="fa-x fa-comments"></i> تعداد نظرات</span><br><br>
                <div class="count green">{{$comments_count}}</div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
                <span class="count_top"><i class="fa-x fa-edit"></i> تعداد مقالات</span><br><br>
                <div class="count green">{{$posts_count}}</div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
                <span class="count_top"><i class="fa-x fa-graduation-cap"></i> تعداد دوره ها</span><br><br>
                <div class="count green">{{$courses_count}}</div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
                <span class="count_top"><i class="fa-x fa-plus"></i> تعداد فصل ها</span><br><br>
                <div class="count green">{{$chapters_count}}</div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
                <span class="count_top"><i class="fa-x fa-television"></i> تعداد جلسات دوره</span><br><br>
                <div class="count green">{{$episodes_count}}</div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
                <span class="count_top"><i class="fa-x fa-list"></i> تعداد دسته بندی ها</span><br><br>
                <div class="count green">{{$categories_count}}</div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
                <span class="count_top"><i class="fa-x fa-tags"></i> تعداد برچسب ها</span><br><br>
                <div class="count green">{{$tags_count}}</div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
                <span class="count_top"><i class="fa-x fa-lock"></i> تعداد نقش ها</span><br><br>
                <div class="count green">{{$roles_count}}</div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
                <span class="count_top"><i class="fa-x fa-lock"></i> تعداد دسترسی ها</span><br><br>
                <div class="count green">{{$permissions_count}}</div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
                <span class="count_top"><i class="fa-x fa-ticket"></i> تعداد تیکت ها</span><br><br>
                <div class="count green">{{$tickets_count}}</div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 tile_stats_count">
                <span class="count_top"><i class="fa-x fa-question-circle"></i> تعداد پرسش ها</span><br><br>
                <div class="count green">{{$questions_count}}</div>
            </div>
            @else
                <div class="col-md-12">
                    <h2 class="count_top"><i class="fa fa-lg fa-user"></i> {{auth()->user()->name}} عزیز خوش آمدید. </h2><br><br>
                    <h3 class="count green">این قسمت به زودی تکمیل می‌شود.</h3>
                </div>
            @endif
        </div>
        <!-- /top tiles -->
    </div>
</x-panel-layout>
