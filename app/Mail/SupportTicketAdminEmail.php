<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SupportTicketAdminEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $userName;
    protected $supportTicket;

    /**
     * Create a new message instance.
     */
    public function __construct(string $userName, $supportTicket)
    {
        $this->userName = $userName;
        $this->supportTicket = $supportTicket;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "A Support Ticket is opened by $this->userName",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.admin-support-ticket',
            with: [
                'userName' => $this->userName,
                'supportTicket' => $this->supportTicket,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
