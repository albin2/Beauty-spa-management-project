<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'regist';

    protected $fillable = [
        'fname', 'lname', 'DOB','city','gender','contact','proimg',
    ];


    //relationship
    public function userLogin(){
       return $this->belongsTo('App\User');
    }
}
