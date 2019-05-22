@component('mail::message')
# New Owner: {{ $owner->owner}}

{{ $owner->animal}}

@component('mail::button', ['url' => url('/owners/' . $owner->id)])
View Owner
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
