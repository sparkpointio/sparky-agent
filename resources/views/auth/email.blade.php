@component('mail::message')
    # Verify your email address

    Click the button below to verify your email address:

    @component('mail::button', ['url' => $url])
        Verify Email Address
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
