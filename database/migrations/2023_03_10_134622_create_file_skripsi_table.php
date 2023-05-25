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
        Schema::create('file_skripsi', function (Blueprint $table) {
            $table->bigInteger('kode_skripsi');
            $table->string('ta_cover')->nullable();
            $table->string('ta_abstrak')->nullable();
            $table->string('lokasi');

            $table->foreign('kode_skripsi')->references('kode_skripsi')->on('skripsi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_skripsi');
    }
};
