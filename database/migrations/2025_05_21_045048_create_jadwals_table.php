<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_spt');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->foreignId('kegiatan_id')->constrained('kegiatans')->onDelete('cascade');
            $table->foreignId('pegawai_id')->constrained('pegawais')->onDelete('cascade'); // penanggung jawab utama
            $table->string('tujuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
