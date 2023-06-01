<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PhysicianApprovalEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(private string $recipientEmail, private string $recipientFullName, private string $recipientDesignation)
    {
        //
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->to($this->recipientEmail)
            ->subject('Physician Approval Email')
            ->markdown('emails.physician_approval_email')
            ->with([
                'recipientFullName' => $this->recipientFullName,
                'recipientDesignation' => $this->recipientDesignation,
            ]);
    }



    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */


}
