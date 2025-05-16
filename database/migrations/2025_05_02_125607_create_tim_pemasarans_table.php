<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tim_pemasarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_biaya_pemasaran');
            $table->unsignedBigInteger('id_platform');
            $table->string('nama_anggota', 100);
            $table->string('jabatan_anggota', 100);
            $table->string('nama_pengguna', 100);
            $table->string('kata_sandi', 100);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_biaya_pemasaran')->references('id')->on('biaya_pemasarans')->onDelete('cascade');
            $table->foreign('id_platform')->references('id')->on('platforms')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tim_pemasarans');
    }
};
