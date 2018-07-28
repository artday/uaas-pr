@component('mail::message')
Please activate your account

@component('mail::button', ['url' => ''])
Activate {{ $token }}
@endcomponent
Thanks, {{ config('app.name') }}
@endcomponent
