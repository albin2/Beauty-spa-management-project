<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cart extends Model
{
    protected $table = 'cart';
    public $primaryKey= 'cartid';
    protected $fillable = [
        'cartid','userid','satus','totalamount','bookingdate',
    ];
   
}
