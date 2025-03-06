<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        "payment_id",
        "status",
        "amount",
        "currency",
    ];
    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    }
    
}
