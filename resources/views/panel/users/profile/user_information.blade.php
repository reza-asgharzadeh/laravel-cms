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
                                ویرایش اطلاعات فردی
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
                            <form action="{{route('user.information.update',auth()->user()->id)}}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="birthday">تاریخ تولد</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="birthday" name="birthday"
                                               class="form-control col-md-7 col-xs-12" placeholder="1380/01/01" value="{{$user->userInformation->birthday ?? old('birthday')}}">
                                    </div>
                                    @error('birthday')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="job">عنوان شغلی یا حرفه</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="job" name="job"
                                               class="form-control col-md-7 col-xs-12" placeholder="شغل یا حرفه‌ای که در آن مشغول هستید (حداکثر 30 کاراکتر)." value="{{$user->userInformation->job ?? old('job')}}">
                                    </div>
                                    @error('job')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="about_me">درباره من</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea id="about_me" name="about_me" class="form-control col-md-7 col-xs-12" rows="5" placeholder="توضیحی کوتاه در مورد خودتان و حرفه‌ای که در آن تخصص دارید.">{{$user->userInformation->about_me ?? old('about_me')}}</textarea>
                                    </div>
                                    @error('about_me')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary">ویرایش</button>
                                        <a href="{{route('user.information')}}" class="btn btn-danger">انصراف</a>
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
    </x-slot>
</x-panel-layout>
