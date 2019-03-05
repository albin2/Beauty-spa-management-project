<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleave extends Model
{
    //
    protected $table = 'empleave';
    
        protected $fillable = [
            'id', 'leavedate','reson','empid','status',
        ];
}
