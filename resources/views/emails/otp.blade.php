@component('mail::message')
# OTP

{{ $text }}

Your OTP: **{{ $code }}**
@endcomponent