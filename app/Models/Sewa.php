<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'penyewa', /*Ditangani oleh sistem dengan 'nama'*/
        'kd_mobil',
        'id_supir', /*0: tanpa supir*/
        'tanggal_pinjam',
        'tanggal_kembali',
        'dp',
        'diskon',
        'total'
    ];
}
