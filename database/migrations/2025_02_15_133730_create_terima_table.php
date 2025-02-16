<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Mobil sudah dikembalikan
 */

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terimas', function (Blueprint $table) {
            $table->id();
            $table->string('penyewa');
            $table->string('kd_mobil');
            $table->unsignedInteger('id_supir');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->unsignedInteger('diskon');
            $table->unsignedInteger('total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terimas');
    }
};
