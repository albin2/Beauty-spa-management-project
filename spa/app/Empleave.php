<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleave extends Model
{
    //
    protected $table = 'empleave';
    public $primaryKey= 'leaveid';
        protected $fillable = [
             'id','leavedate','reson','empid','status',
        ];
}
