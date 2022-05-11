@if($alert)
<div style="background: {{$alert->bg_color}}; color: {{$alert->title_color}}" class="alert alert-dismissible fade show m-0 p-2" role="alert">
    <div class="d-flex flex-column flex-lg-row justify-content-evenly align-items-center text-center">
        <div>
            <span class="mx-2 h5"><strong>{{$alert->title}}</strong></span><a style="background: {{$alert->btn_bg_color}}; color: {{$alert->btn_color}}" href="{{$alert->link}}" target="_blank" class="btn" onMouseOver="this.style.background='{{$alert->btn_bg_hover_color}}'" onMouseOut="this.style.background='{{$alert->btn_bg_color}}'"><strong>{{$alert->btn_txt}}</strong></a>
        </div>
        <div class='countdown h4 m-0' data-date="{{$alert->expiry_date->format('Y-m-d')}}" data-time="{{$alert->expiry_date->format('H:i:s')}}">
            <ul style="color: {{$alert->title_color}}" class="list-unstyled m-0">
                <li class="d-inline-block h5 m-0"><span class="seconds">00</span><p class="m-0">ثانیه</p></li>
                <li class="align-top d-inline-block">:</li>

                <li class="d-inline-block h5 m-0"><span class="minutes">00</span><p class="m-0">دقیقه</p></li>
                <li class="align-top d-inline-block">:</li>

                <li class="d-inline-block h5 m-0"><span class="hours">00</span><p class="m-0">ساعت</p></li>
                <li class="align-top d-inline-block">:</li>

                <li class="d-inline-block h5 m-0"><span class="days">00</span><p class="m-0">روز</p></li>
            </ul>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
