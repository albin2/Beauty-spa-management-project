<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeDetails extends Model
{
    //
    protected $table = 'employedetails';
    
        protected $fillable = [
            'id', 'fname', 'lname','qualification','experience','bio','city','gender','number','image','Role',
        ];
}
