<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;

    protected $fillable = [
        'penyewa', /*Ditangani oleh sistem dengan 'nama'*/
        'mobil',
        'supir', /*nama supir*/
        'tanggal_sewa',
        'tanggal_kembali',
        'dp',
        'diskon',
        'total'
    ];

    protected $casts = [
        'tanggal_sewa' => 'date',
        'tanggal_kembali' => 'date',
        'first_time' => 'boolean',
    ];
}
