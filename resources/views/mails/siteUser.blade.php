@component('mail::message')

<p>
{{$message}}
</p>

Regards<br>
{{ config('app.name') }}
@endcomponent
