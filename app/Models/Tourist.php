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
        $this->belongsTo(User::class);
    }

}