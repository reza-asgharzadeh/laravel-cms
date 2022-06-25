<x-panel-layout>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>
                        <small>کیف پول من</small>
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

            <div class="col-xs-12 col-lg-8">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            <small>اطلاعات حساب</small>
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

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>نام صاحب حساب</th>
                                    <th>موجودی حساب</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->wallet->value}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#flipFlop">
                                                <i class="fa fa-plus-circle"></i> افزایش موجودی
                                            </button>
                                            @error('price')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                            <!-- The modal -->
                                            <div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="modal-title" id="modalLabel">افزایش موجودی کیف پول</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('wallet.charge')}}" method="post">
                                                                @csrf
                                                                <input type="text" name="price" placeholder="مبلغ را به تومان وارد کنید.">
                                                                <button class="btn btn-success">پرداخت مبلغ</button>
                                                            </form>
                                                        </div>
                                                        <div style="text-align: right" class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">لغو</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
