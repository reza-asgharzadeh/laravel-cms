<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{$title ?? env('APP_NAME')}}</title>
<meta name="description" content="{{$description ?? ''}}"/>
<meta name="keywords" content="{{$keywords}}" />
@if($pageUrl)
<link rel="canonical" href="{{$pageUrl}}" />
@endif
