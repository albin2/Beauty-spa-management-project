<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentDetails extends Model
{
    protected $table = 'paymentdetails';
    
        protected $fillable = [
            'payid','cardnumber','cardholder','amount','userid','cartid','status',
        ];
}
