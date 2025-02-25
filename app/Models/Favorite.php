<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = [
        'tourist_id',
        'landlord_id',
    ];
    

    public function tourist()
    {
        $this->belongsTo(Tourist::class);
    }
    public function landlord()
    {
        $this->belongsTo(Landlord::class);
    }
    

}
