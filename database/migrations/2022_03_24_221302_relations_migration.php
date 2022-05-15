<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelationsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('application_form', function (Blueprint $table) {
            $table->foreign('city')->references('id')->on('cities');
            $table->foreign('officeCity')->references('id')->on('cities');
            $table->foreign('status')->references('id')->on('status');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('city')->references('id')->on('cities');
            $table->foreign('office_id')->references('id')->on('offices');
        });

        Schema::table('offices', function (Blueprint $table) {
            $table->foreign('city')->references('id')->on('cities');
            $table->foreign('status')->references('id')->on('status');
        });

        Schema::table('properties_attachments', function (Blueprint $table) {
            $table->foreign('property_id')->references('id')->on('properties');
        });

        Schema::table('properties', function (Blueprint $table) {
            $table->foreign('office_id')->references('id')->on('offices');
            $table->foreign('category')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
