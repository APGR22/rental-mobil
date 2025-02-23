<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Mobil sedang disewa
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
        Schema::create('sewas', function (Blueprint $table) {
            $table->id();
            $table->string('penyewa');
            $table->string('mobil');
            $table->string('supir')->nullable();
            $table->date('tanggal_sewa');
            $table->date('tanggal_kembali');
            $table->unsignedInteger('dp');
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
        Schema::dropIfExists('sewas');
    }
};
