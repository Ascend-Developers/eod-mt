@component('mail::message')
<p>
<strong>
Your Account Has been Created
</strong>
</p>

<p>
<strong>Email </strong> {{$user->email}}
</p>
<p>
<strong>Password </strong> {{ $password }}
</p>
<p>
<strong>link </strong> https://ioc.ascend.com.sa/
</p>


Regards<br>
{{ config('app.name') }}
@endcomponent
