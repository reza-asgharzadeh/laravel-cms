<x-panel-layout>
    <x-slot name="links">
        <link href="{{asset('assets/panel/css/profile.css')}}" rel="stylesheet">
    </x-slot>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>
                        <small>پروفایل کاربر</small>
                    </h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="جست و جو برای...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">برو!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                @include('_partials.panel.edit_profile_tabs')
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                                تغییر رمز عبور
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">تنظیمات 1</a>
                                        </li>
                                        <li><a href="#">تنظیمات 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br/>
                            <form action="{{route('account.password.update',auth()->user()->id)}}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="old_password">رمز عبور فعلی
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group input-group-md">
                                            <input dir="ltr" type="password" id="old_password" name="old_password" class="form-control col-md-7 col-xs-12" aria-describedby="sizing-addon1">
                                            <span class="span-show-old-password input-group-addon btn btn-sky border-0" id="sizing-addon1">
                                                <i class="i-show-old-password fa fa-lg fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @error('old_password')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_password">رمز عبور جدید
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group input-group-md">
                                            <input dir="ltr" type="password" id="new_password" name="new_password" class="form-control col-md-7 col-xs-12" aria-describedby="sizing-addon1">
                                            <span class="span-show-new-password input-group-addon btn btn-sky border-0" id="sizing-addon1">
                                                <i class="i-show-new-password fa fa-lg fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @error('new_password')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary">ویرایش</button>
                                        <a href="{{route('account.password')}}" class="btn btn-danger">انصراف</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="scripts">
        <script src="{{asset('assets/panel/js/profile.js')}}"></script>
        <script src="{{asset('assets/panel/js/sweetalert2.all.min.js')}}"></script>
        <script>
            $(".span-show-old-password").on('click', function () {
                var oldPasswordInput = document.getElementById('old_password');
                var i = $(".i-show-old-password");

                if (oldPasswordInput.type === 'password') {
                    oldPasswordInput.type = 'text';
                    i.removeClass("fa-eye");
                    i.addClass("fa-eye-slash");
                } else {
                    oldPasswordInput.type = 'password';
                    i.removeClass("fa-eye-slash");
                    i.addClass("fa-eye");
                }
            });

            $(".span-show-new-password").on('click', function () {
                var newPasswordInput = document.getElementById('new_password');
                var i = $(".i-show-new-password");

                if (newPasswordInput.type === 'password') {
                    newPasswordInput.type = 'text';
                    i.removeClass("fa-eye");
                    i.addClass("fa-eye-slash");
                } else {
                    newPasswordInput.type = 'password';
                    i.removeClass("fa-eye-slash");
                    i.addClass("fa-eye");
                }
            });
        </script>
    </x-slot>
</x-panel-layout>
