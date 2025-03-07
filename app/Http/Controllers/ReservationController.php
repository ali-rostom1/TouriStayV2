<?php

namespace App\Http\Controllers;

use App\Events\ReservationPlaced;
use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReservationController extends Controller
{
    public function store(ReservationRequest $request)
    {
        $response = Session::get('response');
        $transaction = Transaction::create([
            'payment_id' => $response['id'],
            'status' => $response['status'],
            'amount' => $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'],
            'currency' => $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'],
        ]);
        $transaction->reservation()->create($request->all());
        
        $transaction->save();
        event(new ReservationPlaced($transaction));

        return redirect()
                ->intended()
                ->with('success', 'Transaction complete.');
    }

    public function myReservations()
    {

        $reservations = Reservation::with('tourist','listing')
        ->whereHas('listing',function($q){
            $q->where("landlord_id",Auth::user()->id);
        })
        ->paginate(10);
        return view("reservations",compact('reservations'));
    }
    public function index()
    {
        $reservations = Reservation::with('tourist','listing')->paginate(10);
        return view('admin.allReservations',compact('reservations'));
    }
}
