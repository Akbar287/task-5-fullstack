<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lowongan_user', function (Blueprint $table) {
            $table->id("lowongan_user_id");
            $table->foreignId("user_id");
            $table->foreignId("lowongan_id");
            $table->integer("skor")->nullable();
            $table->string("hasil_seleksi")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lowongan_user');
    }
};
