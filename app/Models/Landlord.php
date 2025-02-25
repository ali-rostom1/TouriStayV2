<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Landlord extends Model
{
    use HasFactory;

    protected $fillable = [
      'business_license',
      'property_count',  
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

}
