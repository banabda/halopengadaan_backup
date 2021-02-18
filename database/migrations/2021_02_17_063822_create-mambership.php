<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMambership extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mambership', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_lengkap')->nullable();
            $table->string('email')->unique();
            $table->integer('no_wa');
            $table->string('tempat_kerja');
            $table->string('jenis');
            $table->string('status');
            $table->string('mambership');
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
        Schema::dropIfExists('mambership');
    }
}
