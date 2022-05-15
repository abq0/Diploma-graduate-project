<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_form', function (Blueprint $table) {
            $table->id();
            $table->string('firstName',255);
            $table->string('lastName',255);
            $table->string('email',255);
            $table->string('mobileNumber',11);
            $table->bigInteger('city')->unsigned();
            $table->string('officeName',255);
            $table->bigInteger('officeCity')->unsigned();
            $table->string('district',300);
            $table->string('street',300);
            $table->string('additionalInformation',255);
            $table->bigInteger('status')->unsigned();
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
        Schema::dropIfExists('application_form');
    }
}
