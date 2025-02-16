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
        'dengan_supir', /*0: tanpa supir*/
        'tanggal_pinjam',
        'tanggal_kembali',
        'dp',
        'diskon',
        'total'
    ];

    protected $casts = [
        'tanggal_pinjam' => 'date',
        'tanggal_kembali' => 'date',
    ];
}
