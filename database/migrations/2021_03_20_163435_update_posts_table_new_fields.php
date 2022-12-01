<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTableNewFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('drive')->nullable();
            $table->string('title')->nullable();
            $table->bigInteger('fuel_type_id')->nullable()->unsigned()->index();
            $table->foreign('fuel_type_id')->references('id')->on('fuel_types')->cascadeOnDelete();
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
            $table->dropColumn('uuid');
            $table->dropColumn('fuel_type_id');
        });
    }
}
