<?php

namespace App\Listeners;

use App\Events\ReservationPlaced;
use App\Mail\LandlordReservationMail;
use App\Models\Reservation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendLandlordReservationEmail implements ShouldQueue
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
        Mail::to($event->transaction->reservation->listing->landlord->email)->send(new LandlordReservationMail($event->transaction));
    }
}
