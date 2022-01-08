<x-panel-layout>
    <x-slot name="links">
        <style>
            .ck-editor__editable {
                min-height: 200px;
            }
        </style>
    </x-slot>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>سیستم پرسش و پاسخ</h3>
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
                                <small>پرسش و پاسخ</small>
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
                                @foreach($questions as $question)
                                    @foreach($question->children as $child)
                                    <br>
                                    <div style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;padding: 30px 15px;width: 70%;margin: auto;  display: grid;grid-template-columns: auto auto;">
                                        <div><i class="fa fa-user"></i> {{$child->user->name}}:</div>
                                        <div style="text-align: left"><i class="fa fa-clock-o"></i> {{$child->created_at->diffForHumans()}}</div>
                                        <div style="margin-top: 10px">{!! $child->answer !!}</div>
                                    </div>
                                    @endforeach
                                @endforeach
                            <br>
                            <form action="{{route('answers.store',$question->id)}}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="answer">پاسخ
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <textarea id="answer" name="answer"
                                                  class="form-control col-md-7 col-xs-12"></textarea>
                                    </div>
                                    @error('answer')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary">ثبت</button>
                                        <a href="{{route('tickets.index')}}" class="btn btn-danger">انصراف</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/panel/js/ckeditor.js')}}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#answer' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
</x-panel-layout>
