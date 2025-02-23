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
        'dengan_supir',
        'tanggal_sewa',
        'tanggal_kembali',
        'diskon',
        'total',
    ];

    protected $casts = [
        'dengan_supir' => 'boolean',
        'tanggal_sewa' => 'date',
        'tanggal_kembali' => 'date',
    ];
}
