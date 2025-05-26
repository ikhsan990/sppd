<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pegawai extends Model
{
use HasFactory;

    protected $fillable = [
        'nama', 'nip', 'pangkat', 'golongan', 'jabatan', 'status', 'no_rek', 'nama_rek'
    ];

    public function jadwals(): HasMany
    {
        return $this->hasMany(Jadwal::class);
    }

    public function pengikuts(): HasMany
    {
        return $this->hasMany(Pengikut::class);
    }
}
