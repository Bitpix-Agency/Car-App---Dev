<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('keys')->nullable();
            $table->string('service_history')->nullable();
            $table->string('dealer_history')->nullable();
            $table->string('vehicle_status')->nullable();
            $table->string('has_v5')->nullable();
            $table->integer('tread_1')->nullable();
            $table->integer('tread_2')->nullable();
            $table->integer('tread_3')->nullable();
            $table->integer('tread_4')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('keys');
            $table->dropColumn('service_history');
            $table->dropColumn('dealer_history');
            $table->dropColumn('vehicle_status');
            $table->dropColumn('has_v5');
            $table->dropColumn('tread_1');
            $table->dropColumn('tread_2');
            $table->dropColumn('tread_3');
            $table->dropColumn('tread_4');
        });
    }
}
