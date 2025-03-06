<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'tourist_id',
        'listing_id',
        'startdate',
        'enddate',
        'price',
    ];

    public function tourist()
    {
        return $this->belongsTo(Tourist::class);
    }
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
