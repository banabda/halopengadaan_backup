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
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('no_hp')->nullable();
            $table->text('alamat_rumah')->nullable();
            $table->text('alamat_kerja')->nullable();
            $table->string('jenis_kerja')->nullable();
            $table->string('status')->nullable();
            $table->string('is_complete')->nullable();
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
