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
        Schema::create('file_kp', function (Blueprint $table) {
            $table->string('kode_doc');
            $table->string('tahun', 10);
            $table->string('cover')->nullable();
            $table->string('file_abstrak')->nullable();

            $table->foreign('kode_doc')->references('kode_doc')->on('kp')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_kp');
    }
};
