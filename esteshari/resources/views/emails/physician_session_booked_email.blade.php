@component('mail::message')
# New Session Booking

Dear {{ $recipientFullName }}, {{$recipientDesignation}}

You have a new booking by patient {{$patientDesignation }} {{$patientName }} on {{$slotDate}}, {{$slotTime}}. You can view all of the necessary details along with the video conference meeting link on the platform in your "My Appointments" > "Upcoming Appointments" section.

If you have any questions, please feel free to contact us.

@component('mail::button', ['url' => route('login')])
    View Booking Details
@endcomponent


Thank you,

Esteshari Team
@endcomponent
