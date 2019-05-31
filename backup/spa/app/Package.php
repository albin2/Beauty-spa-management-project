<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';
    
        protected $fillable = [
            'servename','packname','packdecr','packfor','benafits','timed','price','image','status',
        ];
    //
}
