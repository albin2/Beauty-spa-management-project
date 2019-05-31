<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    protected $table = 'feedback';
    public $primaryKey= 'feedid';
        protected $fillable = [
            'userid','productfeed','productid','feeddate','stars'
        ];
}
