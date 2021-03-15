<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTableInvoiceAndUserHasPaket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice', function (Blueprint $table) {
            $table->dropColumn('date_zoom');
        });

        Schema::table('user_has_paket', function (Blueprint $table) {
            $table->dropColumn('date_zoom');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice', function (Blueprint $table) {
            $table->dropColumn('date_zoom');
        });

        Schema::table('user_has_paket', function (Blueprint $table) {
            $table->dropColumn('date_zoom');
        });
    }
}
