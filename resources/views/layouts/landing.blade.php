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
@if(Session::has('login-register'))
    <script src="{{asset('assets/panel/js/sweetalert2.all.min.js')}}"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: "{{Session::get('login-register')}}"
        })
    </script>
@endif
</body>
</html>
