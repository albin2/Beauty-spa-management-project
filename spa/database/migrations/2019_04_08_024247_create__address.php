<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddress extends Migration
{
    
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->string('uid');
            $table->string('fname');
            $table->string('lname');
            $table->string('contact');
            $table->string('address');
            $table->string('state');
            $table->string('district');
            $table->string('post');
            $table->string('pincode');
            $table->string('landmark'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
  public function down()
    {Schema::dropIfExists('address');
    }
}
