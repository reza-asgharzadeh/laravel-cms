<x-panel-layout>
    <x-slot name="links">
        <link href="{{asset('assets/panel/css/datetimepicker.css')}}" rel="stylesheet">
    </x-slot>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>
                        <small>ایجاد نوار اطلاع رسانی</small>
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
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                                <small>نوار اطلاع رسانی</small>
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
                            <form action="{{route('alerts.store')}}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="title">متن اطلاع رسانی
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="title" name="title"
                                               class="form-control col-md-7 col-xs-12" value="{{old('title')}}">
                                    </div>
                                    @error('title')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="btn_txt">متن دکمه اطلاع رسانی
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="btn_txt" name="btn_txt"
                                               class="form-control col-md-7 col-xs-12" value="{{old('btn_txt')}}">
                                    </div>
                                    @error('btn_txt')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="link">لینک اطلاع رسانی
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="link" name="link"
                                               class="form-control col-md-7 col-xs-12" value="{{old('link')}}">
                                    </div>
                                    @error('link')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="result"> تاریخ انقضاء اطلاع رسانی
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div id="picker"></div>
                                        <input type="hidden" id="result" name="expiry_date" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    @error('expiry_date')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="title_color">رنگ متن اطلاع رسانی
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-1 col-sm-6 col-xs-12">
                                        <input type="color" id="title_color" name="title_color"
                                               class="form-control col-md-7 col-xs-12" value="{{old('title_color')}}">
                                    </div>
                                    @error('title_color')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="btn_color">رنگ متن دکمه اطلاع رسانی
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-1 col-sm-6 col-xs-12">
                                        <input type="color" id="btn_color" name="btn_color"
                                               class="form-control col-md-7 col-xs-12" value="{{old('btn_color')}}">
                                    </div>
                                    @error('btn_color')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="btn_bg_color">رنگ پس زمینه دکمه اطلاع رسانی
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-1 col-sm-6 col-xs-12">
                                        <input type="color" id="btn_bg_color" name="btn_bg_color"
                                               class="form-control col-md-7 col-xs-12" value="{{old('btn_bg_color')}}">
                                    </div>
                                    @error('btn_bg_color')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="btn_bg_hover_color">رنگ پس زمینه نشانگر دکمه اطلاع رسانی
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-1 col-sm-6 col-xs-12">
                                        <input type="color" id="btn_bg_hover_color" name="btn_bg_hover_color"
                                               class="form-control col-md-7 col-xs-12" value="{{old('btn_bg_hover_color')}}">
                                    </div>
                                    @error('btn_bg_hover_color')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="bg_color">رنگ پس زمینه اطلاع رسانی
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-1 col-sm-6 col-xs-12">
                                        <input type="color" id="bg_color" name="bg_color"
                                               class="form-control col-md-7 col-xs-12" value="{{old('bg_color')}}">
                                    </div>
                                    @error('bg_color')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary">ثبت</button>
                                        <a href="{{route('alerts.index')}}" class="btn btn-danger">انصراف</a>
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
        <script src="{{asset('assets/panel/js/datetimepicker.js')}}"></script>
        <script src="{{asset('assets/panel/js/moment-with-locales.min.js')}}"></script>
        <script>
            $(document).ready( function () {
                $('#picker').dateTimePicker();
                $('#picker-no-time').dateTimePicker({ showTime: false, dateFormat: 'DD/MM/YYYY', title: 'Select Date'});
            })
        </script>
    </x-slot>
</x-panel-layout>
