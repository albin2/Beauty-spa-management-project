<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    
    protected $fillable = [
        'categeory','productname','proddecr','profor','quantity','aplarea','stock','price','image','status',
    ];
//
}
