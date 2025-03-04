<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'landlord_id',
        'name',
        'price',
        'location',
        'startdate',
        'enddate',
        'city',
        'country',
        'equipments',
        'description',
        'persons',
        'rooms',
        'type',
    ];
    protected $dates = ['deleted_at'];

    public function landlord()
    {
        return $this->belongsTo(landlord::class);
    }
    public function favoriteTourists()
    {
        return $this->belongsToMany(Tourist::class,"favorites","listing_id","tourist_id");
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

}
