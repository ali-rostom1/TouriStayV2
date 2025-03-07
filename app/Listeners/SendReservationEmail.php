<?php

namespace App\Listeners;

use App\Events\ReservationPlaced;
use App\Mail\ReservationMail;
use App\Models\Reservation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendReservationEmail implements ShouldQueue
{
    public $tries = 3;
    public $timeout = 120;

    
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ReservationPlaced $event): void
    {
        Mail::to($event->transaction->reservation->tourist->email)->send(new ReservationMail($event->transaction));
    }
}
