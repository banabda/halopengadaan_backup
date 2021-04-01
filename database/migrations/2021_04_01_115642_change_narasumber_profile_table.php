<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNarasumberProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('narasumber_profile', function (Blueprint $table) {
            $table->dropColumn('keahlian_utama');
            $table->dropColumn('keahlian_pendukung');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('narasumber_profile', function (Blueprint $table) {
            $table->dropColumn('keahlian_utama');
            $table->dropColumn('keahlian_pendukung');
        });
    }
}
