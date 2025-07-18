<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokoWarung extends Model
{
    use HasFactory;

    protected $table = 'toko_warungs';

    protected $fillable = [
        'nama',
        'alamat',
        'nomor_rekening',
    ];

}
