<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; //used by Authenticatable
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Akun extends Authenticatable
{
    // use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'no_ktp',
        'nama',
        'tanggal_lahir',
        'email',
        'no_telp',
        'username',
        'password'
    ];

    protected $guarded = [
        'is_admin' /*Default: false*/
    ];

    protected $hidden = [
        'no_ktp',
        'no_telp',
        'password'
    ];

    protected $casts = [
        'no_ktp' => 'string',
        'no_telp' => 'string'
    ];
}
