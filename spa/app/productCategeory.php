<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productCategeory extends Model
{
    //
    protected $table = 'productcategeory';
    
        protected $fillable = [
            'categeory',
        ];
    //
}
