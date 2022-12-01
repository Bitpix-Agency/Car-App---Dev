<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('make_id')->nullable()->index();
            $table->bigInteger('model_id')->nullable()->index();
            $table->string('body_type')->nullable()->index();
            $table->decimal('min_price')->nullable()->index();
            $table->integer('mileage')->nullable()->index();
            $table->integer('year')->nullable()->index();
            $table->integer('reg_no')->nullable()->index();
            $table->integer('fuel_type_id')->nullable()->index();
            $table->integer('features')->nullable()->index();
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
        Schema::dropIfExists('alerts');
    }
}
