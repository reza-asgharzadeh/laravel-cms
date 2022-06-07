<div class="h5 mb-3">
    نتایج جستجو برای: {{request('search')}}
</div>
<div class="d-flex bg-light shadow rounded-3 p-2 mb-3">
    <a class="mx-2 rounded-3 text-muted p-2 {{request('type') == 'post' ? 'active-search' : ''}}" href="{{route('search',['search'=>request('search'),'type'=>'post'])}}"><i class="fa fa-lg fa-book mx-2"></i>مقالات</a>
    <a class="mx-2 rounded-3 text-muted p-2 {{request('type') == 'course' ? 'active-search' : ''}}" href="{{route('search',['search'=>request('search'),'type'=>'course'])}}"><i class="fa fa-lg fa-graduation-cap mx-2"></i>دوره‌ها</a>
</div>
