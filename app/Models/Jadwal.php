<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jadwal extends Model
{
use HasFactory;

    protected $fillable = [
        'nomor_spt', 'tanggal_mulai', 'tanggal_selesai', 'kegiatan_id', 'tujuan', 'pegawai_id'
    ];

    public function kegiatan(): BelongsTo
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function pengikut(): HasMany
    {
        return $this->hasMany(Pengikut::class);
    }


}
