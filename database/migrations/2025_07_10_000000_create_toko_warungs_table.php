<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokoWarungsTable extends Migration
{
    public function up()
    {
        Schema::create('toko_warungs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alamat');
            $table->string('nomor_rekening', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('toko_warungs');
    }
}
