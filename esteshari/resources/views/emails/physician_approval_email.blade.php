@component('mail::message')
# Physician Registration Request Approval

Dear {{ $recipientFullName }}, {{$recipientDesignation}}

Congratulations! Your physician registration request has been approved. You can now log in to your account and access the platform.

If you have any questions, please feel free to contact us.

@component('mail::button', ['url' => route('login')])
    Log In
@endcomponent


Thank you,

Esteshari Team
@endcomponent
