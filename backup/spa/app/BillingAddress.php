<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingAddress extends Model
{
    protected $table = 'address';

    protected $fillable = [
        'firstname', 'lastname','contact','address','state','district','post','pincode','landmark',
    ];


    //relationship
    public function userLogin(){
       return $this->belongsTo('App\User');
    }
}
