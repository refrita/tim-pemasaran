<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('iklans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_biaya_pemasaran');
            $table->unsignedBigInteger('id_platform');
            $table->string('nama', 50);
            $table->string('kategori', 100);
            $table->date('tanggal_peluncuran');
            $table->date('tanggal_selesai');
            $table->timestamps();

            $table->foreign('id_biaya_pemasaran')->references('id')->on('biaya_pemasarans')->onDelete('cascade');
            $table->foreign('id_platform')->references('id')->on('platforms')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('iklans');
    }
};
