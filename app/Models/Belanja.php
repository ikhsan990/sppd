<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Belanja extends Model
{
    use HasFactory;

    protected $table = 'belanjas';

    protected $fillable = [
        'rincian',
        'toko',
        'harga',
        'satuan',
        'jumlah',
        'tanggal_belanja',
        'tanggal_bayar',
    ];



}
