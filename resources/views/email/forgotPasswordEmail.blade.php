   @component('mail::message')
       Hi {{ $user->name }},
       You’re receiving this because we received a password reset request for your account.
       @component('mail::button', ['url' => url('reset/' . $user->remember_token)])
           Reset Your Password
       @endcomponent
       If you didn’t request a password reset, you can safely ignore this email.
       Thanks,<br>
       {{ config('app.name') }}
   @endcomponent
