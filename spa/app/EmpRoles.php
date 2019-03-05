<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpRoles extends Model
{
    protected $table = 'role';
    
        protected $fillable = [
            'name'
        ];
}
