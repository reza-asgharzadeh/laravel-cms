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
                @include('_partials.panel.profile_tabs')
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                                <small>ویرایش پروفایل</small>
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
                            <form action="{{route('user.communication.update',auth()->user()->id)}}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">آدرس وب‌سایت</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input dir="ltr" type="text" id="website" name="website"
                                               class="form-control col-md-7 col-xs-12" placeholder="https://example.com" value="{{$user->userInformation->website ?? old('website')}}">
                                    </div>
                                    @error('website')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="github">آدرس گیت‌هاب</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input dir="ltr" type="text" id="github" name="github"
                                               class="form-control col-md-7 col-xs-12" placeholder="https://github.com/..." value="{{$user->userInformation->github ?? old('github')}}">
                                    </div>
                                    @error('github')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="linkedin">آدرس لینکدین</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input dir="ltr" type="text" id="linkedin" name="linkedin"
                                               class="form-control col-md-7 col-xs-12" placeholder="https://linkedin.com/in/..." value="{{$user->userInformation->linkedin ?? old('linkedin')}}">
                                    </div>
                                    @error('linkedin')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telegram">آیدی تلگرام</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input dir="ltr" type="text" id="telegram" name="telegram"
                                               class="form-control col-md-7 col-xs-12" placeholder="@example" value="{{$user->userInformation->telegram ?? old('telegram')}}">
                                    </div>
                                    @error('telegram')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="instagram">آیدی اینستاگرام</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input dir="ltr" type="text" id="instagram" name="instagram"
                                               class="form-control col-md-7 col-xs-12" placeholder="@example" value="{{$user->userInformation->instagram ?? old('instagram')}}">
                                    </div>
                                    @error('instagram')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="twitter">آیدی توییتر</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input dir="ltr" type="text" id="twitter" name="twitter"
                                               class="form-control col-md-7 col-xs-12" placeholder="@example" value="{{$user->userInformation->twitter ?? old('twitter')}}">
                                    </div>
                                    @error('twitter')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary">ویرایش</button>
                                        <a href="{{route('user.communication')}}" class="btn btn-danger">انصراف</a>
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
