<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PhysicianSessionBookedEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(private string $recipientEmail, private string $recipientFullName, private string $recipientDesignation, private string $patientName,private string $patientDesignation, private string $slotTime, private string $slotDate)
    {
        //
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->to($this->recipientEmail)
            ->subject('New Session Booking')
            ->markdown('emails.physician_session_booked_email')
            ->with([
                'recipientFullName' => $this->recipientFullName,
                'recipientDesignation' => $this->recipientDesignation,
                'patientName' => $this->patientName,
                'patientDesignation' => $this->patientDesignation,
                'slotTime' => $this->slotTime,
                'slotDate' => $this->slotDate,
            ]);
    }


}
