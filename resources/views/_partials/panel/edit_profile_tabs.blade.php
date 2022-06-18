<div class="d-flex mx-3 mb-2">
    <div class="mx-2"><a class="d-block border-light text-center p-1 rounded-4 {{Request::getRequestUri() == "/panel/profile/user/account-information" ? 'active-tab' : ''}}" href="{{route('account.information')}}"><i class="fa fa-lg fa-user mx-3"></i>اطلاعات کاربر</a></div>
    <div class="mx-2"><a class="d-block border-light text-center p-1 rounded-4 {{Request::getRequestUri() == "/panel/profile/user/user-information" ? 'active-tab' : ''}}" href="{{route('user.information')}}"><i class="fa fa-lg fa-info mx-3"></i>اطلاعات فردی</a></div>
    <div class="mx-2"><a class="d-block border-light text-center p-1 rounded-4 {{Request::getRequestUri() == "/panel/profile/user/user-communication" ? 'active-tab' : ''}}" href="{{route('user.communication')}}"><i class="fa fa-lg fa-address-book-o mx-3"></i>راه‌های ارتباطی</a></div>
    <div class="mx-2"><a class="d-block border-light text-center p-1 rounded-4 {{Request::getRequestUri() == "/panel/profile/user/account-password" ? 'active-tab' : ''}}" href="{{route('account.password')}}"><i class="fa fa-lg fa-key mx-3"></i>تغییر رمز عبور</a></div>
    <div class="mx-2"><a class="d-block border-light text-center p-1 rounded-4 {{Request::getRequestUri() == "/panel/activities" ? 'active-tab' : ''}}" href="{{route('activities.index')}}"><i class="fa fa-lg fa-calendar mx-3"></i>اطلاعات ورود</a></div>
</div>
