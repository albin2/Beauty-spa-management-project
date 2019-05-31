<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regist', function (Blueprint $table) {
            $table->integer('user_id')->index();
            $table->string('fname');
            $table->string('lname');
            $table->string('contact');
            $table->string('proimg');
            $table->string('height');
            $table->string('weight');
            $table->string('gender'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regist');
    }
}
