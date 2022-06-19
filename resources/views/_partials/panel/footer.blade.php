<footer class="hidden-print">
    <div class="pull-left">
        پنل {{auth()->user()->role_id == 1 ? 'مدیریت' : 'کاربری'}} | {{env('APP_NAME')}}
    </div>
    <div class="clearfix"></div>
</footer>
