<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supir extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'sedang_bekerja',
        'harga',
    ];

    protected $casts = [
        'harga' => 'integer',
    ];
}
