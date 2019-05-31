<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    public $primaryKey= 'id';
    
    protected $fillable = [
        'bdate', 'time','packid','servid','usname','emplid','duration','amount','status',
    ];
}
