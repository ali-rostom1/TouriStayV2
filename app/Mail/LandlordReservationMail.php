<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LandlordReservationMail extends Mailable
{
    use Queueable, SerializesModels;


    public $transaction;
    public $reservation;
    public $listing;
    public $tourist;
    public $landlord;

    /**
     * Create a new message instance.
     */
    public function __construct($transaction)
    {
        $this->transaction = $transaction;
        $this->reservation = $transaction->reservation;
        $this->listing = $this->reservation->listing;
        $this->tourist = $this->reservation->tourist;
        $this->landlord = $this->listing->landlord;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Landlord Reservation Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.landlordReservation',
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
