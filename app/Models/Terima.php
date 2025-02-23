<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terima extends Model
{
    use HasFactory;

    protected $fillable = [
        'penyewa',
        'mobil',
        'supir',
        'tanggal_sewa',
        'tanggal_kembali',
        'diskon',
        'total',
    ];

    protected $casts = [
        'tanggal_sewa' => 'date',
        'tanggal_kembali' => 'date',
    ];
}
