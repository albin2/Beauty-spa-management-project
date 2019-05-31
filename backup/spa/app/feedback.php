<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    protected $table = 'feedback';
    
        protected $fillable = [
            'userid','productfeed','productid','feeddate'
        ];
}
