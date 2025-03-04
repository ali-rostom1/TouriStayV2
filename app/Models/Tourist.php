<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class Tourist extends Model
{
    use HasFactory,HasRoles;
    
    protected $fillable = [
        "name",
        "email",
        "password",
        'passport_number',
        'nationality'
    ];
    protected $hidden = [
        'passport_number',
        'password',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function favoriteListings()
    {
        return $this->belongsToMany(Listing::class,"favorites","tourist_id","listing_id");
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}