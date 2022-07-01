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
        Schema::create('file', function (Blueprint $table) {
            $table->id("file_id");
            $table->foreignId("user_id");
            $table->string("surat_kesehatan");
            $table->string("cv");
            $table->string("ijazah");
            $table->string("ktp");
            $table->string("skck");
            $table->string("sertifikasi");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file');
    }
};
