<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('regno');
            $table->text('post_desc');
            $table->float('price', 20);
            $table->boolean('is_bid')->default(0);
            $table->bigInteger('make_id')->unsigned()->index();
            $table->foreign('make_id')->references('id')->on('makes');
            $table->bigInteger('model_id')->unsigned()->index();
            $table->foreign('model_id')->references('id')->on('models');
            $table->float('mileage', 20);
            $table->string('doors');
            $table->string('type');
            $table->integer('seats');
            $table->string('transition');
            $table->string('engine');
            $table->integer('year');
            $table->integer('owners')->nullable();
            $table->string('location');
            $table->boolean('is_sold')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_delete')->default(0);
            $table->dateTime('sold_date')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
