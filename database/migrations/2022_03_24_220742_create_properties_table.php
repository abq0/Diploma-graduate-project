<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('office_id')->unsigned();
            $table->bigInteger('category')->unsigned();
            $table->string('paymentType',100);
            $table->string('title',300);
            $table->text('description');
            $table->string('area',255);
            $table->string('district',300);
            $table->string('street',300);
            $table->string('ownerName',300);
            $table->integer('roomsNum');
            $table->integer('kitchensNum');
            $table->string('mobileNumber',11);
            $table->integer('hasElevator');
            $table->integer('hasPool');
            $table->integer('hasGarage');
            $table->integer('hasYard');
            // leafletjs map
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
        Schema::dropIfExists('properties');
    }
}
