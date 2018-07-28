@component('mail::message')
Please activate your account

@component('mail::button', ['url' => route('activation.activate', $token)])
Activate
@endcomponent
Thanks, {{ config('app.name') }}
@endcomponent
