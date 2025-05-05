<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('platforms', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('jenis', 100);
        });
    }

    public function down()
    {
        Schema::dropIfExists('platforms');
    }
};