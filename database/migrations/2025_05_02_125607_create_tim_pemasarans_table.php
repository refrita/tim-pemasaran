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
            $table->integer('id_biaya_pemasaran');
            $table->integer('id_platform');
            $table->string('nama_anggota', 100);
            $table->string('jabatan_anggota', 100);
            $table->string('nama_pengguna', 100);
            $table->string('kata_sandi', 100);
        });
    }

    public function down()
    {
        Schema::dropIfExists('tim_pemasarans');
    }
};
