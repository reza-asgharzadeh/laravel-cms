<x-panel-layout>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>
                        <small>ویرایش جلسه سایت</small>
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
                                <small>ویرایش جلسه</small>
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
                            <form action="{{route('episodes.update',$episode->id)}}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">نام جلسه
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="name" name="name"
                                               class="form-control col-md-7 col-xs-12" value="{{$episode->name}}">
                                    </div>
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="slug">آدرس
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="slug" name="slug"
                                               class="form-control col-md-7 col-xs-12" value="{{$episode->slug}}">
                                    </div>
                                    @error('slug')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="downloadUrl">لینک دانلود
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="downloadUrl" name="downloadUrl"
                                               class="form-control col-md-7 col-xs-12" value="{{$episode->downloadUrl}}">
                                    </div>
                                    @error('downloadUrl')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="time">مدت زمان جلسه
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="time" name="time"
                                               class="form-control col-md-7 col-xs-12" value="{{$episode->time}}">
                                    </div>
                                    @error('time')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">قابلیت نمایش
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name="display">
                                            <option value="0" {{!$episode->display ? 'selected' : ''}}>نمایش در صورت خرید دوره</option>
                                            <option value="1" {{$episode->display ? 'selected' : ''}}>نمایش برای همه</option>
                                        </select>
                                    </div>
                                    @error('display')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">نام فصل
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name="chapter_id">
                                            @foreach($chapters as $chapter)
                                            <option value="{{$chapter->id}}" {{$chapter->id == $episode->chapter_id ? 'selected' : ''}}>{{$chapter->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="description">توضیحات کوتاه
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea id="description" name="description" class="form-control col-md-7 col-xs-12">{{$episode->description}}</textarea>
                                    </div>
                                    @error('description')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="keywords">کلمات کلیدی
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="keywords" name="keywords"
                                               class="form-control col-md-7 col-xs-12" value="{{$episode->keywords}}">
                                    </div>
                                    @error('keywords')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="orders">ترتیب جلسه
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" id="orders" name="orders"
                                               class="form-control col-md-7 col-xs-12" value="{{$episode->orders}}">
                                    </div>
                                    @error('orders')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary">ویرایش</button>
                                        <a href="{{route('episodes.index')}}" class="btn btn-danger">انصراف</a>
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
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'content', {
                language: 'fa',
                filebrowserUploadUrl:'{{route("editor.upload",["_token"=>csrf_token()])}}',
                filebrowserUploadMethod:'form'
            });
        </script>
    </x-slot>
</x-panel-layout>
