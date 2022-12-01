<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremiumInviteUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premium_invite_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('premium_user_id')->unsigned()->index();
            $table->foreign('premium_user_id')->references('id')->on('users');
            $table->string('email');
            $table->string('name');
            $table->bigInteger('attached_user_id')->nullable();
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
        Schema::dropIfExists('premium_invite_users');
    }
}
