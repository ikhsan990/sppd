<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporans';  // Nama tabel

    protected $fillable = [
        'jadwal_id',
        'hasil_kegiatan',
        'kesimpulan',
        'saran',
        'foto',
    ];

    // Relasi: Laporan milik satu Jadwal
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    // Mutator & Accessor untuk foto sebagai array (multiple foto)
    public function getFotoAttribute($value)
    {
        return json_decode($value);
    }

    public function setFotoAttribute($value)
    {
        $this->attributes['foto'] = json_encode($value);
    }
}
