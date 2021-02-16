<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->integer('user_id');
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->string('no_hp');
            $table->text('alamat_rumah');
            $table->text('alamat_kerja');
            $table->string('jenis_kerja');
            $table->string('status');
            $table->string('is_complete');
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
        Schema::dropIfExists('profile');
    }
}
