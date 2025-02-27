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
        Schema::create('akuns', function (Blueprint $table) {
            $table->id();
            $table->rememberToken(); //required by Laravel: https://stackoverflow.com/questions/23953177/laravel-remember-token-exists-but-still-error
            $table->string('no_ktp');
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('email');
            $table->string('no_telp');
            $table->string('username');
            $table->string('password');
            $table->boolean('is_admin')->default(false);
            $table->boolean('first_time')->default(true);
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
        Schema::dropIfExists('akuns');
    }
};
