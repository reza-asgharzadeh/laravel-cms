<x-panel-layout>
    <x-slot name="links">
        <link href="{{asset('assets/panel/css/tags.css')}}" rel="stylesheet">
    </x-slot>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>
                        <small>ویرایش مقاله سایت</small>
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
                                <small>ویرایش مقاله</small>
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
                            <form action="{{route('posts.update',$post->id)}}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" autocomplete="on">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">حالت نمایش
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name="is_approved">
                                            <option value="0" {{!$post->is_approved ? 'selected' : ''}}>پیش نویس</option>
                                            <option value="1" {{$post->is_approved ? 'selected' : ''}}>انتشار</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="title">عنوان مقاله
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="title" name="title"
                                               class="form-control col-md-7 col-xs-12" value="{{$post->title}}">
                                    </div>
                                    @error('title')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="slug">لینک
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="slug" name="slug"
                                               class="form-control col-md-7 col-xs-12" value="{{$post->slug}}">
                                    </div>
                                    @error('slug')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="description">توضیحات کوتاه
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea id="description" name="description" class="form-control col-md-7 col-xs-12">{{$post->description}}</textarea>
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
                                               class="form-control col-md-7 col-xs-12" value="{{$post->keywords}}">
                                    </div>
                                    @error('keywords')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tags_1">ورودی برچسب
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <ul class="tags">
                                            <li class="tagAdd taglist">
                                                <input type="text" id="search-field" value="">
                                            </li>
                                        </ul>
                                        <div style="display: block; overflow: auto; height: 120px">
                                            @foreach($tags as $tag)
                                                <div id="suggestions-container">{{in_array($tag->id, $postTags) ? "● $tag->name" : $tag->name}}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @error('tags')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">دسته بندی ها
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div style="display: block; overflow: auto; height: 120px">
                                            @foreach($categories as $category)
                                                <div id="suggestions-container"><input type="checkbox" name="categories[]" value="{{$category->id}}" {{ in_array($category->id, $postCategories) ? 'checked' : '' }}><span style="margin-right: 1rem">{{$category->name}}</span></div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @error('categories')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="banner">بنر</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="file" id="banner" name="banner" accept="image/*"
                                               class="form-control col-md-7 col-xs-12" value="{{$post->banner}}">
                                    </div>
                                    @error('banner')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="img_alt">متن تصویر شاخص
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="img_alt" name="img_alt"
                                               class="form-control col-md-7 col-xs-12" value="{{$post->img_alt}}">
                                    </div>
                                    @error('img_alt')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="content">متن مقاله
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                        <textarea id="content" name="content" class="form-control col-md-7 col-xs-12">{{$post->content}}</textarea>
                                    </div>
                                    @error('content')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary">ویرایش</button>
                                        <a href="{{route('posts.index')}}" class="btn btn-danger">انصراف</a>
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
        <script src="{{asset('assets/panel/js/tagsInput.js')}}"></script>
    </x-slot>
</x-panel-layout>
