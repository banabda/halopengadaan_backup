<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->integer('from')->unsigned();
            $table->integer('to')->unsigned();
            $table->boolean('read')->default(false);
            $table->boolean('is_narasumber')->default(false);
            $table->text('text');
            $table->string('ticket')->nullable();
            $table->string('type')->default('text');
            $table->string('path')->nullable();
            $table->string('file_name')->nullable();
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
        Schema::dropIfExists('chats');
    }
}
