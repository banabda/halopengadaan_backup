<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameProfileTableToUsersProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('profile', 'users_profile');
        Schema::table('users_profile', function (Blueprint $table) {
            $table->dropColumn('alamat_kerja');
            $table->dropColumn('alamat_rumah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('profile', 'users_profile');
        Schema::table('users_profile', function (Blueprint $table) {
            $table->dropColumn('alamat_kerja');
            $table->dropColumn('alamat_rumah');
        });
    }
}
