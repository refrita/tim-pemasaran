<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('performas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_platform');
            $table->integer('jumlah_tayang');
            $table->integer('jumlah_klik');
            $table->string('konversi', 100);
            $table->date('tanggal');
            $table->timestamps();

            // Foreign key ke tabel platforms
            $table->foreign('id_platform')->references('id')->on('platforms')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('performas');
    }
};
