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
        Schema::create('pengikuts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_id')->constrained('jadwals')->onDelete('cascade');
            $table->foreignId('pegawai_id')->constrained('pegawais')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengikuts');
    }
};
