<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PatientSessionBookedEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(private string $recipientEmail, private string $recipientFullName, private string $recipientDesignation, private string $physicianName, private string $physicianDesignation, private string $slotTime, private string $slotDate)
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
            ->markdown('emails.patient_session_booked_email')
            ->with([
                'recipientFullName' => $this->recipientFullName,
                'recipientDesignation' => $this->recipientDesignation,
                'physicianName' => $this->physicianName,
                'physicianDesignation' => $this->physicianDesignation,
                'slotTime' => $this->slotTime,
                'slotDate' => $this->slotDate,
            ]);
    }


}
