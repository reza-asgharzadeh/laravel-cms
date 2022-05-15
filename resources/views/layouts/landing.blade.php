<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    @include('_partials.landing.meta_tag')
    @include('_partials.landing.links')
    {{$links ?? ''}}
</head>
<body>
@include('_partials.landing.header')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
{{$slot}}
@include('_partials.landing.footer')
@include('_partials.landing.scripts')
{{$scripts ?? ''}}
</body>
</html>
