<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('apple_product_id')->nullable();
            $table->string('stripe_product_id')->nullable();
            $table->string('subscription_title');
            $table->text('subscription_description');
            $table->float('subscription_amount');
            $table->float('members_price');
            $table->integer('agency_limit')->nullable();
            $table->integer('stripe_members_price_id')->nullable();
            $table->bigInteger('membership_type')->unsigned()->index();
            $table->foreign('membership_type')->references('id')->on('membership_types');
            $table->boolean('status')->default(true);
            $table->integer('trial_length')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memberships');
    }
}
