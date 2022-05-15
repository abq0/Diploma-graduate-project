<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefalutValuesForProperitesColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->integer('roomsNum')->default(0)->change();
            $table->integer('kitchensNum')->default(0)->change();
            $table->integer('hasElevator')->default(0)->change();
            $table->integer('hasPool')->default(0)->change();
            $table->integer('hasGarage')->default(0)->change();
            $table->integer('hasYard')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            //
        });
    }
}
