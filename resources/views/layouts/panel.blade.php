<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="fontiran.com:license" content="Y68A9">
    <link rel="icon" href="{{asset('assets/panel/img')}}favicon.ico" type="image/ico"/>
    <title>Podera | پنل مدیریت  </title>
    @include('_partials.panel.links')
    {{$links ?? ''}}
</head>
<!-- /header content -->
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col hidden-print">
            <div class="left_col scroll-view">
                <div class="navbar nav_title text-center" style="border: 0;">
                    <a href="{{route('panel')}}" class="site_title"><span class="h6">پنل کاربری</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                        <div class="avatar-cover">
                            <img class="avatar-pic" src="{{auth()->user()->getProfile()}}">
                        </div>
                    <div class="profile_info">
                        <span>خوش آمدید,</span>
                        <h2>{{auth()->user()->name}}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                @include('_partials.panel.sidebar')
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="تنظیمات">
                        <i class="fa fa-lg fa-cog"></i>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="تمام صفحه" onclick="toggleFullScreen();">
                        <i class="fa fa-lg fa-arrows-alt"></i>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="قفل" class="lock_btn">
                        <i class="fa fa-lg fa-eye-slash"></i>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="خروج" href="login.html">
                        <i class="fa fa-lg fa-power-off"></i>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
            @include('_partials.panel.navigation')
        <!-- /top navigation -->
        <!-- /header content -->

        <!-- page content -->
        {{$slot}}
        <!-- /page content -->
    </div>
</div>

<!-- footer content -->
@include('_partials.panel.footer')
<!-- /footer content -->
<div id="lock_screen">
    <table>
        <tr>
            <td>
                <div class="clock"></div>
                <span class="unlock">
                    <span class="fa-stack fa-5x">
                      <i class="fa fa-square-o fa-stack-2x fa-inverse"></i>
                      <i id="icon_lock" class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                </span>
            </td>
        </tr>
    </table>
</div>

@include('_partials.panel.scripts')
{{$scripts ?? ''}}
@if(Session::has('status'))
    <script>
        Swal.fire({
            title: "{{Session::get('status')}}",
            icon: "success",
            button: "باشه",
            showConfirmButton: false,
            timer: 4000
        })
    </script>
@endif
</body>
</html>
