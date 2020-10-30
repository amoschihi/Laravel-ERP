@component('mail::message')
# Password Reset Notification

The system administrator has successfully reset your password. 
Your new password is: <b>{{ $password }}</b> <br>
To change this password for security purposes, click forgot password in your next login.

<!-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent -->

Thanks,<br>
{{ config('app.name') }}
@endcomponent
