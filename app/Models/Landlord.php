<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class Landlord extends Model
{
    use HasFactory,HasRoles;

    protected $fillable = [
        'name',
        'password',
        'email',
      'business_license',
      'property_count',  
    ];
    protected $hidden = [
        'business_license',
        'password',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function listings()
    {
        return $this->hasMany(Listing::class);
    }


}
