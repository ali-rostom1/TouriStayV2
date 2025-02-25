<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tourist extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'passport_number',
        'nationality'
    ];
    protected $hidden = [
        'passport_number',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function FavoriteListings()
    {
        return $this->belongsToMany(Listing::class,"favorites","tourist_id","listing_id");
    }

}