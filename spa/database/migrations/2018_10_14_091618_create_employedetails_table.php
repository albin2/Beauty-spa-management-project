<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployedetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employedetails', function (Blueprint $table) {
            $table->integer('id')->index();
            $table->string('fname');
            $table->string('lname');
            $table->date('dob');
            $table->string('city');
            $table->string('gender');
            $table->string('number');
            $table->string('image');
            $table->string('Role');
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
        Schema::dropIfExists('employedetails');
    }
}
