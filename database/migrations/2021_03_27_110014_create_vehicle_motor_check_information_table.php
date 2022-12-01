<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleMotorCheckInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_motor_check_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('report_id');
            $table->string('vrm');
            $table->string('location');
            $table->string('user');
            $table->boolean('issue_finance')->default(false);
            $table->boolean('issue_mileage')->default(false);
            $table->boolean('issue_at_risk')->default(false);
            $table->boolean('issue_write_off')->default(false);
            $table->boolean('issue_condition_alerts')->default(false);
            $table->boolean('issue_scrapped')->default(false);
            $table->boolean('issue_stolen')->default(false);
            $table->boolean('issue_keepers')->default(false);
            $table->boolean('issue_plate_change')->default(false);
            $table->boolean('issue_colour_changes')->default(false);
            $table->boolean('issue_mot_history')->default(false);
            $table->boolean('issue_tax_and_sorn')->default(false);
            $table->boolean('issue_origin_and_use')->default(false);
            $table->longText('url');
            $table->longText('pdf');
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
        Schema::dropIfExists('vehicle_motor_check_information');
    }
}
