<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    use HasFactory;

    protected $fillable = [
        'penyewa',
        'keterlambatan',
        'kerusakan',
        'mobil',
        'total_benda',
    ];

    protected $casts = [
        'keterlambatan' => 'date',
    ];
}
