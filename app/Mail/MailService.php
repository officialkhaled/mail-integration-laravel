<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailService extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;

    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
//            to: $this->mailData['to_mail'],
            subject: $this->mailData['subject'],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: $this->mailData['view'],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
