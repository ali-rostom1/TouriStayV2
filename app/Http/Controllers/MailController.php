<?php

namespace App\Http\Controllers;

use App\Mail\LandlordReservationMail;
use App\Mail\ReservationMail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendReservationMail(){
        
        $transaction = Transaction::with("reservation")->find(7);
        dd($transaction->reservation->listing->landlord->email);
        Mail::to('ali.rostom@outlook.fr')->send(new LandlordReservationMail($transaction));
    }
}
