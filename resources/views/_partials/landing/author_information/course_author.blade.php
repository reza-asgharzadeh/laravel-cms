<div class="d-flex align-items-center mb-4 bg-sky p-2 rounded-4">
    <img class="border rounded-circle" src="{{$course->user->getProfile()}}" width="80px" height="80px" alt="{{$course->user->name}}">
    <div class="d-flex flex-column mx-2">
        <div>
            <span><strong>{{$course->user->name}}</strong></span>
            <span>{{$course->user->role_id == 1 ? '(مدیر سایت)' : ''}}</span>
        </div>
        @if($course->user->userInformation)
            <span>{{$course->user->userInformation->job}}</span>
            <span><small>{{$course->user->userInformation->about_me}}</small></span>
        @endif
    </div>
</div>
