@component('mail::message')
# New registration by {{ $full_name }}

@foreach ($data as $key => $item)
**{{ ucwords(str_replace('_', ' ', $key)) }}: {{ $item }}**{{ "\n\n" }}
@endforeach

@endcomponent