@component('mail::message')
<p>
    <strong>
        We Received the request for reset password, if you didnt request then please ignore this email.
    </strong>
</p>

<p>
    <strong>
        To reset your password, please click the following link
    </strong>
</p>
<p>
    {{-- <strong>link </strong> <a href="{{url("https://vaccinedatav1-clone383061.ryd.wafaicloud.com/resetpassword/".$user->reset_token)}}">Reset Password</a> --}}
    <strong>link </strong> <a href="{{env('APP_FRONTEND_URL').$user->reset_token}}">Reset Password</a>
</p>


Regards<br>
{{ config('app.name') }}
@endcomponent