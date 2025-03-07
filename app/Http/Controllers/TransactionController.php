<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with("reservation")->paginate(10);
        return view('admin.transactions',compact('transactions'));
    }
}
