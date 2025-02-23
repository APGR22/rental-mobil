<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipe',
        'sedang_disewa',
        'sedang_perbaikan',
        'harga',
    ];

    protected $casts = [
        'sedang_disewa' => 'boolean',
        'sedang_perbaikan' => 'boolean',
    ];
}
