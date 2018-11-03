@component('mail::message')
# active your account
please active your account.

The body of your message.

@component('mail::button', ['url' => Route('auth.active', [
            'token' => $user->activation_token,
            'email' => $user->email
            ])
        ])
Active
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
