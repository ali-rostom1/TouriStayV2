<?php

namespace App\Http\Controllers;

use App\Events\ReservationPlaced;
use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use App\Models\Transaction;
use Illuminate\Http\Request;
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
}
