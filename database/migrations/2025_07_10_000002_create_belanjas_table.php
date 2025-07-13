<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBelanjasTable extends Migration
{
    public function up()
    {
        Schema::create('belanjas', function (Blueprint $table) {
            $table->id();
            $table->string('rincian', 255);
            $table->string('toko', 255);
            $table->decimal('harga', 15, 2);
            $table->string('satuan', 255);
            $table->string('jumlah', 10);
            $table->date('tanggal_belanja')->nullable();
             $table->date('tanggal_bayar')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('belanjas');
    }
}
