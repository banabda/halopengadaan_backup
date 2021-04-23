<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddedLastOnlineNarasumberProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('narasumber_profile', function (Blueprint $table) {
            $table->timestamp('last_online')->after('status')->nullable();
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
            $table->dropColumn('last_online');
        });
    }
}
