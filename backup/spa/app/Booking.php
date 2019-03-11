<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    
    protected $fillable = [
        'bdate', 'time','packid','servid','usname','emplid','duration','amount','status',
    ];
}
