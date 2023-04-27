@component('mail::message')
# Verify Email

You have successfully created your account with us. Please click on the button below to set your password.

@component('mail::button', ['url' => route('provider.password.set', $user->email_token)])
Set your password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
