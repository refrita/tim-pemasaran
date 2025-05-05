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
            $table->integer('id_biaya_pemasaran');
            $table->integer('id_platform');
            $table->string('nama', 50);
            $table->string('kategori', 100);
            $table->date('tanggal_peluncuran');
            $table->date('tanggal_selesai');
        });
    }

    public function down()
    {
        Schema::dropIfExists('iklans');
    }
};
