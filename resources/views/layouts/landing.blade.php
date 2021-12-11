<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('_partials.landing.links')
    {{$links ?? ''}}
</head>
<body>
@include('_partials.landing.header')
{{$slot}}
@include('_partials.landing.footer')
@include('_partials.landing.scripts')
{{$scripts ?? ''}}
</body>
</html>
