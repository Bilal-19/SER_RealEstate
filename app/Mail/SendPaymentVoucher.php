<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendPaymentVoucher extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $emailMessage;
    public $subject;
    public $checkIn;
    public $checkOut;
    public $location;

    public $perNightPrice;

    public $vatAmount;

    public $totalStay;
    public function __construct($message, $subject, $checkIn, $checkOut, $location, $perNightPrice, $vatAmount, $totalStay)
    {
        $this->emailMessage = $message;
        $this->subject = $subject;
        $this->checkIn = $checkIn;
        $this->checkOut = $checkOut;
        $this->location = $location;
        $this->perNightPrice = $perNightPrice;
        $this->vatAmount = $vatAmount;
        $this->totalStay = $totalStay;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Mail.Voucher',
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
