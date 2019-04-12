<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'regist';

    protected $fillable = [
       'uid','fname', 'lname','contact','proimg','height','weight','gender',
    ];


    //relationship
    public function userLogin(){
       return $this->belongsTo('App\User');
    }
}
