<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersProfileTableAddPhotoidSelfieDocument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->longText('photo_id_url')->nullable();
            $table->longText('selfie_url')->nullable();
            $table->longText('document_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->dropColumn('photo_id_url');
            $table->dropColumn('selfie_url');
            $table->dropColumn('document_url');
        });
    }
}
