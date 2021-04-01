<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNarasumberProfileKeahlianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('narasumber_profile_keahlian_utama', function (Blueprint $table) {
            $table->integer('bidang_id')->after('user_id');
            $table->dropColumn('barang_id');
        });

        Schema::table('narasumber_profile_keahlian_pendukung', function (Blueprint $table) {
            $table->integer('bidang_id')->after('user_id');
            $table->dropColumn('barang_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
