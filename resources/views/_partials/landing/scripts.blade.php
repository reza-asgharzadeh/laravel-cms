{{--DropDown Header Navbar--}}
<script src="{{asset('assets/landing/js/bootstrap.bundle.min.js')}}"></script>

{{--Cart and Panel Toggle--}}
<script src="{{asset('assets/landing/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/landing/js/popper.min.js')}}"></script>

<script src="{{asset('assets/landing/js/bootstrap.min.js')}}"></script>
@if($alert)
    <script src="{{asset('/assets/landing/js/countdown.js')}}"></script>
@endif

<script src="{{asset('/assets/landing/js/navbar-toggler-jquery.sticky.js')}}"></script>
<script src="{{asset('/assets/landing/js/navbar-toggler-main.js')}}"></script>

<script>
    $("#btn-newsletter").on('click', function (e) {
        e.preventDefault();
        var input_newsletter = $('#input-newsletter').val();
        var regex = /[a-z0-9_.]+@((yahoo|gmail)\.com)/g;

        if($.trim(input_newsletter).length <= 0){
            $("#message").html("ایمیلتان را وارد نکرده اید.").addClass("text-danger");
            return false;
        }

        if (!regex.test(input_newsletter)){
            $("#message").html("فرمت دامنه ایمیل فقط باید gmail یا yahoo باشد.").addClass("text-danger");
            return false;
        }
        $.ajax({
            url: '{{ route('newsletters.store') }}',
            method: "post",
            data: {
                _token: '{{ csrf_token() }}',
                email: input_newsletter
            },
            success: function (response) {
                $("#message").html(response.success).removeClass("text-danger").addClass("text-success");
            },
            error:function (){
                $("#message").html("شما با این ایمیل در خبرنامه عضو هستید.").addClass("text-danger");
            }
        });
    });
</script>
