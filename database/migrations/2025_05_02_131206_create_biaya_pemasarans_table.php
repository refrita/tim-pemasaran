<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('biaya_pemasarans', function (Blueprint $table) {
            $table->id();
            $table->integer('total_anggaran');
            $table->integer('anggaran_tersedia');
            $table->date('bulan_berlaku');
            $table->string('status', 50);
        });
    }

    public function down()
    {
        Schema::dropIfExists('biaya_pemasarans');
    }
};
