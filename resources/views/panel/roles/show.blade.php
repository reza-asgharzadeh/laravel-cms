<x-panel-layout>
    <div class="right_col" role="main">
        <div>
            <div class="page-title">
                <div class="title_left">
                    <h3>
                        <small>نقش ها و دسترسی ها</small>
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
                                <small>اختصاص دسترسی به نقش</small>
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
                            <form action="{{route('set.permissions.store',$role->id)}}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                @csrf
                                <div style="display: flex; justify-content: space-evenly">
                                    <div>
                                        <span class="text-success h4">نقش کاربری:</span><br><br>
                                        <div class="h4">{{$role->getRoleName()}}</div>
                                    </div>
                                    <div>
                                        <span class="text-success h4">سطوح دسترسی:</span><br><br>
                                        <div>
                                            @foreach($permissions as $permission)
                                                <input type="checkbox" name="permission_id[]" value="{{$permission->id}}" {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}> <span style="margin-left: 2.5rem" class="h4">{{$permission->getPermissionName()}}</span>
                                                <br>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary">ویرایش</button>
                                        <a href="{{route('roles.index')}}" class="btn btn-danger">انصراف</a>
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
        <script src="{{asset('assets/panel/js/sweetalert2.all.min.js')}}"></script>
    </x-slot>
</x-panel-layout>
