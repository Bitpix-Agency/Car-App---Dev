<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_information', function (Blueprint $table) {
            $table->id();
            $table->string('regno');
            $table->bigInteger('make_id')->unsigned()->index();
            $table->foreign('make_id')->references('id')->on('makes');
            $table->bigInteger('model_id')->unsigned()->index();
            $table->foreign('model_id')->references('id')->on('models');
            $table->bigInteger('fuel_id')->unsigned()->index();
            $table->foreign('fuel_id')->references('id')->on('fuel_types');
            $table->integer('doors');
            $table->string('type');
            $table->integer('seats');
            $table->string('year');
            $table->string('engine');
            $table->integer('owners');
            $table->string('transmission');
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
        Schema::dropIfExists('vehicle_information');
    }
}
