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
            $table->integer('jumlah_tayang');
            $table->integer('jumlah_klik');
            $table->string('konversi', 100);
            $table->date('tanggal');
        });
    }

    public function down()
    {
        Schema::dropIfExists('performas');
    }
};
