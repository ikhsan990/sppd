<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kegiatan', 'menu', 'alias', 'jml_petugas', 'jml_hari', 'keterangan'
    ];

    public function jadwals(): HasMany
    {
        return $this->hasMany(Jadwal::class);
    }
    public function belanjas()
    {
        return $this->belongsToMany(Belanja::class, 'belanja_kegiatan', 'kegiatan_id', 'belanja_id');
    }
}
